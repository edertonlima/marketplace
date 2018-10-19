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

<meta name="viewport" content="width=device-width, initial-scale=1" />
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

<!-- CSS -->
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
		if(scroll_body > 400){
			jQuery('.header').addClass('scroll_menu');
		}
	});	

	jQuery(window).load(function(){
		if(((jQuery('body').height())+400) < jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}
	});
	
	jQuery(window).resize(function(){
		jQuery('.menu-mobile').removeClass('active');
		jQuery('.header').removeClass('active');
		jQuery('.header__navigation').removeClass('active');

		if(((jQuery('body').height())+400) < jQuery(window).height()){
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

	<div class="anuncio-topo" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/anuncio-top.jpg');"></div>

	<header class="header">
		<div class="container">
			
			<h1>
				<a href="javscript:">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png">
				</a>
			</h1>

			<div class="header-dir">
				<div class="busca">
					<form>
						<span class="filtro-busca">Todo o site <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seta-menu.png"> </span>
						<input type="text" name="" class="busca-header">
						<button class="busca-lupa"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/lupa.png"></button>
					</form>
				</div>

				<div class="item-topo user-login">
					<a href="javascript:" class="login">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.png">
						<span>Olá, faça seu login<br>ou cadastre-se</span>
					</a>
				</div>

				<div class="item-topo carrinho">
					<a href="javascript:" class="login">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/carrinho.png">
						<span><strong>10</strong><br>itens</span>
					</a>
				</div>
			</div>

		</div>
	</header>
