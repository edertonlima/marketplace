<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>


<nav class="woocommerce-MyAccount-navigation">
	<div class="container">
		<ul>
			<li>
				<a href="javascript:">MEUS<br>PONTOS</a>
			</li>

			<li class="<?php if( (is_wc_endpoint_url( 'orders' )) and (!isset($_GET['canceled'])) ){ echo 'active'; } ?>">
			<?php /*<li class="woocommerce-orders <?php if( !isset($_GET['canceled']) ){ echo 'active'; } ?>" id="pedidos">*/ ?>
				<a href="<?php echo get_permalink(get_page_by_path('my-account')); ?>orders">MEUS<br>PEDIDOS</a>
			</li>

			<li class="<?php if( isset($_GET['canceled']) ){ echo 'active'; } ?>" id="pedidos-cancelados">
				<a href="<?php echo get_permalink(get_page_by_path('my-account')); ?>orders/?canceled">PEDIDOS<br>CANCELADOS</a>
			</li>

			<li class="<?php if( (is_edit_account_page()) or (is_wc_endpoint_url( 'edit-address' )) ){ echo 'active'; } ?>">
				<a href="<?php echo get_permalink(get_page_by_path('my-account')); ?>edit-account">MEUS<br>DADOS</a>
			</li>
		</ul>

		<ul class="links-acount">

<?php global $current_user;
	wp_get_current_user();

	//var_dump($current_user);
	//echo 'Username: ' . $current_user->user_login . "\n";
	//echo 'User display name: ' . $current_user->display_name . "\n";
?>

			<li class="logout">
				Não é <?php echo ucfirst($current_user->display_name); ?>? <a href="<?php echo get_home_url(); ?>/?page_id=8&customer-logout&_wpnonce=3b570ada07">Finalizar</a>
			</li>
			<li class="nome-user">
				<span>OLÁ, <?php echo strtoupper($current_user->display_name); ?></span>
				SEJA BEM VINDO!
			</li>
		</ul>

		<?php /*<ul>
			<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
				<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
					<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>*/ ?>	
	</div>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
