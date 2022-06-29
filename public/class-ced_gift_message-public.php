<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       ced_gift_message
 * @since      1.0.0
 *
 * @package    Ced_gift_message
 * @subpackage Ced_gift_message/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ced_gift_message
 * @subpackage Ced_gift_message/public
 * @author     cedcoss <cedcoss@gmail.com>
 */
class Ced_gift_message_Public {

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
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ced_gift_message-public.css', array(), $this->version, 'all' );

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
		 * defined in Ced_gift_message_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ced_gift_message_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ced_gift_message-public.js', array( 'jquery' ), $this->version, false );


	}

	/**
	 * Output Gift Message field.
	*/
	function ced_single_page_field_fun() {
		global $product;
		if ( get_option( 'allow_gift_check' ) !== false && get_option( 'allow_gift_check' ) == 'on') {
			if(get_option( 'gift_position' ) == 'before_on_button'){
		?>
		<div class="gift_user_message-field">
			<label for="gift_user_message">Enter Gift Message</label>
			<textarea name='gift_user_message' id='gift_user_message' cols='35' rows='1'></textarea>
		</div>
		<?php
			}
		}
	}
	/**
	 * Save in 'cart_item_data' Gift field text to cart item.
	 *
	 * @param array $cart_item_data
	 * @param int   $product_id
	 * @param int   $variation_id
	 *
	 * @return array
	 */
	function ced_save_field_data_cartitem_fun( $cart_item_data, $product_id, $variation_id ) {
		// var_dump($user_gift_msg);die;
		$user_gift_msg = filter_input( INPUT_POST, 'gift_user_message' );
		if ( empty( $user_gift_msg ) ) {
			return $cart_item_data;
		}
		$cart_item_data['gift_user_message'] = $user_gift_msg;

		return $cart_item_data;
	}

/**
 * Display gift Message in the cart.
 *
 * @param array $item_data
 * @param array $cart_item
 *
 * @return array
 */
function ced_display_gift_message_cart( $item_data, $cart_item ) {
	// var_dump($cart_item);die;
	if ( empty( $cart_item['gift_user_message'] ) ) {
		return $item_data;
	}

	$item_data[] = array(
		'key'     => __( 'gift_message_title', 'ced_gift_message' ),
		'value'   => wc_clean( $cart_item['gift_user_message'] ),
		'display' => '',
	);

	return $item_data;
}
/**
 * Add gift_message_title text to order.
 *
 * @param WC_Order_Item_Product $item
 * @param string                $cart_item_key
 * @param array                 $values
 * @param WC_Order              $order
 */
function ced_add_gift_message_key_text_to_order_items( $item, $cart_item_key, $values, $order ) {
	print_r($cart_item_key);die;
	if ( empty( $values['gift_user_message'] ) ) {
		return;
	}
	$item->add_meta_data( __( 'gift_message_title', 'ced_gift_message' ), $values['gift_user_message'] );
}

}
