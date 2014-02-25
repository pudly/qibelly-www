<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package qibelly-rebuild
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="yes" />	    

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="//ajax.googleapis.com" rel="dns-prefetch">
<!--    <link href="assets/css/style.min.css" rel="stylesheet">-->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600' rel='stylesheet'>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
    <script src="assets/components/modernizr.js"></script>

    <?php wp_head(); ?>

  </head>  
  
  <body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>
  
    <header class="site-header" role="banner">
      <div class="site-branding">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="QiBelly Home"><h1 class="site-title"><?php bloginfo( 'name' ); ?></h1></a>
        
        <nav class="main-navigation" role="navigation">
          <h1 class="menu-toggle"><?php _e( 'Menu', 'qibelly-rebuild' ); ?></h1>
          <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
<!--
          <ul>
            <li><a href="">Classes</a></li>
            <li><a href="">Blog</a></li>
            <li><a href="">Videos</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
          </ul>
-->
        </nav>
        
        <form class="search-form" action="/" method="get" role="search">
          <label for="param_search">Search for:</label>
          <input type="text" class="search-field" placeholder="Search &hellip;" value="" name="s" id="param_search">
          <button type="submit" class="search-submit">Search</button>
        </form>
      </div>
    </header><!-- .site-header -->