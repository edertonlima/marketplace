<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */






if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
	return;
}

?>

<form class="woocommerce-form woocommerce-form-login form-login login" method="post" <?php echo ( $hidden ) ? 'style="display:block;"' : ''; ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<?php //echo ( $message ) ? wpautop( wptexturize( $message ) ) : ''; // @codingStandardsIgnoreLine ?>

		<h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>


			<div class="btn-social">
				<a href="<?php echo get_home_url(); ?>/wp-login.php?loginSocial=facebook" data-plugin="nsl" data-action="connect" data-redirect="current" data-provider="facebook" data-popupwidth="475" data-popupheight="175" class="btn btn-facebook">
					<i class="fa fa-facebook-square"></i> Entrar com Facebook
				</a>
			</div>

			<div class="btn-social">
				<span class="ou-login"><span>OU</span></span>
			</div>

			<div class="btn-social">
				<a href="javascript:" class="btn btn-usar-email e-mail-login">
					<i class="fa fa-envelope"></i> Usar meu e-mail
				</a>
			</div>


	<div class="campos-login">

		<p class="form-row form-row-first">
			<label for="username"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="text" class="input-text" name="username" id="username" autocomplete="username" />
		</p>
		<p class="form-row form-row-last">
			<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input class="input-text" type="password" name="password" id="password" autocomplete="current-password" />
		</p>
		<div class="clear"></div>

		<?php do_action( 'woocommerce_login_form' ); ?>


		<p class="form-row">
			<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
			<button type="submit" class="btn btn-comprar button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
			<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
				<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
			</label>
		</p>
		<p class="lost_password">
			<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
		</p>

		<div class="clear"></div>

		<?php do_action( 'woocommerce_login_form_end' ); ?>

	</div>

</form>


<script type="text/javascript">
	jQuery('.e-mail-login').click(function(){
		jQuery('.campos-login').show();
		jQuery('.form-login .btn-social').hide();
	});
</script>