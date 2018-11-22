<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php 
	/*$titulo_princ = get_field('titulo', 'option');
	$descricao_princ = get_field('descricao', 'option');
	
	$keywords = get_field('palavras_chave', 'option');
	if(get_field('keywords')){
		$keywords = $keywords.', '.get_field('keywords');
	}

	$titulo = get_the_title();
	$descricao = get_the_excerpt();
	
	$imagem_princ = get_field('imagem_principal', 'option');
	$url = get_home_url();
	$imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );

	if(is_tax()){
		$terms = get_queried_object();
		$titulo = $terms->name;
		$descricao = $terms->description;
		$imagem = get_field('imagem_listagem',$terms->taxonomy.'_'.$terms->term_id);
		$url = get_term_link($terms->term_id);
	}

	if(is_archive()){
		$titulo = get_field('titulo_pagina','option');
		$descricao = get_field('descricao_pagina','option');
		$imagem = get_field('imagem_pagina','option');
		$url = $url.'/produtos';
	}

	if(is_single()){
		$titulo = get_the_title();
		$descricao = get_the_excerpt();
		
		if($imgPage[0] != ''){
			$imagem = $imgPage[0];	
		}			
		$url = get_the_permalink();
	}

	if(($titulo == '') or ($titulo == 'Home')){
		$titulo = $titulo_princ;
	}else{
		$titulo = $titulo.' - '.$titulo_princ;
	}
	
	if($descricao == ''){
		$descricao = $descricao_princ;
	}*/

	$autor = '';
	$imagem = '';
	$titulo = '';
	$descricao = '';
	$keywords = '';
?>

<!--<meta name="viewport" content="width=device-width, initial-scale=1" />-->
<link rel="shortcut icon" href="<?php //the_field('favicon', 'option'); ?>" type="image/x-icon" />
<link rel="icon" href="<?php //the_field('favicon', 'option'); ?>" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="pt" />
<meta name="rating" content="General" />
<meta name="description" content="<?php echo $descricao; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="robots" content="index,follow" />
<meta name="author" content="<?php echo $autor; ?>" />
<meta name="language" content="pt-br" />
<meta name="title" content="<?php echo $titulo; ?>" />

<!-- SOCIAL META -->
<meta itemprop="name" content="<?php echo $titulo; ?>" />
<meta itemprop="description" content="<?php echo $descricao; ?>" />
<meta itemprop="image" content="<?php echo $imagem; ?>" />

<html itemscope itemtype="<?php echo $url; ?>" />
<link rel="image_src" href="<?php echo $imagem; ?>" />
<link rel="canonical" href="<?php echo $url; ?>" />

<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $titulo; ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $descricao; ?>" />
<meta property="og:image" content="<?php echo $imagem; ?>" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:site_name" content="<?php echo $titulo_princ; ?>" />
<meta property="fb:admins" content="<?php echo $autor; ?>" />
<meta property="fb:app_id" content="1205127349523474" /> 

<meta name="twitter:card" content="summary" />
<meta name="twitter:url" content="<?php echo $url; ?>" />
<meta name="twitter:title" content="<?php echo $titulo; ?>" />
<meta name="twitter:description" content="<?php echo $descricao; ?>" />
<meta name="twitter:image" content="<?php echo $imagem; ?>" />
<!-- SOCIAL META -->

<title><?php echo $titulo; ?></title>

<?php wp_head(); ?>

<!-- CSS -->
<!--<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/woocommerce/woocommerce.css" media="screen" />-->

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.min.css" type="text/css" media="screen" />

<?php /*if(is_single('minha-area')){ ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/jquery.dataTables.min.css" type="text/css" media="screen" />
<?php } */?>

<!-- JQUERY -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>


<script type="text/javascript">
	jQuery.noConflict();

	jQuery(document).ready(function(){

		jQuery('.menu-mobile').click(function(){
			if(jQuery(this).hasClass('active')){
				jQuery('.header__navigation').removeClass('active');
				jQuery(this).removeClass('active');
				jQuery('.header').removeClass('active');
			}else{
				jQuery('.header__navigation').addClass('active');
				jQuery(this).addClass('active');
				jQuery('.header').addClass('active');
			}
		});

		scroll_body = jQuery(window).scrollTop();
		if(scroll_body > 500){
			jQuery('.header').addClass('scroll_menu');
		}
	});	

	jQuery(window).load(function(){
		if(((jQuery('body').height())+200) < jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}
	});
	
	jQuery(window).resize(function(){
		jQuery('.menu-mobile').removeClass('active');
		jQuery('.header').removeClass('active');
		jQuery('.header__navigation').removeClass('active');

		if(((jQuery('body').height())+200) < jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}
	});

	jQuery(window).scroll(function(){
		scroll_body = jQuery(window).scrollTop();
		if(scroll_body > 400){
			jQuery('.header').addClass('scroll_menu');
		}else{
			jQuery('.header').removeClass('scroll_menu');
		}
	});
</script>

<!-- CHAT -->
<?php /*
	if(get_field('chat', 'option')){
		the_field('chat', 'option');
	}*/
?>
<!-- CHAT -->

