<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
      <meta charset="<?php bloginfo('charset'); ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="author" content="Wolfactive - HuyNguyen - PhuongNam">
      <meta name="google-site-verification" content="Ts-mhqfK6lCO3Uf3l0sUPcSjUb_k9uA3uMwUvNdWCck" data-react-helmet="true">
      <meta name="google-site-verification" content="My7PemNYk5gKXBvX0xs49l59FgYG5TFAzXTrQUCEntI" data-react-helmet="true">
      <link rel="profile" href="https://wolfactive.net/">
      <link rel="preconnect" href="https://www.googletagmanager.com">
      <link rel="preconnect" href="https://pagead2.googlesyndication.com">
      <link rel="preload" href="<?php echo get_theme_file_uri('dist/css/webfonts/fa-brands-400.woff2') ?>" as="font" type="font/woff2" crossorigin>
      <link rel="preload" href="<?php echo get_theme_file_uri('dist/css/webfonts/fa-regular-400.woff2') ?>" as="font" type="font/woff2" crossorigin>
      <link rel="preload" href="<?php echo get_theme_file_uri('dist/css/webfonts/fa-solid-900.woff2') ?>" as="font" type="font/woff2" crossorigin>
      <link rel="preload" href="<?php echo get_theme_file_uri('dist/fonts/BalooThambi2-Bold.ttf') ?>" as="font" type="font/ttf" crossorigin>
      <link rel="preload" href="<?php echo get_theme_file_uri('dist/fonts/BalooThambi2-Medium.ttf') ?>" as="font" type="font/ttf" crossorigin>
      <link rel="preload" href="<?php echo get_theme_file_uri('dist/fonts/BalooThambi2-Regular.ttf') ?>" as="font" type="font/ttf" crossorigin>
      <link rel="preload" href="<?php echo get_theme_file_uri('dist/fonts/DancingScript.ttf') ?>" as="font" type="font/ttf" crossorigin>
      <link rel="preload" href="<?php echo get_theme_file_uri('dist/fonts/Lora.ttf') ?>" as="font" type="font/ttf" crossorigin>
      <link rel="stylesheet" href="<?php echo get_theme_file_uri('dist/css/main.css') ?>">     
      <script defer type='text/javascript' src="<?php echo get_theme_file_uri('dist/js/root.js') ?>"></script>
      <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async defer src="https://www.googletagmanager.com/gtag/js?id=UA-162705121-1"></script>
<?php get_template_part('sections/sidebar-mb'); ?>
<header class="header">
   <div class="main--background">
      <div class="header__contain container">
         <div class="header__item">
            <a href="<?php echo site_url(); ?>" class="d--block logo mr-auto">
               <?php
               $custom_logo_id = get_theme_mod( 'custom_logo' );
               $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                  ?>
            <img src="<?php echo $image[0]; ?>" alt="logo-wolfactive">
            </a>
         </div>
         <?php if(!wp_is_mobile()): ?>
         <div class="header__item dp--none">
            <?php
            wp_nav_menu(array(
            'theme_location' => 'main_nav' ));
            ?>
         </div>
         <?php endif; ?>
         <?php if(wp_is_mobile()): ?>
         <div class="header__item">
            <button class="btn text--light" id="navBtn" aria-label="btn-navbar">
               <i class="fas fa-bars icon--text"></i>
            </button>
         </div>
      <?php endif; ?>
  	 </div>
   </div>
   <?php if(wp_is_mobile()): ?>
   <div class="navbar--mobile">
  	 <?php
  	       wp_nav_menu(array(
  		 'theme_location' => 'main_nav' ));
  	 ?>
</div>
   <?php endif; ?>
</header>
<main>
<?php if(!wp_is_mobile()):
get_template_part('sections/navbar');
endif;
?>
