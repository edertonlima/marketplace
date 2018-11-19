<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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
 * @version 3.0.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


	


/** @global WC_Checkout $checkout */

?>



				<h3 id="title-passo">Meus Dados</h3>

				<div class="woocommerce-billing-fields">
					<?php  if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

						<h3><?php _e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>

					<?php else : ?>

						<h3><?php _e( 'Detalhe de pagamento', 'woocommerce' ); ?></h3>

					<?php endif;  ?>

					<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

					<div class="woocommerce-billing-fields__field-wrapper">
						<?php
							$fields = $checkout->get_checkout_fields( 'billing' );

							foreach ( $fields as $key => $field ) { //print_r($field);
								if ( isset( $field['country_field'], $fields[ $field['country_field'] ] ) ) {
									$field['country'] = $checkout->get_value( $field['country_field'] );
								}
								woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
							}
						?>
					</div>

					<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
				</div>



				<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>



					<div class="woocommerce-account-fields">
						<?php if ( ! $checkout->is_registration_required() ) : ?>

							<p class="form-row form-row-wide create-account">
								<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
									<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ) ?> type="checkbox" name="createaccount" value="1" /> <span><?php _e( 'Create an account?', 'woocommerce' ); ?></span>
								</label>
							</p>

						<?php endif; ?>

						<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

						<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

							<div class="create-account">
								<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
									<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
								<?php endforeach; ?>
								<div class="clear"></div>
							</div>

						<?php endif; ?>

						<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
					</div>


				<?php endif; ?>


				<div class="btn-checkout-footer">
					<a href="javascript:" class="btn btn-checkout" id="passo_dados"><i class="fa fa-chevron-left"></i> Meus Dados</a>
					<a href="javascript:" class="btn btn-checkout" id="passo_endereco">Cadastrar Endereço <i class="fa fa-chevron-right"></i></a>
					<a href="javascript:" class="btn btn-checkout-add" id="checkout-add"><i class="fa fa-plus"></i> Adicionar Informações</a>
				</div>


				<script type="text/javascript">
					jQuery(document).ready(function(){

						jQuery('#passo_dados').click(function(){
							jQuery('#title-passo').html('Meus Dados');

							jQuery('#passo_dados').hide();
							jQuery('#passo_endereco').show();
							
							jQuery('#billing_first_name_field').show();
							jQuery('#billing_last_name_field').show();
							jQuery('#billing_phone_field').show();

							jQuery('#billing_address_1_field').hide();
							jQuery('#billing_address_2_field').hide();
							jQuery('#billing_city_field').hide();
							jQuery('#billing_state_field').hide();
							jQuery('#billing_postcode_field').hide();
						});

						jQuery('#passo_endereco').click(function(){
							jQuery('#title-passo').html('Endereço de Entrega');

							jQuery('#passo_endereco').hide();
							jQuery('#passo_dados').show();
							
							jQuery('#billing_first_name_field').hide();
							jQuery('#billing_last_name_field').hide();
							jQuery('#billing_phone_field').hide();

							jQuery('#billing_address_1_field').show();
							jQuery('#billing_address_2_field').show();
							jQuery('#billing_city_field').show();
							jQuery('#billing_state_field').show();
							jQuery('#billing_postcode_field').show();
						});

					});
				</script>

				<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/maskedinput.js"></script>
				<script type="text/javascript">
					jQuery(function(jQuery){
					   jQuery("#billing_phone").mask("(99) 9999-9999?9");
					});
				</script>
