<?php get_header(); ?>

<?php get_template_part( 'slide' ); ?>	

<section class="box-content">
	<div class="container">

		<?php if( have_rows('blocos_pagina') ):
			while ( have_rows('blocos_pagina') ) : the_row(); ?>

				<div class="box-info-home box-info-page">
					<div class="conteudo-info">
						<img src="<?php the_sub_field('icone'); ?>">
						<h3><?php the_sub_field('titulo'); ?></h3>
						<ul>
							<?php while ( have_rows('descricao') ) : the_row(); ?>
								<li><?php the_sub_field('texto'); ?></li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>

			<?php endwhile;
		endif; ?>

		<div class="comece-vender">
			<h3>Comece a vender já</h3>
			<a href="javascript:" class="btn btn-criar-conta">Criar conta agora!</a>
		</div>

	</div>
</section>

<?php get_footer(); ?>