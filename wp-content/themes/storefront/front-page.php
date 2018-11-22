<?php get_header(); ?>

<?php get_template_part( 'slide' ); ?>	

<?php get_template_part( 'seguimentos' ); ?>

<?php get_template_part( 'destaque-semana' ); ?>

<section class="box-content no-padding">
	<div class="container">

		<?php if( have_rows('blocos', 28) ):
			while ( have_rows('blocos', 28) ) : the_row(); ?>

				<div class="box-info-home">
					<div class="conteudo-info">
						<h3><?php the_sub_field('titulo'); ?></h3>
						<ul>
							<?php while ( have_rows('descricao', 28) ) : the_row(); ?>
								<li><?php the_sub_field('texto'); ?></li>
							<?php endwhile; ?>
						</ul>
					</div>
					<a href="<?php the_sub_field('url'); ?>" class="btn btn-cadastrar"><?php the_sub_field('titulo_url'); ?></a>
				</div>

			<?php endwhile;
		endif; ?>

	</div>
</section>



<?php /*

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide') ):
					$slide = 0;
					while ( have_rows('slide') ) : the_row();

						if(get_sub_field('imagem')){
							$slide = $slide+1; ?>

							<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

								<div class="box-height">
									<div class="box-texto">
										
										<p class="texto"><?php the_sub_field('texto'); ?></p>
										<?php if(get_sub_field('sub_texto')){ ?>
											<p class="sub-texto"><?php the_sub_field('sub_texto'); ?></p>
										<?php } ?>

									</div>
								</div>
								
							</div>

						<?php }

					endwhile;
				endif; ?>

			</div>

			<ol class="carousel-indicators">
				
				<?php for($i=0; $i<$slide; $i++){ ?>
					<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
				<?php } ?>
				
			</ol>

		</div>
	</div>

	<a href="#continue_sonhando" class="link_ancora" title="Continue sonhando">
		<i class="fa fa-angle-down" aria-hidden="true"></i>
		<span>CONTINUE SONHANDO</span>
	</a>
</section>

<section class="box-content box-content-blog">
	<span id="continue_sonhando" class="link_page_ancora"></span>
	<div class="container">

		<p class="sub-tituto borda-efeito">Nós tiramos do papel sua ideia e concretizamos seus sonhos</p>

		<?php if( have_rows('ico_page_superior') ): ?>
			<ul class="ico-page">
				<?php while ( have_rows('ico_page_superior') ) : the_row(); ?>

					<li>
						<img src="<?php the_sub_field('icone'); ?>" class="" alt="<?php the_sub_field('titulo'); ?>"/>
						<span><?php the_sub_field('titulo'); ?></span>
					</li>

				<?php endwhile; ?>
			</ul>
		<?php endif; ?>	

		<?php
			$prod_list = get_posts(
				array(
					'posts_per_page' => 5,
					'post_type' => 'projetos'
				)
			);

			if(count($prod_list) > 0){ ?>
				<div class="grid">
					<div class="grid-sizer"></div>

					<?php foreach ( $prod_list as $produto ) { $terms = wp_get_post_terms( $produto->ID, 'categoria_projeto' ); ?>

						<div class="grid-item">
							<div class="">
								<a href="<?php the_permalink($produto->ID); ?>" title="<?php echo $produto->post_title; ?>">
									<article class="item">

										<img src="<?php the_field('imagem_listagem', $produto->ID); ?>" class="img-grid" alt="<?php echo $produto->post_title; ?>"/>

										<div class="hover-grid">
											<div class="cont-hover">
												<img src="<?php the_field('ico_listagem',$terms[0]->taxonomy.'_'.$terms[0]->term_id); ?>" class="" alt=""/>
												<span><?php echo $produto->post_title; ?></span>
												<?php echo $terms[0]->name; ?>
											</div>
										</div>
									</article>
								</a>
							</div>
						</div>

					<?php } ?>

				</div>
			<?php }
		?>		

		<p class="sub-tituto borda-efeito">Trabalhamos para transformar ideias em serviços e produtos referências em seu segmento.</p>
		
		<?php if( have_rows('ico_page_inferior') ): ?>
			<ul class="ico-page ico-page-inferior">
				<?php while ( have_rows('ico_page_inferior') ) : the_row(); ?>

					<li>
						<img src="<?php the_sub_field('icone'); ?>" class="" alt="<?php the_sub_field('titulo'); ?>"/>
						<span><?php the_sub_field('titulo'); ?></span>
					</li>

				<?php endwhile; ?>
			</ul>
		<?php endif; ?>	
	
	</div>
</section>

<section class="box-content box-msg" style="background-image: url('<?php the_field('imagem_destaque'); ?>');">
	<div class="box-height">
		<div class="box-texto">
			
			<p class="texto"><?php the_field('texto_destaque'); ?></p>
			<?php if(get_field('sub_texto_destaque')){ ?>
				<p class="sub-texto"><?php the_field('sub_texto_destaque'); ?></p>
			<?php } ?>

		</div>
	</div>
</section>

<section class="box-content box-sobre sombra">
	<div class="container">
		
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_cafe.png" class="ico_cafe" alt=""/>
		<p class="sub-tituto borda-efeito">Trabalhamos para transformar ideias em serviços e produtos referências em seu segmento.</p>
		<a href="#" class="button" title="Quero Agendar">Quero Agendar</a>

		<p class="sub-tituto sub-titulo-icone borda-efeito">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_news.png" class="" alt=""/>
			Newsletter
		</p>

		<form class="news" action="javascript:">
			<input type="text" name="email_news" placeholder="Escreva seu email aqui...">
			<button class="news"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/button_news.png" class="" alt=""/></button>
		</form>

	</div>
</section>

*/ ?>

