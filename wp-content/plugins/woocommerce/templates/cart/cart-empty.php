<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

/**
 * @hooked wc_empty_cart_message - 10
 */

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>

<section class="detalhe-pagamento">
	<div class="container">
		<div class="row">
			<div class="col-12">

				<div class="block-produto cart">
					<span class="title-block">Aproveite e compre também</span>

					<?php
						query_posts(
							array(
								'post_type' => 'product',
								'posts_per_page' => '5'
							)
						);

						while ( have_posts() ) : the_post(); 
							$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); 
							$product = wc_get_product( $post->ID ); //var_dump($product); ?>


							<div class="prod-list">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<span class="img-prod">
										<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>">
									</span>
									<span class="titulo"><?php the_title(); ?></span>
									<span class="medida">60mm x 50mm</span>
									<span class="quantidade">200 unidades por caixa</span>
									<span class="preco">
										<span class="valor <?php if($product->sale_price != ''){ echo 'sale'; } ?>"><?php //echo $product->get_price_html(); ?></span>
										<span class="det">cada caixa</span>
									</span>
								</a>
							</div>


						<?php endwhile; echo $post->ID; var_dump($product);
						wp_reset_query();
					?>
				</div>	

				<?php do_action( 'woocommerce_cart_is_empty' ); ?></span>
				</div>

	<?php /*<p class="return-to-shop">
		<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php _e( 'Return to shop', 'woocommerce' ) ?>
		</a>
	</p> */ ?>

			</div>
		</div>
	</div>
</section>

<?php endif; ?>
