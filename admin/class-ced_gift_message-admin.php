<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       ced_gift_message
 * @since      1.0.0
 *
 * @package    Ced_gift_message
 * @subpackage Ced_gift_message/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ced_gift_message
 * @subpackage Ced_gift_message/admin
 * @author     cedcoss <cedcoss@gmail.com>
 */
class Ced_gift_message_Admin {

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
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ced_gift_message_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ced_gift_message_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ced_gift_message-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ced_gift_message_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ced_gift_message_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ced_gift_message-admin.js', array( 'jquery' ), $this->version, false );

	}
		/**
		 * admin menu page creation  for add gift message for product
		 * @since	1.0.0
		*/
		function ced_product_gift_message_menu(){
			add_menu_page("Gift Message Setting","Product Gift Message","manage_options","ced_gift_message_slug",array($this,'ced_gift_message_func'),'',20);
		}
		/**
		 * this will be ced_gift_message_func
		 * @since	1.0.0
		*/
		function ced_gift_message_func(){
			include_once dirname( __FILE__ ) . '/partials/ced_gift_message_page.php';
		}

}
