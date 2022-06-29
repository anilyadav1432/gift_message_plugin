<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              ced_gift_message
 * @since             1.0.0
 * @package           Ced_gift_message
 *
 * @wordpress-plugin
 * Plugin Name:       Ced Gift Message
 * Plugin URI:        ced_gift_message
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            cedcoss
 * Author URI:        ced_gift_message
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ced_gift_message
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CED_GIFT_MESSAGE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ced_gift_message-activator.php
 */
function activate_ced_gift_message() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ced_gift_message-activator.php';
	Ced_gift_message_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ced_gift_message-deactivator.php
 */
function deactivate_ced_gift_message() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ced_gift_message-deactivator.php';
	Ced_gift_message_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ced_gift_message' );
register_deactivation_hook( __FILE__, 'deactivate_ced_gift_message' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ced_gift_message.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ced_gift_message() {

	$plugin = new Ced_gift_message();
	$plugin->run();

}
/**
 * Checkes if WooCommerce id active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	
run_ced_gift_message();

}else {	
	/**
	 * To show error notice if woocommerce is not activated.
	 * @author CedCommerce <plugins@cedcommerce.com>
	 * @link http://cedcommerce.com/
	 */
	function ced_gift_message_error_notice() {
		?>
		<div class="error notice is-dismissible">
			<p><?php _e( 'WooCommerce is not activated. Please install WooCommerce first, to use the hide plugin !!!', 'ced_gift_message' ); ?></p>
		</div>
		<?php
	}

	add_action( 'admin_init', 'ced_gift_message_deactivate' );
	/**
	 * Deactivating plugins
	 * @name ced_gift_message_deactivate
	 * @author CedCommerce <plugins@cedcommerce.com>
	 * @link http://cedcommerce.com/
	 */
	function ced_gift_message_deactivate() {
		deactivate_plugins( plugin_basename( __FILE__ ) );
		add_action( 'admin_notices', 'ced_gift_message_error_notice' );
	}
}