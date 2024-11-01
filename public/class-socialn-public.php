<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://socialn.io
 * @since      1.0.0
 *
 * @package    Socialn
 * @subpackage Socialn/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Socialn
 * @subpackage Socialn/public
 * @author     SocialN <info@socialn.io>
 */
class Socialn_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Socialn_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Socialn_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$status = get_option('socialn_status', false);

		// if it is not enabled then don't show
		if (!$status) {
			return;
		}

		$parameters = array(
			'key' => get_option('socialn_api_key')
		);

		$debug = (bool) get_option('socialn_debug');
		$autoStart = (bool) get_option('socialn_auto_start', true);

		// if exists and true
		if ($debug) {
			$parameters['debug'] = 'true';
		}

		// if exists and true
		if (!$autoStart) {
			$parameters['autoStart'] = 'false';
		}

		$queryString = http_build_query($parameters);

		wp_enqueue_script($this->plugin_name, 'https://cdn.socialn.io/socialn.js?'.$queryString, null, null, true);

	}

	/**
	 * Register custom css.
	 *
	 * @since    1.0.0
	 */
	public function custom_css() {

		$custom_css = get_option('socialn_custom_css');

		if ($custom_css) {
			// Add to page html source
			echo "\n<!-- SocialN Custom CSS -->\n<style type=\"text/css\">\n$custom_css\n</style>\n<!-- SocialN Custom CSS End -->\n";
		}

	}

	/**
	 * Register custom css.
	 *
	 * @since    1.0.0
	 */
	public function custom_js() {

		$custom_js = get_option('socialn_custom_js');

		if ($custom_js) {
			// Add to page html source
			echo "\n<!-- SocialN Custom JS -->\n<script type=\"text/javascript\">\n$custom_js\n</script>\n<!-- SocialN Custom JS End -->\n";
		}

	}

}
