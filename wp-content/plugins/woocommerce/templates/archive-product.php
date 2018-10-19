<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<section class="box-content categoria">
	<div class="container">
		<div class="row">

			<div class="col-3">				
				<div class="filtro-cat">

					<h3>Filtre sua pesquisa</h3>
					<ul class="atributo-filtro">
						<li>							
							<span class="tit-atributo">Volume</span>
							<ul class="itens-atributo-filtro">
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>200ml</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>400ml</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>500ml</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>800ml</span>
								</li>
							</ul>
						</li>

						<li>							
							<span class="tit-atributo">Tamanho</span>
							<ul class="itens-atributo-filtro">
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>50mm x 60mm</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>60mm x 50mm</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>45mm x 70mm</span>
								</li>
							</ul>
						</li>

						<li>							
							<span class="tit-atributo">Quantidade</span>
							<ul class="itens-atributo-filtro">
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>Pacores com 20un.</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>Pacores com 50un.</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>Pacores com 100un.</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>Pacores com 200un.</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>Pacores com 500un.</span>
								</li>
							</ul>
						</li>

						<li>							
							<span class="tit-atributo">Cor</span>
							<ul class="itens-atributo-filtro">
								<li class="cor">
									<input type="checkbox" name="" class="filtro-cor" style="background-color: #ffffff;">
								</li>
								<li class="cor">
									<input type="checkbox" name="" class="filtro-cor" style="background-color: #4990e2;">
								</li>
								<li class="cor">
									<input type="checkbox" name="" class="filtro-cor" style="background-color: #f5a623;">
								</li>
								<li class="cor">
									<input type="checkbox" name="" class="filtro-cor" style="background-color: #a3a3a3;">
								</li>
								<li class="cor">
									<input type="checkbox" name="" class="filtro-cor" style="background-color: #4a4a4a;">
								</li>
								<li class="cor">
									<input type="checkbox" name="" class="filtro-cor" style="background-color: #b9e986;">
								</li>
								<li class="cor">
									<input type="checkbox" name="" class="filtro-cor" style="background-color: #d10119;">
								</li>
								<li class="cor">
									<input type="checkbox" name="" class="filtro-cor" style="background-color: #bd0fe0;">
								</li>
							</ul>
						</li>

						<li>							
							<span class="tit-atributo">Uso</span>
							<ul class="itens-atributo-filtro">
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>Bebidas Frias</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>Bebidas Quentes</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>Bebidas Quentes e Frias</span>
								</li>
							</ul>
						</li>

						<li>							
							<span class="tit-atributo">Materias</span>
							<ul class="itens-atributo-filtro">
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>Papel</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>Plástico</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>Isopor</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>Polypropileno</span>
								</li>
								<li>
									<input type="checkbox" name="" class="filtro-check">
									<span>Poliestireno</span>
								</li>
							</ul>
						</li>
					</ul>

				</div>
			</div>

			<div class="col-9">
				<header class="woocommerce-products-header">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
					<?php endif; ?>

					<?php
					/**
					 * Hook: woocommerce_archive_description.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					//do_action( 'woocommerce_archive_description' );
					?>
				</header>

				<?php
				if ( woocommerce_product_loop() ) {

					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked wc_print_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );

					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 *
							 * @hooked WC_Structured_Data::generate_product_data() - 10
							 */
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}

				/**
				 * Hook: woocommerce_after_main_content.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );

				/**
				 * Hook: woocommerce_sidebar.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				//do_action( 'woocommerce_sidebar' );

				get_footer( 'shop' ); ?>

			</div>

		</div>
	</div>
</section>
