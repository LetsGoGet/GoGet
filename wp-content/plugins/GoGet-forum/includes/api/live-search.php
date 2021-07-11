<?php

namespace GoGetForums\includes\api;

function live_search_handler($request)
{
    global $wpdb;

    $queryType = htmlentities($request['type']);
    $queryText = htmlentities($request['text']); // $request->get_params(); // JSON: {text "ds"}

    if ($queryText == '') {
    return array();
    }

    if (!empty($wpdb->charset)) {
    $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
    }
    if (!empty($wpdb->collate)) {
    $charset_collate .= " COLLATE $wpdb->collate";
    }
    if (!function_exists('maybe_create_table')) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php'); // Add one library admin function
    }

    switch ($queryType) {
    case 'company':
    $posts_table = $wpdb->prefix . "company";
    maybe_create_table(
    $posts_table,
    "CREATE TABLE `{$posts_table}` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `name` varchar(256) NOT NULL UNIQUE,
    PRIMARY KEY (`id`)
    ) $charset_collate AUTO_INCREMENT=1;"
    );
    // select * from users where users.email like '%abc%';
    $rows = $wpdb->get_results("SELECT name FROM " . $posts_table . " WHERE name like '%" . $queryText . "%'");
    break;
    case 'job_title':
    $posts_table = $wpdb->prefix . "job_title";
    maybe_create_table(
    $posts_table,
    "CREATE TABLE `{$posts_table}` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `name` varchar(256) NOT NULL UNIQUE,
    PRIMARY KEY (`id`)
    ) $charset_collate AUTO_INCREMENT=1;"
    );
    $rows = $wpdb->get_results("SELECT name FROM " . $posts_table . " WHERE name like '%" . $queryText . "%'");
    break;
    case 'dropdown_countries_and_cities':
    $cc_path = ABSPATH . 'wp-content/plugins/andy-bbp-custom-form/countries_and_cities.json';
    $data = file_get_contents($cc_path);
    $cc = json_decode($data, true);
    $html = "";
    foreach ($cc as $country => $city) {
    if ($country == $queryText) {
    foreach ($city as $c) {
    $html .= "<option value='" . $c . "'>" . $c . "</option>";
    }
    }
    }
    return $html;
    }

    $query = array();
    if (!empty($rows)) {
    foreach ($rows as $key => $r) {
    array_push($query, (object) ['id' => $key, 'text' => $r->name]);
    }
    }
    return $query;
}

add_action('rest_api_init', function () {
    // http://localhost/wordpress/wp-json/test/v1/data?industry=資訊
    register_rest_route('fetch/v1', '/data/', array(
        'methods'  => 'GET',
        'callback' => __NAMESPACE__ . '\\live_search_handler',
    ));
});
