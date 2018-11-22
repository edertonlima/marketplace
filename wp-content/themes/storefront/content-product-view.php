<?php
/**
 * Template used to display post content on single pages.
 *
 * @package storefront
 */

?>

<?php
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
	$product = wc_get_product( $post->ID ); 
	//var_dump($post);
	//var_dump($product);
?>

<?php wc_print_notices(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="container prod-det">

		<?php
			$category_ids = $product->category_ids; //var_dump($categorias);
		?>

		<ul class="crumbs">
			<?php 
				foreach ($category_ids as $key => $value) { 
					$categoria = get_term( $value, 'product_cat' ); //var_dump($categoria); ?>

					<li><a href="<?php echo get_term_link($categoria->term_id); ?>" title="<?php echo $categoria->name; ?>"><?php echo $categoria->name; ?></a></li>

				<?php }
			?>
		</ul>

		<div class="row">			
			<div class="col-12">
				<span class="col-6 right nome-prod"><?php the_title(); ?></span>
			</div>

			<div class="col-6">
				<div class="galeria-prod">
					<div class="img-prod">
						<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>">
					</div>

					<?php
						$gallery_image_ids = $product->gallery_image_ids;
						if(count($gallery_image_ids)){ ?>

							<ul>
								<?php foreach ($gallery_image_ids as $key => $value) { ?>

									<li><a href="javascript:"><img src="<?php echo wp_get_attachment_image_src( $value , 'thumbnail' )[0]; ?>"></a></li>

								<?php } ?>
							</ul>

						<?php }
					?>		

				</div>
			</div>

			<div class="col-6">
				<div class="preco-unid" style="width: 100%!important; border: none;">
					<span class="det-qtd"></span>
					<span class=""><?php echo get_the_terms( $post->ID, 'pa_tipo-de-embalagem' )[0]->name; ?> com <?php echo get_the_terms( $post->ID, 'pa_qtd-da-embalagem' )[0]->name; ?> un.</span>
					<span class="preco"><?php echo $product->get_price_html(); ?></span>
					<span class="det-preco">cada <?php echo get_the_terms( $post->ID, 'pa_tipo-de-embalagem' )[0]->name; ?></span>
				</div>
				<?php /*
				<div class="preco-atacado">
					<span class="det-qtd">Compras acima de 10 pacotes</span>
					<span class="">Pacote com 500 un.</span>
					<span class="preco">R$ 16,00</span>
					<span class="det-preco">cada pacote</span>
				</div>
				*/ ?>


				<?php 
				//var_dump($WCMp);
 ?>

				<ul class="info-compra">
					<?php /* <li>Parcela até 6 vezes sem juros</li>*/?>
					<?php /*<li class="no-border">Vendido por: <a href="javascript:"></a></li>*/ ?>
					<?php /*<li>Pedido mínimo exigido pelo vendedor: <span>R$ 150,00</span></li>
					<li class="no-border">Em estoque. Envio realizado por correios.</li>*/ ?>
					<li>
						Digite seu CEP para calcular frete e prazo
						<form action="javascript:" class="calcular-frete">
							<input type="" name="">
							<button class="btn-cadastrar">CALCULAR</button>
						</form>
					</li>
					<li>
						<form id="form-comprar" action="javascript:">
							<input type="hidden" name="add_cart_cor" id="add_cart_cor" value="">
							<input type="hidden" name="add_cart_qtd" id="add_cart_qtd" value="1">
							<input type="hidden" name="add_cart_id" id="add_cart_id" value="<?php echo $post->ID; ?>">
							<a href="<?php the_permalink(); ?>?add-to-cart=<?php echo $post->ID; ?>&quantity=1" class="btn btn-comprar">COMPRAR</a>
							<!--<button class="btn-comprar" id="comprar">COMPRAR</button>-->
						</form>
					</li>
				</ul>
			</div>
		</div>

		<div class="block-produto">
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
					<span class="quantidade"><?php echo get_the_terms( $post->ID, 'pa_qtd-da-embalagem' )[0]->name; ?> unidades por <?php echo get_the_terms( $post->ID, 'pa_tipo-de-embalagem' )[0]->name; ?></span>
					<span class="preco">
						<span class="valor <?php if($product->sale_price != ''){ echo 'sale'; } ?>"><?php echo $product->get_price_html(); ?></span>
						<span class="det">cada <?php echo get_the_terms( $post->ID, 'pa_tipo-de-embalagem' )[0]->name; ?></span>
						
					</span>
				</a>
			</div>


				<?php endwhile;
				wp_reset_query();
			?>
		</div>

		<div class="block-produto">
			<span class="title-block">Detalhes do produto</span>

			<div class="cont-prod">
				<span class="tit"><?php the_title(); ?></span>

				<?php the_content(); ?>

			</div>		
		</div>

		<div class="block-produto">
			<span class="title-block">Ficha técnica</span>

			<ul class="ficha-tecnica">
				<?php if(get_the_terms( $post->ID, 'pa_diametro' )[0]->name){ ?>
					<li>
						<span>Diâmetro:</span>
						<span>
							<?php
								foreach (get_the_terms( $post->ID, 'pa_diametro' ) as $key => $item) {
									echo '<strong>'.$item->name.'</strong>';
								}
							?>					
						</span>
					</li>
				<?php } ?>

				<?php if(get_the_terms( $post->ID, 'pa_altura' )[0]->name){ ?>
					<li>
						<span>Altura:</span>
						<span>
							<?php
								foreach (get_the_terms( $post->ID, 'pa_altura' ) as $key => $item) {
									echo '<strong>'.$item->name.'</strong>';
								}
							?>					
						</span>
					</li>
				<?php } ?>
				
				<?php if(get_the_terms( $post->ID, 'pa_largura' )[0]->name){ ?>
					<li>
						<span>Largura:</span>
						<span>
							<?php
								foreach (get_the_terms( $post->ID, 'pa_largura' ) as $key => $item) {
									echo '<strong>'.$item->name.'</strong>';
								}
							?>					
						</span>
					</li>
				<?php } ?>
				
				<?php if(get_the_terms( $post->ID, 'pa_volume' )[0]->name){ ?>
					<li>
						<span>Volume:</span>
						<span>
							<?php
								foreach (get_the_terms( $post->ID, 'pa_volume' ) as $key => $item) {
									echo '<strong>'.$item->name.'</strong>';
								}
							?>					
						</span>
					</li>
				<?php } ?>

				<?php if(get_the_terms( $post->ID, 'pa_material' )[0]->name){ ?>
					<li>
						<span>Material:</span>
						<span>
							<?php
								foreach (get_the_terms( $post->ID, 'pa_material' ) as $key => $item) {
									echo '<strong>'.$item->name.'</strong>';
								}
							?>					
						</span>
					</li>
				<?php } ?>

				<?php if(get_the_terms( $post->ID, 'pa_cores' )[0]->name){ ?>
					<li>
						<span>Cores:</span>
						<span>
							<?php
								foreach (get_the_terms( $post->ID, 'pa_cores' ) as $key => $item) {
									echo '<strong>'.$item->name.'</strong>';
								}
							?>					
						</span>
					</li>
				<?php } ?>
				
				<?php if(get_the_terms( $post->ID, 'pa_qtd-da-embalagem' )[0]->name){ ?>
					<li>
						<span>Quantidade:</span>
						<span>
							<?php
								foreach (get_the_terms( $post->ID, 'pa_qtd-da-embalagem' ) as $key => $item) {
									echo '<strong>'.$item->name.'</strong>';
								}
							?>					
						</span>
					</li>
				<?php } ?>
				
				<?php if(get_the_terms( $post->ID, 'pa_tipo-de-embalagem' )[0]->name){ ?>
					<li>
						<span>Vendido em:</span>
						<span>
							<?php
								foreach (get_the_terms( $post->ID, 'pa_tipo-de-embalagem' ) as $key => $item) {
									echo '<strong>'.$item->name.'</strong>';
								}
							?>					
						</span>
					</li>
				<?php } ?>
			</ul>
		</div>

	</div>

</article><!-- #post-## -->

<script type="text/javascript">
		jQuery("#comprar").click(function(){

				/*var data = {};
				data['add-to-cart'] = jQuery('#add_cart_id').val();
				data['quantity'] = jQuery('#add_cart_qtd').val();
				data['attribute_color'] =  jQuery('#add_cart_cor').val();
*/
				jQuery.ajax({
					type: "GET",
					url: "<?php echo get_template_directory_uri(); ?>/cart/?add-to-cart=39",
					complete : function() {
						location.reload();
					}
				});
				

				/*jQuery.getJSON("<?php echo get_template_directory_uri(); ?>", { add-to-cart:<?php echo $post->ID; ?> }, function(){		
					location.reload();
				});*/
		});
	
</script>