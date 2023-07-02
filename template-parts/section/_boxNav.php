<div class="boxNav">
  <div class="boxNav-col">
    <div class="boxNav-content">
        <h3>
          <?php echo __(pll__('Footer Subscribe'), 'lavai'); ?>
        </h3>

        <a href="javascript:void(0)" class="btn uppercase openSubscribe"><?php echo __(pll__('Subscribe'), 'lavai'); ?></a>
    </div>
  </div>

  <div class="boxNav-col brandLogo">
    <a href="<?= esc_url(home_url()) ?>">
      <?php
      global $polylang;
      $lang = pll_current_language();
      if($lang =='en'){
        $themes_logo_secondary = myprefix_get_theme_option( 'themes_logo_secondary' );
        if (!empty( $themes_logo_secondary )) { echo '<img src="' . $themes_logo_secondary . '" alt="" class="img-100">';	}
      }elseif ($lang =='fr') {
        $themes_logo_secondary_fr = myprefix_get_theme_option( 'themes_logo_secondary_fr' );
        if (!empty( $themes_logo_secondary_fr )) { echo '<img src="' . $themes_logo_secondary_fr . '" alt="" class="img-100">';	}
      } ?>
    </a>
  </div>


  <div class="boxNav-col">
    <div class="boxNav-content">

      <h3 class="mb-10"><?php echo __(pll__('Write to us'), 'lavai'); ?>:</h3>

      <?php
        $themes_email = myprefix_get_theme_option( 'themes_email' );
        if (!empty( $themes_email )) {
          echo '<p><a href="'. $themes_email .'" target="_blank" class="boxNav-link">'. $themes_email .'</a></p>';
        }
      ?>

    </div>
  </div>

</div>
