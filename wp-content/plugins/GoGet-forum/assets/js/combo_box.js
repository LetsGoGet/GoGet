function setComboBox(combo_box_id, fetch_data_type, url_split) {
    jQuery(document).ready(function ($) {
        // url_fetch: to be modify
        var url_fetch = window.location.href.split(url_split)[0] + 'wp-json/fetch/v1/data';

        $('#' + combo_box_id).select2({
            language: 'zh-tw',
            tags: true,
            dropdownAutoWidth: true,
            ajax: {
                url: url_fetch,
                method: 'GET',
                dataType: 'json',
                data: function (params) {
                    return {
                        text: params.term, // search term
                        page: params.page,
                        type: fetch_data_type,
                    };
                },
                contentType: 'application/json',
                delay: 50,
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    var resData = [];
                    data.forEach(function (value) {
                        if (value.text.indexOf(params.term) != -1)
                            resData.push(value)
                    })
                    return {
                        results: $.map(resData, function (item) {
                            return {
                                text: item.text,
                                id: item.text
                            }
                        })
                    };
                },
                cache: true
            }
        });
    });
}