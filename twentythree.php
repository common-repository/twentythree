<?php
/*
Plugin Name: twentythree
Plugin URI: http://wordpress.org/plugins/twentythree/
Description: A plugin for allowing embeds from the TwentyThree platform using a [twentythree] shortcode.
Version: 4.3
Author: cpnielsen
Author URI: http://www.github.com/23/twentythree-wordpress/
License: GPLv2
*/
defined('ABSPATH') or die('No direct plugin access');
define('TWENTYTHREE_PLUGIN_VERSION', '1.0');


function twentythree_add_shortcode_cb($atts, $content = null) {
    $html = '';
    $content = wp_specialchars_decode($content);
    // Check that is is a Twentythree type iframe embed
    if (preg_match("/iframe.*\.ihtml\/player.html\?.*(album|photo)(%5f|_)id=\d+/i", $content)) {
        $html = $content;
    }
    return $html;
}

function twentythree_exempt_texturize($shortcodes) {
    $shortcodes[] = 'twentythree';
    return $shortcodes;
}

add_shortcode('twentythree', 'twentythree_add_shortcode_cb');
add_filter('no_texturize_shortcodes', 'twentythree_exempt_texturize');
