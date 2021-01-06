<?php require('superheader.php') ?>
  <header id="header">
    <div class="header-inner-wrapper">
      <div class="nonsticky-header">
        <div class="logo-wrapper">
          <div class="logo">
            <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/GGroup-LogoType-White.svg"></a>
          </div>
        </div>
      </div>

      <div class="sticky-header">
        <div class="logo-wrapper">
          <div class="logo">
            <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/GGroup-LogoType-White.svg"></a>
          </div>
        </div>
        <div class="tagline-and-menu">
          <div class="site-tagline">
            <?php bloginfo('description'); ?>
          </div>

          <nav id="header-menu">
            <div id="menu">
              <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
            </div>
          </nav>
        </div>
        <div class="lets-get-weird">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lets-get-weird.png">
        </div>
      </div>

    </div>
  </header>
  <div id="container">
