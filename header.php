<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<?php wp_site_icon() ?>

<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
  <header id="header">
    <div class="header-inner-wrapper">
      <div class="nonsticky-header">
        <div class="logo-wrapper">
          <div class="logo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/GGroup-LogoType-White.svg">
          </div>
        </div>
      </div>

      <div class="sticky-header">
        <div class="logo-wrapper">
          <div class="logo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/GGroup-LogoType-White.svg">
          </div>
        </div>
        <div class="site-tagline">
          <?php bloginfo('description'); ?>
        </div>

        <nav id="header-menu">
          <div id="menu">
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
          </div>
        </nav>
        <div class="lets-get-weird">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lets-get-weird.png">
        </div>
      </div>

    </div>
  </header>
  <div id="container">
