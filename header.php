<?php
/**
 * The header for our theme.
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<?php wp_head(); ?>

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

</head>

<body id="top" <?php body_class(); ?>>
<div class="all-svg"><?php include_once(get_template_directory()."/assets/svg/svg.svg"); //all svgs ?></div>
<a class="skip-link screen-reader-text" href="#site_content"><?php esc_html_e( 'Skip to content', 'knd' ); ?></a>

<header id="site_header" class="site-header container">
	<nav class="ll-nav-desktop">
		<a href="<?php echo site_url();?>" class="logo-link">
			<svg class="ll-logo-label-hor"><use xlink:href="#pic-logo-label-hor" /></svg>
		</a>
		
		<div class="nav-menus">
			<?php wp_nav_menu(array('menu' => 'primary', 'container' => false, 'menu_class' => 'd-flex text-menu'));?>
		</div>
		
		<a class="btn btn-outline-primary ll-install-leyka-btn" href="<?php echo get_theme_mod('ll_install_leyka_url');?>"><?php echo get_theme_mod('ll_label_install_leyka_caption');?></a>
		<a href="#" class="ll-open-mob-menu-btn"><svg class="ll-icon-mob-menu"><use xlink:href="#icon-mob-menu" /></svg></a>
	</nav>

	<div class="nav-mobile-overlay"></div>
	<nav class="ll-nav-mobile">
		<div class="ll-close-mob-menu">
			<a class="ll-close-mob-menu-btn" href="#"><svg><use xlink:href="#icon-close" /></svg></a>
		</div>
		
		<ul class="">
			<?php wp_nav_menu(array('menu' => 'primary', 'container' => false, 'menu_class' => ''));?>
		</ul>
	</nav>
	
</header>

<div class="ll-site-header-separator"></div>

<div id="site_content" class="site-content">

