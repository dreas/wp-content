<?php
/**
 * Plugin Name: WP Latest Posts
 * Plugin URI: http://www.joomunited.com/wordpress-products/wp-latest-posts
 * Description: Advanced frontpage and widget news slider
 * Version: 3.9.5
 * Text Domain: wp-latest-posts
 * Domain Path: /languages
 * Author: JoomUnited
 * Author URI: http://www.joomunited.com
 * License: GPL2
 */

/**
 * @copyright 2014  Joomunited  ( email : contact _at_ joomunited.com )
 *
 *  Original development of this plugin was kindly funded by Joomunited
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


//Check plugin requirements
if (version_compare(PHP_VERSION, '5.3', '<')) {
    if( !function_exists('wplp_disable_plugin') ){
        function wplp_disable_plugin(){
            if ( current_user_can('activate_plugins') && is_plugin_active( plugin_basename( __FILE__ ) ) ) {
                deactivate_plugins( __FILE__ );
                unset( $_GET['activate'] );
            }
        }
    }

    if( !function_exists('wplp_show_error') ){
        function wplp_show_error(){
            echo '<div class="error"><p><strong>WP Latest Posts</strong> need at least PHP 5.3 version, please update php before installing the plugin.</p></div>';
        }
    }

    //Add actions
    add_action( 'admin_init', 'wplp_disable_plugin' );
    add_action( 'admin_notices', 'wplp_show_error' );

    //Do not load anything more
    return;
}

//Include the jutranslation helpers
include_once('jutranslation' . DIRECTORY_SEPARATOR . 'jutranslation.php');
\Joomunited\WPLatestPosts\Jutranslation\Jutranslation::init(__FILE__, 'wp-latest-posts', 'WP Latest Posts', 'wp-latest-posts', 'languages' . DIRECTORY_SEPARATOR . 'wp-latest-posts-en_US.mo');

/** Class includes **/
include_once(dirname(__FILE__) . '/inc/yd-widget-framework.inc.php');    // standard framework VERSION 20110405-01 or better
include_once(dirname(__FILE__) . '/inc/wp-fpn-main.inc.php');            // custom classes
include_once(dirname(__FILE__) . '/inc/wp-fpn-widget.inc.php');        // custom classes
include_once(dirname(__FILE__) . '/inc/wp-fpn-front.inc.php');            // custom classes

/**
 * Just fill up necessary settings in the configuration array
 * to create a new custom plugin instance...
 *
 */
global $wpcu_wpfn;
$wpcu_wpfn = new wpcuWPFnPlugin(
    array(
        'name' => 'WP Frontpage News',
        'version' => '3.9.5',
        'has_option_page' => false,
        'option_page_title' => 'Frontpage News Settings',
        'op_donate_block' => false,
        'op_credit_block' => false,
        'op_support_block' => false,
        'has_toplevel_menu' => false,
        'has_shortcode' => false,
        'shortcode' => '',
        'has_widget' => false,
        'widget_class' => '',
        'has_cron' => false,
        'crontab' => array(),
        'has_stylesheet' => false,
        'stylesheet_file' => 'css/wpcufpn.css',
        'has_translation' => true,
        'translation_domain' => 'wp-latest-posts', // must be copied in the widget class!!!
        'translations' => array(
            array('English', 'WPCode United', 'http://www.wpcode-united.com/'),
            array('French', 'Yann Dubois', 'http://www.yann.com/'),
        ),
        'initial_funding' => array('WPCode United', 'http://www.wpcode-united.com/'),
        'additional_funding' => array(),
        'form_blocks' => array(
            'Main options' => array()
        ),
        'option_field_labels' => array(),
        'option_defaults' => array(),
        'form_add_actions' => array(),
        'has_cache' => false,
        'option_page_text' => '',
        'backlinkware_text' => '',
        'plugin_file' => __FILE__,
        'has_activation_notice' => false,
        'activation_notice' => ''
    )
);