</head>
<body <?php body_class(); ?>>

	<!-- ANALYTICS -->
	<?php /* if(get_field('analytics', 'option')){ ?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', '<?php the_field('analytics', 'option'); ?>', 'auto');
			ga('send', 'pageview');
		</script>
	<?php } */ ?>
	<!-- ANALYTICS -->

	<?php if(is_front_page()){ 
		if(get_field('imagem_banner_topo',28)){ 
			if(get_field('url_banner_topo',28)){ ?>
				<a href="<?php the_field('url_banner_topo',28); ?>" class="anuncio-topo" style="background-image: url('<?php the_field('imagem_banner_topo',28); ?>');"></a>
			<?php }else{ ?>
				<div class="anuncio-topo" style="background-image: url('<?php the_field('imagem_banner_topo',28); ?>');"></div>
			<?php } 
		}
	} ?>

	<header class="header">
		<div class="container">
			
			<h1>
				<a href="<?php echo get_home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png">
				</a>
			</h1>

			<div class="header-dir">
				<div class="busca">
					<form>

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
						?>

						<span class="filtro-busca">Todo o site <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seta-menu.png"> </span>
						<input type="text" name="" class="busca-header">
						<button class="busca-lupa"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/lupa.png"></button>
					</form>
				</div>

				<div class="item-topo user-login">
					<?php if( is_user_logged_in() ){ ?>

						<?php global $current_user;
							wp_get_current_user();

							//var_dump($current_user);
							//echo 'Username: ' . $current_user->user_login . "\n";
							//echo 'User display name: ' . $current_user->display_name . "\n";
						?>

						<span class="login active">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.png">
							<span>Olá, <?php echo strtoupper($current_user->display_name); ?></span>
						</span>

						<span class="logout">
							<a href="<?php echo get_home_url(); ?>/?page_id=8&customer-logout&_wpnonce=3b570ada07" title="Finalizar">Finalizar</a>
						</span>

					<?php }else{ ?>

						<a href="<?php echo get_permalink(get_page_by_path('my-account')); ?>" class="login">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.png">
							<span>Olá, faça seu login<br>ou cadastre-se</span>
						</a>

					<?php } ?>
				</div>

				<div class="item-topo carrinho">
					<a href="<?php echo get_permalink(get_page_by_path('cart')); ?>" class="login">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/carrinho.png">

						<span><strong>

							<?php
								global $woocommerce;
								echo $count = $woocommerce->cart->cart_contents_count;
							?>

							<?php 
								/*global $woocommerce;
								$items_cart = $woocommerce->cart->get_cart();
								//var_dump($items_cart); 

								//$qtd_cart = 0;
								echo count($items_cart);
								/*foreach ($items_cart as $key => $item_carrinho) {
									echo $item_carrinho['quantity'];
									$qtd_cart = $qtd_cart+$item_carrinho->quantity;
								}*/
							?>

							<?php //echo $qtd_cart; ?>

						</strong><br>itens</span>

					</a>
				</div>
			</div>

			<nav class="nav-header">
				<ul>
					<li class="nav-area">
						<span>
							<i class="fa fa-bars" aria-hidden="true"></i> COMPRE POR ÁREA <i class="fa fa-angle-down" aria-hidden="true"></i>
						</span>
						<ul class="sub-nav">

							<?php
								foreach ( $categories as $categoria ){ 
									//if($categoria->term_id != $category->term_id ){ ?>

										<li>
											<a href="<?php echo get_term_link($categoria->term_id); ?>" title="<?php echo $categoria->name; ?>">
												<span><?php echo $categoria->name; ?></span>
											</a>
										</li>
									
								<?php //}
								}
							?>

						</ul>
					</li>
					<li>
						<a href="<?php echo get_home_url(); ?>/product-category/recomendados" class="<?php if(is_category('recomendados')){ echo 'active'; } ?>">RECOMENDADOS PARA SEU NEGÓCIO</a>
					</li>
					<li>
						<a href="<?php echo get_home_url(); ?>/product-category/ofertas" class="<?php if(term_exists( 'Uncategorized', 'product-category' )){ echo 'active'; } ?>">OFERTAS DO DIA</a>
					</li>
					<li>
						<a href="<?php echo get_permalink(get_page_by_path('my-account')); ?>" class="<?php if(is_page('my-account')){ echo 'active'; } ?>">MINHA CONTA</a>
					</li>
					<li class="nav-dir">
						<a href="<?php echo get_permalink(get_page_by_path('fidelidade')); ?>" class="<?php if(is_page('fidelidade')){ echo 'active'; } ?>"><?php echo get_the_title(get_page_by_path('fidelidade')); ?></a>
						<a href="<?php echo get_permalink(get_page_by_path('venda-conosco')); ?>" class="<?php if(is_page('venda-conosco')){ echo 'active'; } ?>"><?php echo get_the_title(get_page_by_path('venda-conosco')); ?></a>
						<a href="<?php echo get_permalink(get_page_by_path('my-account')); ?>orders" class="<?php if( is_wc_endpoint_url( 'orders' ) ){ echo 'active'; } ?>">MEUS PEDIDOS</a>
					</li>
				</ul>
			</nav>

		</div>
	</header>