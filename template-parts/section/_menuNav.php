<div class="overlay" id="overlay">
  <div class="overlay-slide-left">
    <div class="container">
      <div class="hamburger-menu active" id="hamburger-menu-2">
        <div class="menu-bar1"></div>
        <div class="menu-bar2"></div>
        <div class="menu-bar3"></div>
      </div>

      <div class="navOffcanvas">
        <div class="menuNav-box">
          <div class="brandLogo">
            <a href="<?= esc_url(home_url()) ?>">
              <?php
                $themes_logo_secondary = myprefix_get_theme_option( 'themes_logo_secondary' );
                if (!empty( $themes_logo_secondary )) { ?>
                  <img src="<?php echo $themes_logo_secondary; ?>" alt="" class="img-100">
              <?php	}	?>
            </a>
          </div>


          <?php
            wp_nav_menu( array(
                'menu' => 'Main Menu'
            ) );
          ?>

          <div li class="menuItem-l switcher">
            <ul><?php pll_the_languages();?></ul>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>