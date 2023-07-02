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