<?php get_footer(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript">
	jQuery.noConflict();
	var owl = jQuery('.slide-categoria');
	owl.owlCarousel({
		margin: 0,
		loop: false,
		nav:true,
		autoWidth: 230,
		margin: 20,
		navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
		navClass: ['owl-prev', 'owl-next']
	})
</script>

<?php /*
<script type="text/javascript">
	jQuery(document).ready(function(){	    

		// FORM
		jQuery(".enviar").click(function(){
			jQuery('.enviar').html('ENVIANDO').prop( "disabled", true );
			jQuery('.msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var telefone = jQuery('#telefone').val();
			var assunto = jQuery('#assunto').val();
			var mensagem = jQuery('#texto').val();
			var para = '<?php get_field('email', 'option'); ?>';
			var nome_site = '<?php get_field('titulo', 'option'); ?>';

			if(email!=''){
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, telefone:telefone, assunto:assunto, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						resultado = 'Enviado com sucesso! Obrigado.';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('form').trigger("reset");
					jQuery('.enviar').html('CADASTRAR').prop( "disabled", false );
				});
			}else{
				jQuery('.msg-form').addClass('erro').html('Por favor, digite um e-mail válido.');
				jQuery('.enviar').html('CADASTRAR').prop( "disabled", false );
			}
		});
		
	});

	jQuery(window).load(function(){
		jQuery('.grid-item').each(function(){
			jQuery('.hover-grid',this).height(jQuery(this).height());
		});
	});

	jQuery(window).resize(function(){
		jQuery('.grid-item').each(function(){
			jQuery('.hover-grid',this).height(jQuery(this).height());
		});
	});
</script>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/masonry.pkgd.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/imagesloaded.pkgd.js" type="text/javascript"></script>
<script type="text/javascript">
	var $grid = jQuery('.grid').masonry({
		itemSelector: '.grid-item',
		percentPosition: true,
		columnWidth: '.grid-sizer'
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
		$grid.masonry();
	});  
</script>
*/ ?>