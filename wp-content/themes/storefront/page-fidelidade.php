<?php get_header(); ?>

	<?php get_template_part( 'slide' ); ?>

	<section class="box-content box-fidelidade">
		<div class="container">
			<div class="row">
				
				<div class="col-6">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-fidelidade.jpg" class="ico-fidelidade">
					<h3>Descontos exclusivos e bônus de fidelidade</h3>
				</div>
				<div class="col-6">
					<div class="cont-fidelidade">
						<p>Nosso programa de recompensas permite que você potencialize
						suas compras e economize cada vez mais.</p>
						<p>Somente na <strong>I-pack</strong> a cada compra você recebe pontos que pode
						trocar por descontos além de receber descontos em compras por
						volume.</p>
						<p>Na <strong>I-pack</strong> você compra desde a comodidade da sua casa ou
						empresa evitando perda de tempo com deslocamento a procura
						pelos fornecedores certos para seu negócio.</p>
						<p>Favorite os fornecedores ideais para seu negócio e ganhe tempo
						enquanto poupa dinheiro que pode re-investir na sua empresa.</p>
					</div>

					<a href="javascript:" class="btn btn-fidelidade">Criar conta agora!</a>
				</div>

			</div>			
		</div>
	</section>

	<?php get_template_part( 'destaque-semana' ); ?>

<?php get_footer(); ?>