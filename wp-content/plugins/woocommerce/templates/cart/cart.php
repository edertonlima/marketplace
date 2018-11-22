<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 3.1.0
 */
defined( 'ABSPATH' ) || exit;

wc_print_notices(); ?>

<div class="container">
    <div class="row">

        <div class="col-12">
            <?php do_action( 'woocommerce_before_cart' ); ?>

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
        </div>

        <div class="col-8">

            <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
                <?php do_action('woocommerce_before_cart_table'); ?>

                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents table carrinho" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name"><?php esc_html_e( 'Produto', 'woocommerce' ); ?></th>
                            <th class="product-quantity"><?php esc_html_e( 'Qtd.', 'woocommerce' ); ?></th>
                            <th class="product-entrega" width="140" align="center"><?php esc_html_e( 'Entrega', 'woocommerce' ); ?></th>
                            <th class="product-subtotal"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php do_action('woocommerce_before_cart_contents'); ?>

                        <?php
                        $sold_by = array();
                        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key); 

                            $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                            
                            ?>

                                <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                                    <?php /* <td class="product-remove">
                                        <?php
                                        echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                                        '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>', esc_url(WC()->cart->get_remove_url($cart_item_key)), __('Remove this item', 'woocommerce'), esc_attr($product_id), esc_attr($_product->get_sku())
                                                ), $cart_item_key);
                                        ?>
                                    </td> */ ?>

                                    <td class="product-thumbnail">
                                        <?php
                                        $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

                                        if (!$product_permalink) {
                                            echo $thumbnail;
                                        } else {
                                            printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                                        }
                                        ?>
                                    </td>

                                    <td class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
                                        <?php
                                        if (!$product_permalink) {
                                            echo apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;';
                                        } else {
                                            echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key);
                                        }

                                        // Meta data
                                        echo WC()->cart->get_item_data($cart_item);

                                        // Backorder notification
                                        if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                            echo '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>';
                                        }
                                        ?>
                                    </td>



                                    <?php /*<td class="product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                                        <?php
                                        echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                                        ?>
                                    </td> */?>



                                    <td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
                                        <?php
                                        if ($_product->is_sold_individually()) {
                                            $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                        } else {
                                            $product_quantity = woocommerce_quantity_input(array(
                                                'input_name' => "cart[{$cart_item_key}][qty]",
                                                'input_value' => $cart_item['quantity'],
                                                'max_value' => $_product->get_max_purchase_quantity(),
                                                'min_value' => '0',
                                                    ), $_product, false);
                                        }

                                        echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                                        ?>

                                        <?php
                                            // @codingStandardsIgnoreLine
                                            echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                                '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">remover</a>',
                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                __( 'Remove this item', 'woocommerce' ),
                                                esc_attr( $product_id ),
                                                esc_attr( $_product->get_sku() )
                                            ), $cart_item_key ); 
                                        ?>

                                    </td>


                                    <td class="entrega">
                                        <?php 
                                            $tempo_entrega = get_the_terms( $product_id, 'pa_tempo-de-entrega' ); 

                                            if($tempo_entrega[0]->name){
                                                echo $tempo_entrega[0]->name ;
                                            }else{
                                                echo '...';
                                            }
                                        ?>
                                    </td>


                                    <td class="product-subtotal" data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>">
                                        <?php
                                            echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);

                                            $vendedor_subtotal[] = apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal_noSimbol($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
                                        ?>
                                    </td>
                                </tr>

        <?php
            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {

               
            ?>

                <?php

                    if(isset($cart_item['sold_by']) && !in_array($cart_item['sold_by'], $sold_by) ): 
                        $sold_by[] = $cart_item['sold_by']; 
                        $sold_by_user = get_userdata((int)$cart_item['sold_by']);

                        $vendedor = get_wcmp_vendor($sold_by_user->ID);
                ?>

                <tr class="info-vendedor">
                    <td colspan="6">
                        
                        <div class="row-item">
                            Subtotal 
                            <span class="valor-sub">
                                <strong>                      

                                    <?php 
                                        $vendedor_total = 0;
                                        foreach ($vendedor_subtotal as $sub_id => $sub) {
                                            $vendedor_total = $vendedor_total+$sub; 
                                        }
                                        echo wc_price($vendedor_total);
                                    ?>

                                    <?php 
                                        $vendedor_subtotal = array();
                                    ?>
                                
                                </strong>
                            </span>
                        </div>
                        
                        <div class="row-item"><strong>Frete: </strong>
                        	<span class="valor-sub"><strong>

                        		<?php wc_cart_totals_shipping_total_vendedor($sold_by_user->display_name); ?>

                        	</strong></span>
                        </div>
                        <div class="row-item">
                            <strong>Vendido por: </strong>
                            <a href="<?php echo $vendedor->permalink; ?>"><strong><?php echo $sold_by_user->display_name; ?></strong></a>
                        </div>

                        <?php if($vendedor_total < get_field('valor_minimo_frete', 'user_'.$sold_by_user->ID)){ ?>
	                        <div class="msg-loja">
	                            Esta loja exige pedido mínimo de <strong><?php echo wc_price(get_field('valor_minimo_frete', 'user_'.$sold_by_user->ID)); ?></strong>
	                        </div>
                        <?php } ?>
                            
                    </td>
                </tr>

                    <thead>
                        <tr>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name"><?php esc_html_e( 'Produto', 'woocommerce' ); ?></th>
                            <th class="product-quantity"><?php esc_html_e( 'Qtd.', 'woocommerce' ); ?></th>
                            <th class="product-entrega" width="140" align="center"><?php esc_html_e( 'Entrega', 'woocommerce' ); ?></th>
                            <th class="product-subtotal"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
                        </tr>
                    </thead>

            <?php endif;
        ?>


                                        <?php
                                    }
                                }
                                ?>

                        <?php do_action('woocommerce_cart_contents'); ?>

                        <tr style="display: none;">
                            <td colspan="6" class="actions">

            <?php if (wc_coupons_enabled()) { ?>
                                    <div class="coupon">
                                        <label for="coupon_code"><?php _e('Coupon:', 'woocommerce'); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>" />
                                    <?php do_action('woocommerce_cart_coupon'); ?>
                                    </div>
            <?php } ?>

                                <input type="submit" class="button" id="atualiza_carrinho" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>" />

                                <?php do_action('woocommerce_cart_actions'); ?>

            <?php wp_nonce_field('woocommerce-cart'); ?>
                            </td>
                        </tr>

                                <?php do_action('woocommerce_after_cart_contents'); ?>
                    </tbody>
                </table>
                        <?php do_action('woocommerce_after_cart_table'); ?>
            </form>
        
        </div>

        <div class="col-4">
            <div class="cart-collaterals">
                <?php
                    /**
                     * Cart collaterals hook.
                     *
                     * @hooked woocommerce_cross_sell_display
                     * @hooked woocommerce_cart_totals - 10
                     */ 
                    do_action( 'woocommerce_cart_collaterals' );
                ?>
            </div>
        </div>

        <div class="col-12">
            <?php do_action( 'woocommerce_after_cart' ); ?>
        </div>

    </div>
</div>


<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.quantity input').change(function(){
            jQuery('#atualiza_carrinho').trigger( "click" );
        });
    });
</script>

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