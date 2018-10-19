<section class="box-content categorias-destaque no-padding">
	<div class="container">

		<div class="slide-categoria list-produto owl-carousel owl-theme">
				
			<?php 
				$args = array(
				    'taxonomy'      => 'product_cat',
				    'parent'        => 0,
				    'orderby'       => 'name',
				    'order'         => 'ASC',
				    'hierarchical'  => 1,
				    'pad_counts'    => 0
				);
				$categories = get_categories( $args );
				foreach ( $categories as $categoria ){  ?>

					<?php 
						$image_cat = wp_get_attachment_url(get_woocommerce_term_meta( $categoria->term_id, 'thumbnail_id', true ));
						if($image_cat){ ?>

							<div class="item">
								<a href="<?php echo get_term_link($categoria->term_id,'product_cat'); ?>" title="<?php echo $categoria->name; ?>">
									<span class="img-cat"><span style="background-image: url(<?php echo $image_cat; ?>)"></span></span>
									<span class="tit-categoria"><?php echo $categoria->name; ?></span>
								</a>
							</div>

					<?php } ?>

			<?php } ?>

		</div>
	</div>
</section>