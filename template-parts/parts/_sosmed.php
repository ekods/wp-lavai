<ul>
<?php
  $themes_ig = myprefix_get_theme_option( 'themes_instagram' );
  if (!empty( $themes_ig )) {
    echo '<li><a href="'. $themes_ig .'" target="_blank"><i class="fab fa-instagram"></i></a></li>';
  }
?>
<?php
  $themes_fb = myprefix_get_theme_option( 'themes_facebook' );
  if (!empty( $themes_fb )) {
    echo '<li><a href="'. $themes_fb .'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
  }
?>
</ul>