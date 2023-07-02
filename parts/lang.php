<?php


  function lavai_lang_setup_theme() {

     // register our translatable strings - again first check if function exists.

      if ( function_exists( 'pll_register_string' ) ) {

          //Homepage
          pll_register_string( 'Share ', 'Share', 'lavai_themes', false );
          pll_register_string( 'Related News ', 'Related News', 'lavai_themes', false );
          pll_register_string( 'Write to us ', 'Write to us', 'lavai_themes', false );
          pll_register_string( 'Subscribe ', 'Subscribe', 'lavai_themes', false );
          pll_register_string( 'Footer Subscribe ', 'Footer Subscribe', 'lavai_themes', false );
          pll_register_string( 'Footer Copyright ', 'Footer Copyright', 'lavai_themes', false );

          pll_register_string( 'Contact Us ', 'Contact Us', 'lavai_themes', false );
          pll_register_string( 'Back to top', 'Back to top', 'lavai_themes', false );
          pll_register_string( 'Pupup Subscribe Head', 'Pupup Subscribe Head', 'lavai_themes', false );

          
          pll_register_string( 'Coming Soon', 'Coming Soon', 'lavai_themes', false );
      }
  }
   add_action( 'after_setup_theme', 'lavai_lang_setup_theme' );



 ?>
