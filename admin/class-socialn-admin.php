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
include_once "class-socialn-settings-page.php";
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
class Socialn_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register settings.
	 *
	 * @since    1.0.0
	 */
	public function register_settings() {

		register_setting('socialn_settings', 'socialn_status', [
			'type' => 'boolean',
			'default' => false
		]);
		register_setting('socialn_settings', 'socialn_api_key', ['type' => 'string']);
		register_setting('socialn_settings', 'socialn_auto_start', [
			'type' => 'boolean',
			'default' => true
		]);
		register_setting('socialn_settings', 'socialn_debug', ['type' => 'boolean']);
		register_setting('socialn_settings', 'socialn_custom_js', ['type' => 'string']);
		register_setting('socialn_settings', 'socialn_custom_css', ['type' => 'string']);

	}

	/**
	 * Register plugin action links.
	 *
	 * @since    1.0.0
	 */
	public function register_action_links($links) {
		$settings_link = '<a href="options-general.php?page=socialn">Settings</a>';
		array_unshift($links, $settings_link);

		return $links;
	}

	/**
	 * Register menu.
	 *
	 * @since    1.0.0
	 */
	public function register_menu() {

		$settings_page = new Socialn_Settings_Page($this->version);
		add_options_page('SocialN Settings Page', 'SocialN', 'manage_options', 'socialn', array($settings_page, 'render'));

	}

}
