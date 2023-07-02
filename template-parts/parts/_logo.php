<?php
global $polylang;
$lang = pll_current_language();
if($lang =='en'){
  $themes_logo = myprefix_get_theme_option( 'themes_logo' );
  if (!empty( $themes_logo )) { echo '<img src="' . $themes_logo . '" alt="" class="img-100">';	}
}elseif ($lang =='fr') {
  $themes_logo_fr = myprefix_get_theme_option( 'themes_logo_fr' );
  if (!empty( $themes_logo_fr )) { echo '<img src="' . $themes_logo_fr . '" alt="" class="img-100">';	}
} ?>