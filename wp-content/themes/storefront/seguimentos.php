<section class="box-content categorias-destaque no-padding">
	<div class="container">

		<div class="slide-categoria list-produto owl-carousel owl-theme">
				
			<?php 
				$tags = get_terms( 'product_tag' );
				foreach ( $tags as $tag ){//var_dump($tag);  echo $tag->taxonomy . '_' . $tag->term_id; ?>

					<?php 
						//$image_tag = het_field('imagem_tag',)//wp_get_attachment_url(get_woocommerce_term_meta( $tag->term_id, 'thumbnail_id', true ));
						//if($image_tag){ ?>

							<div class="item">
								<a href="<?php echo get_term_link($tag->term_id,'product_tag'); ?>" title="<?php echo $tag->name; ?>">
									<span class="img-cat"><span style="background-image: url(<?php the_field('imagem_tag',$tag->taxonomy . '_' . $tag->term_id); ?>)"></span></span>
									<span class="tit-categoria"><?php echo $tag->name; ?></span>
								</a>
							</div>

					<?php //} ?>
 
			<?php } ?>

		</div>
	</div>
</section>



<?php /*
$terms = get_terms( 'product_tag' );
$term_array = array();
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    foreach ( $terms as $term ) {
        echo $term_array[] = $term->name;
    }
}*/
?>