<?php
/**
 * Template used to display post content on single pages.
 *
 * @package storefront
 */

?>

<?php
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); 
	$product = wc_get_product( $post->ID ); 
	//var_dump($post);
	//var_dump($product);
?>

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
				<div class="preco-unid">
					<span class="det-qtd"></span>
					<span class="">Pacote com 500 un.</span>
					<span class="preco">R$ 20,00</span>
					<span class="det-preco">cada pacote</span>
				</div>

				<div class="preco-atacado">
					<span class="det-qtd">Compras acima de 10 pacotes</span>
					<span class="">Pacote com 500 un.</span>
					<span class="preco">R$ 16,00</span>
					<span class="det-preco">cada pacote</span>
				</div>

				<ul class="info-compra">
					<li>Parcela até 6 vezes sem juros</li>
					<li class="no-border">Vendido por: <a href="javascript:">Super Festa Casa de Embalagens</a></li>
					<li>Pedido mínimo exigido pelo vendedor: <span>R$ 150,00</span></li>
					<li class="no-border">Em estoque. Envio realizado por correios.</li>
					<li>
						Digite seu CEP para calcular frete e prazo
						<form action="javascript:" class="calcular-frete">
							<input type="" name="">
							<button class="btn-cadastrar">CALCULAR</button>
						</form>
					</li>
					<li>
						<button class="btn-comprar">COMPRAR</button>
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
								<span class="quantidade">200 unidades por caixa</span>
								<span class="preco">
									<span class="valor <?php if($product->sale_price != ''){ echo 'sale'; } ?>"><?php echo $product->get_price_html(); ?></span>
									<span class="det">cada caixa</span>
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

				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas cursus aliquet eros, quis semper ex consequat sodales. Fusce massa magna, elementum vehicula interdum non, rutrum quis nunc. Vivamus pretium eleifend neque vel pretium. Phasellus pretium urna a purus maximus, at suscipit eros faucibus. Sed at dapibus nunc. Etiam quis lobortis dui, ac malesuada metus. Quisque pharetra ligula id neque venenatis varius. Vestibulum eu nulla rutrum, condimentum justo a, commodo nisl. Cras fermentum dignissim tincidunt. Duis scelerisque hendrerit rhoncus. Aliquam quis lobortis elit. Quisque rhoncus gravida leo, et bibendum ligula. Morbi tempor nibh non justo egestas, vel efficitur quam pulvinar. Vivamus dapibus neque sed nulla vulputate vulputate et vel lacus. Suspendisse ac tincidunt nisl, eu condimentum massa.

				Aenean id euismod turpis, in mollis sem. Nullam vehicula, nisi ac iaculis viverra, tortor orci vehicula sapien, sit amet eleifend odio risus nec risus. Nunc at faucibus purus. Morbi consectetur orci ac lorem maximus pretium. In hac habitasse platea dictumst. Fusce ultricies tincidunt facilisis. Cras malesuada lectus vitae venenatis efficitur. Nam vitae erat rhoncus, malesuada dui id, dapibus libero.

				Maecenas suscipit leo id turpis interdum efficitur at blandit ligula. Suspendisse eu sapien quis ipsum laoreet mattis et vitae mauris. Integer mi turpis, maximus ut tincidunt ac, maximus id erat. Nullam scelerisque vitae enim in sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam consectetur semper eros, quis tincidunt mauris ultrices et. Curabitur in massa orci. Donec blandit massa sed sapien venenatis, non venenatis purus consectetur. Etiam varius dui pellentesque tristique mollis. Curabitur cursus magna eget sem interdum porttitor. Donec semper eros ut massa tristique interdum. Donec lobortis dictum interdum.
			</div>		
		</div>

		<div class="block-produto">
			<span class="title-block">Ficha técnica</span>

			<ul class="ficha-tecnica">
				<li>
					<span>Diâmetro:</span>
					<span>60 mm</span>
				</li>
				<li>
					<span>Altura:</span>
					<span>50 mm</span>
				</li>
				<li>
					<span>Largura:</span>
					<span>60 mm</span>
				</li>
				<li>
					<span>Volume:</span>
					<span>300 ml</span>
				</li>
				<li>
					<span>Quantidade:</span>
					<span>500 uni.</span>
				</li>
				<li>
					<span>Vendido em:</span>
					<span>Pacote</span>
				</li>
			</ul>
		</div>

	</div>

</article><!-- #post-## -->
