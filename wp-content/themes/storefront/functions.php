<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */


add_action('woocommerce_cart_loaded_from_session', 'woocommerce_cart_loaded_from_session');

function woocommerce_cart_loaded_from_session($session_cart) {
    $products_in_cart = array();
    foreach ($session_cart->cart_contents as $key => $item) {
        $product_id = $item['product_id'];
        $vendor = get_wcmp_product_vendors($product_id);
        if ($vendor) {
            $products_in_cart[$key] = $vendor->id;
        } else{
            $products_in_cart[$key] = 1;
        }
    }
    asort($products_in_cart);
    $cart_contents = array();
    foreach ($products_in_cart as $cart_key => $vendor_id) {
        $content = WC()->cart->cart_contents[$cart_key];
        $content['sold_by'] = $vendor_id;
        $cart_contents[$cart_key] = $content;
    }
    $session_cart->cart_contents = $cart_contents;
}


add_action( 'parse_request', 'redirect_to_my_account_orders' );
function redirect_to_my_account_orders( $wp ) {
    // All other endpoints such as change-password will redirect to
    // my-account/orders
    //$allowed_endpoints = [ 'orders', 'edit-account', 'customer-logout' ];

    /*if (
        preg_match( '%^my\-account(?:/([^/]+)|)/?$%', $wp->request, $m ) 
    ) {

    	//&&( empty( $m[1] ) || ! in_array( $m[1], $allowed_endpoints ) )

    	//$url = get_home_url().'';
        //wp_redirect( $url );
        //exit;


        print_r( $wp->request );

    }*/

    $url_myaccount = explode('my-account/', $wp->request);
    //print_r($url_myaccount);
    //echo count($url_myaccount);

    //echo get_permalink(get_page_by_path('my-account/orders'));

    $myaccount_orders = get_permalink( wc_get_page_id( 'myaccount' ) ).'orders';
    
    if(count($url_myaccount) == 1){
    	//echo count($url_myaccount);
    	//$url = get_permalink( wc_get_page_id( 'myaccount/orders' ) );//get_permalink(get_page_by_path('my-account/orders'));*/
        

        //wp_redirect( $myaccount_orders );
        //exit;


    }else{
        /*if($url_myaccount[1] == 'edit-address'){
            $myaccount_address = get_permalink( wc_get_page_id( 'myaccount' ) ).'edit-account';
            wp_redirect( $myaccount_address );
            exit;
        }*/
    }
}