<section class="box-content no-padding">
	<div class="container">

		<h2 class="<?php if(!is_front_page()){ echo 'no-borda'; } ?>">Destaque da Semana</h2>

		<div class="">

			<?php
				query_posts(
					array(
						'post_type' => 'product',
						'posts_per_page' => '5'
					)
				);

				while ( have_posts() ) : the_post(); 
					$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); 
						if($imagem[0]== ''){
							$imagem = get_template_directory_uri() . '/assets/images/no-image-produto.jpg';
						}else{
							$imagem = $imagem[0];
						}
					$product = wc_get_product( $post->ID ); //var_dump($product); ?>


			<div class="prod-list">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<span class="img-prod">
						<img src="<?php echo $imagem; ?>" alt="<?php the_title(); ?>">
					</span>
					<span class="titulo"><?php the_title(); ?></span>
					<span class="medida">60mm x 50mm</span>
					<span class="quantidade">200 unidades por caixa</span>
					<span class="preco">
						<span class="valor <?php if($product->sale_price != ''){ echo 'sale'; } ?>">
							<?php echo $product->get_price_html(); ?>
						</span>
						<span class="det">cada caixa</span>
					</span>
				</a>
			</div>


				<?php endwhile;
				wp_reset_query();
			?>

		</div>

	</div>
</section>