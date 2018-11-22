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

                <div class="slide-categoria list-produto owl-carousel owl-theme">

                    <?php
                        query_posts(
                            array(
                                'post_type' => 'product',
                                'posts_per_page' => '5'
                                //'orderby' => 'rand'
                            )
                        );

                        while ( have_posts() ) : the_post(); 
                            $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); 
                            //echo $post->ID;
                            $produto = get_post($post->ID);
                            //$produto = wc_get_product( $post->ID ); 

                            //echo get_attribute('pa_qtd-da-embalagem');
                            $qtd_embalagem = get_the_terms( $post->ID, 'pa_qtd-da-embalagem' );
                            $tipo_embalagem = get_the_terms( $post->ID, 'pa_tipo-de-embalagem' );

                            $altura = get_the_terms( $post->ID, 'pa_altura' );
                            $largura = get_the_terms( $post->ID, 'pa_largura' );
                            $diametro = get_the_terms( $post->ID, 'pa_diametro' );
                            
                            $volume = get_the_terms( $post->ID, 'pa_volume' );

                            
                            //echo $altura[0]['name'];


    //global $product;
    //$attributes = $product->get_attributes();
    //var_dump($attributes['pa_qtd-da-embalagem']);

                            //global $product;
                            //$atributo = $produto->get_attribute();

                            //global $product;
                            //echo wc_display_product_attributes( $product );

                            //global $woocommerce, $post, $product;
                            //$atributo = get_post_meta($post->ID);
                            //$atributo = unserialize($atributo['_product_attributes'][0])

                            
                            //print_r(unserialize($atributo['_product_attributes'][0];)

                            //$product = wc_get_product( $post->ID ); 
                            //echo '<br>'.$produto->post_title; //var_dump($produto);
                            

                            //var_dump($atributo);

                           // $atributo = $produto->get_attribute( 'pa_qtd-da-embalagem' );
                            //var_dump($atributo);

                            ?>


                            <div class="item prod-list">
                                <a href="<?php the_permalink(); ?>" title="<?php echo $produto->post_title; ?>">
                                    <span class="img-prod">
                                        <?php if($imagem[0] == ''){ ?>
                                            <img src="<?php echo plugins_url(); ?>/woocommerce/assets/images/placeholder.png" alt="<?php echo $produto->post_title; ?>">
                                        <?php }else{ ?>
                                            <img src="<?php echo $imagem[0]; ?>" alt="<?php echo $produto->post_title; ?>">
                                        <?php } ?>
                                    </span>
                                    <div class="cont-destaque">
                                        <span class="titulo"><?php echo $produto->post_title; ?></span>

                                        <?php if($volume[0]->name){ ?>
                                            <span class="medida"><?php $volume[0]->name; ?></span>
                                        <?php } ?>

                                        <?php if($altura[0]->name){                                            
                                            if($diametro[0]->name){ ?>
                                                <span class="medida"><?php echo '&Oslash; ' . $diametro[0]->name.' x '.$altura[0]->name; ?></span>
                                            <?php }else{
                                                
                                                if($largura[0]->name){ ?>
                                                    <span class="medida"><?php echo $largura[0]->name . ' x ' . $altura[0]->name; ?></span>
                                                <?php } ?>

                                            <?php } ?>
                                            
                                        <?php } ?>
                                        
                                        <?php 
                                            if(($qtd_embalagem[0]->name) and ($tipo_embalagem[0]->name)){ ?>
                                                <span class="quantidade"><?php  echo $qtd_embalagem[0]->name . ' unidades por ' . $tipo_embalagem[0]->name ?></span>
                                            <?php }
                                        ?>


                                        <?php
                                            global $woocommerce;
                                            $currency = get_woocommerce_currency_symbol();
                                            $price = get_post_meta( get_the_ID(), '_regular_price', true);
                                            $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                                        ?>
                                        <span class="preco">
                                            <span class="valor <?php if($sale){ echo 'sale'; } ?>">
                                                <span class="woocommerce-Price-amount amount">
                                                    <?php /*<span class="woocommerce-Price-currencySymbol"><?php echo $currency; ?></span>  */ ?>
                                                    
                                                    <?php if($sale) :
                                                        echo wc_price( $sale );
                                                    elseif($price) :
                                                        echo wc_price( $price );
                                                        //echo $price;    
                                                    endif; ?> 
                                                </span>
                                            </span>

                                                <?php if($tipo_embalagem[0]->name){ ?>
                                                    <span class="det">cada <?php echo $tipo_embalagem[0]->name; ?></span>
                                                <?php } ?>
                                        </span>
                                    </div>
                                </a>
                            </div>


                        <?php endwhile;
                        wp_reset_query();
                    ?>
                </div>

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

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript">
    jQuery.noConflict();
    var owl = jQuery('.slide-categoria');
    owl.owlCarousel({
        items: 4,
        margin: 0,
        loop: false,
        nav:true,
        margin: 20,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        navClass: ['owl-prev', 'owl-next']
    })
</script>

<?php endif; ?>
