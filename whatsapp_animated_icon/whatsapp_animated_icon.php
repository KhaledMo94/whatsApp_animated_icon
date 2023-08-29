<?php

/*
 * Plugin Name:       WhatsApp Animation Icon
 * Plugin URI:        https://github.com/KhaledMo94/whatsApp_animated_icon
 * Description:       Add Animated floating whatsApp icon to All your website pages.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Khaled Mohamed
 * Author URI:        https://khaledmo94.github.io/wordpressdev/#
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

defined('ABSPATH') or die('you silly human! , cant catch that file');

class WhatsAppAnimPlugin 
{
    function __construct(){
        add_action('admin_enqueue_scripts',array($this,'enqueue_admin'));
        add_action('wp_enqueue_scripts',array($this,'enqueue_user'));
        add_action('admin_menu',array($this,'add_admin_pages'));
        add_action('wp_footer',array($this,'custom_user_page'));
    }

    function activation(){
        require_once plugin_dir_path(__FILE__) .'inc\activation.php';
        WaActivationIcon::activate();
    }
    function deactivation(){
        require_once plugin_dir_path(__FILE__) .'inc\deactivation.php';
        WaDeactivationIcon::deactivate();
    }

    function enqueue_admin(){
        wp_enqueue_style("WAiconStyleAdmin",plugins_url('/css/admin.css',__FILE__));
        wp_enqueue_script( "WAiconScriptAdmin",plugins_url('/js/admin.js',__FILE__), array(), null, true );
        wp_enqueue_script ("WAiconGsap",plugins_url('/js/gsap.js',__FILE__), array(), null, true);
    }

    function enqueue_user(){
        wp_enqueue_style("WAiconStyleUser",plugins_url('/css/user.css',__FILE__));
        wp_enqueue_style("fontawesome6",'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
        wp_enqueue_script ("WAiconGsap",plugins_url('/js/gsap.js',__FILE__), array(), null, true);
        wp_enqueue_script("WAiconScriptUser",plugins_url('/js/user.js',__FILE__), array(),null,true);
    }

    function add_admin_pages(){
        add_menu_page('WhatsApp Icon Customizing','WhatsApp Icon', 'manage_options','icon_wa_custom',array($this,'custom_admin_page'),'dashicons-format-chat', 60 );
    }
    function custom_admin_page(){
        require_once plugin_dir_path(__FILE__).'inc/main.php';
    }
    function custom_user_page(){
        require_once plugin_dir_path(__FILE__).'inc/footer_icon.php';
        wafooter::WAFooterIcon();
    }
    function uninstall(){
    global $wpdb;
    $tab_name = $wpdb ->prefix."whatsiconoption";
    $sql = "DROP TABLE IF EXISTS $table_name ;";
    $wpdb->query($sql);
    }
}

if (class_exists('WhatsAppAnimPlugin')){
    $whatappAnimPlugin = new WhatsAppAnimPlugin();
}

register_activation_hook(__FILE__,array($whatappAnimPlugin,'activation'));

register_deactivation_hook(__FILE__, array($whatappAnimPlugin,'deactivation'));

register_uninstall_hook(__FILE__, array($whatappAnimPlugin,'uninstall'));
