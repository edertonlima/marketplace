<?php if(count(get_field('slide'))){ ?>
	<!-- slide -->
	<section class="box-content box-slide no-padding">
		<div class="slide">

			<?php if(count(get_field('slide')) > 1){ ?>
				<div class="controle-slide">
					<a class="left" href="#slide" role="button" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
					<a class="right" href="#slide" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
				</div>
			<?php } ?>

			<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

				<div class="carousel-inner" role="listbox">

					<?php if( have_rows('slide') ):
						$slide = 0;
						while ( have_rows('slide') ) : the_row();
							$slide = $slide+1;

							if(get_sub_field('imagem')){ ?>

								<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

									<div class="box-height">
										<div class="box-texto">
											<div class="mid-texto">
											
												<p class="texto"><?php the_sub_field('texto'); ?></p>
												<?php if(get_sub_field('sub_texto')){ ?>
													<p class="sub-texto"><?php the_sub_field('sub_texto'); ?></p>
												<?php } ?>

												<?php if(get_sub_field('link')){ ?>
													<a href="<?php the_sub_field('link'); ?>" class="btn btn-slide"><?php the_sub_field('tit_link'); ?></a>
												<?php } ?>

											</div>
										</div>
									</div>
									
								</div>

							<?php }

						endwhile;
					endif; ?>

				</div>

			</div>
		</div>
	</section>
<?php } ?>