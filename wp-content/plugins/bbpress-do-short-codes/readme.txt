=== bbPress - Do Short Codes ===
Author URI: http://pippinsplugins.com
Plugin URI: http://pippinsplugins.com/bbpress-do-short-codes
Contributors: mordauk
Donate link: http://pippinsplugins.com/support-the-site
Tags: bbPress, shortcodes, short code, do_shortcode, Forums, mordauk, Pippin Williamson, pippinsplugins
Requires at least: 3.2
Tested up to: 5.3
Stable Tag: 1.0.3


A simple plugin to enable short codes in bbPress topics and replies.

== Description ==

This add-on plugin for bbPress is extremely simple and does one thing: parses short codes placed in topic and reply content.

By default bbPress does not render short codes placed into forum posts; this enables short codes. That's it.

**Note**: by default, only users with the ability to publish bbPress forums will have their short codes parsed. This can be changed by passing a different capability via the _pw_bbp_parse_shortcodes_cap_ filter.

== Installation ==

1. Activate the plugin
2. Bee happy

== Changelog ==

= 1.0.3 = 

Fixed a missing parameter for user_can()

= 1.0.2 =

Added user_can( 'publish_forums' ) requirement for parsing short codes.

= 1.0.1 =

Added 'bbp_get_topic_content' filter and added disclaimer

= 1.0 =

* First release!

== Upgrade Notice ==

= 1.0.3 = 

Fixed a missing parameter for user_can()

= 1.0.2 =

Added user_can( 'publish_forums' ) requirement for parsing short codes.

= 1.0.1 =

Added 'bbp_get_topic_content' filter and added disclaimer

= 1.0

* First beta release!
