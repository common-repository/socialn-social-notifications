<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://socialn.io
 * @since      1.0.0
 *
 * @package    Socialn
 * @subpackage Socialn/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Socialn
 * @subpackage Socialn/admin
 * @author     SocialN <info@socialn.io>
 */
class Socialn_Settings_Page {

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

    public function __construct($version) {
        $this->version = $version;
    }

	
    public function render() {
        // variables
        $logoUrl = plugin_dir_url( __FILE__ ) . 'images/logo.png';

        $scripts = array(
            plugin_dir_url( __FILE__ ) . 'js/codemirror.js?ver='.$this->version,
            plugin_dir_url( __FILE__ ) . 'js/javascript.js?ver='.$this->version,
            plugin_dir_url( __FILE__ ) . 'js/css.js?ver='.$this->version,
            plugin_dir_url( __FILE__ ) . 'js/placeholder.js?ver='.$this->version,
            plugin_dir_url( __FILE__ ) . 'js/socialn-admin.js?ver='.$this->version
        );
        
        $styles = array(
            plugin_dir_url( __FILE__ ) . 'css/socialn-admin.css?ver='.$this->version,
            plugin_dir_url( __FILE__ ) . 'css/codemirror.css?ver='.$this->version
        );

        $options = get_option('socialn_settings');
        
        $customJs = get_option('socialn_custom_js');
        $customCss = get_option('socialn_custom_css');
        $apiKey = get_option('socialn_api_key');
        $autoStart = get_option('socialn_auto_start');
        $debug = get_option('socialn_debug');
        $status = get_option('socialn_status');

        include "partials/socialn-admin-display.php";
    }

}
