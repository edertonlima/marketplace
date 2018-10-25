<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<section class="my-account meus-dados">
	<div class="container">
		<div class="row">

			<div class="col-12">
				<div class="col-12">
					<h3>Meus Dados</h3>
				</div>

				<div id="dados-preview">
					<div class="col-12">
						<div class="block-dados">
							<span class="title">NOME</span>
							<span class="info-princ"><?php echo ucfirst(esc_attr( $user->display_name )); ?></span>
							<span class="info-sec"><?php echo esc_attr( $user->first_name ) . ' ' . esc_attr( $user->last_name ); ?></span>
						</div>

						<div class="block-dados">
							<span class="title">E-MAIL</span>
							<span class="info-princ"><?php echo esc_attr( $user->user_email ); ?></span>
						</div>
					</div>

					<?php /* <div class="col-6">
						<div class="block-dados">
							<span class="title endereco">ENDEREÇO DE ENTREGA</span>
							<span class="info-sec">(14) 998122-5949<br>Rua João Urias Batista, 665<br>Vila Santista, Bauru, SP<br>17054-610</span>
							<a href="<?php echo get_permalink(get_page_by_path('my-account')); ?>edit-address/entrega" title="Editar endereço" class="link-edit">Editar endereço</a>
						</div>
					</div>

					<div class="col-6">
						<div class="block-dados">
							<span class="title endereco">ENDEREÇO DE COBRANÇA</span>
							<span class="info-sec">(14) 998122-5949<br>Rua João Urias Batista, 665<br>Vila Santista, Bauru, SP<br>17054-610</span>
							<a href="<?php echo get_permalink(get_page_by_path('my-account')); ?>edit-address/cobranca" title="Editar endereço" class="link-edit">Editar endereço</a>
						</div>
					</div> */ ?>





	<?php 



	$customer_id = get_current_user_id();

	if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
		$get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
			'billing' => __( 'Billing address', 'woocommerce' ),
			'shipping' => __( 'Shipping address', 'woocommerce' ),
		), $customer_id );
	} else {
		$get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
			'billing' => __( 'Billing address', 'woocommerce' ),
		), $customer_id );
	}

	$oldcol = 1;
	$col    = 1;
	?>

	<div class="col-12">
		<div class="block-dados block-endereco">
			<span class="info-sec">
				<?php echo apply_filters( 'woocommerce_my_account_my_address_description', __( 'The following addresses will be used on the checkout page by default.', 'woocommerce' ) ); ?>
			</span>
		</div>
	</div>

	<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
		<div>
	<?php endif; ?>

	<?php foreach ( $get_addresses as $name => $title ) : ?>

					<div class="col-6">
						<div class="block-dados">

							<span class="title endereco"><?php echo $title; ?></span>				
							<span class="info-sec">
								<?php
									$address = wc_get_account_formatted_address( $name );
									echo $address ? wp_kses_post( $address ) : esc_html_e( 'You have not set up this type of address yet.', 'woocommerce' );
								?>
							</span>

							<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="link-edit">
								Editar endereço<?php // _e( 'Edit', 'woocommerce' ); ?>
							</a>
				

						</div>
					</div>

	<?php endforeach; ?>

	<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
		</div>
	<?php endif;





	?>




					<div class="col-12">
						<a href="javascript:" class="btn btn-account" id="alterar-dados"><i class="fas fa-user-edit"></i> Alterar dados</a>
						<a href="javascript:" class="btn btn-account" id="alterar-senha"><i class="fa fa-unlock-alt"></i> Alterar senha</a>
					</div>
				</div>
			</div>

			<div class="col-12">
				<div class="block-dados">
					<div class="col-12">

						<form class="woocommerce-EditAccountForm edit-account form-edit" action="" method="post">

							<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

							<fieldset id="form-dados">
								<p>
									<label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
								</p>
								<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
									<label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
								</p>				
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <!--<span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span>-->
								</p>
							

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
									<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
								</p>
							</fieldset>

							<fieldset id="form-senha">
								<legend><?php esc_html_e( 'Password change', 'woocommerce' ); ?></legend>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="password_current"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
									<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
								</p>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="password_1"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
									<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
								</p>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
									<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
								</p>
							</fieldset>

							<?php do_action( 'woocommerce_edit_account_form' ); ?>

							<fieldset id="form-btn">
								<p>
									<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
									<button type="submit" class="btn btn-salvar woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
									<input type="hidden" name="action" value="save_account_details" />

									<a href="javascript:" class="btn btn-review-order" id="form-voltar"><i class="fa fa-chevron-left"></i> Cancelar</a>
								</p>
							</fieldset>

							<?php do_action( 'woocommerce_edit_account_form_end' ); ?>

						</form>

					</div>
				</div>
			</div>

		</div>
	</div>	
</section>

<script type="text/javascript">
	jQuery('#alterar-dados').click(function(){
		jQuery('#dados-preview').hide();
		jQuery('#form-dados').show();
		jQuery('#form-btn').show();
	});

	jQuery('#alterar-senha').click(function(){
		jQuery('#dados-preview').hide();
		jQuery('#form-senha').show();
		jQuery('#form-btn').show();
	});

	jQuery('#form-voltar').click(function(){
		jQuery('#dados-preview').show();
		jQuery('#form-dados').hide();
		jQuery('#form-senha').hide();
		jQuery('#form-btn').hide();
	});
</script>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
