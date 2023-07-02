<?php
/*
	Template Name: Blank
*/

$post_class = ( nm_is_woocommerce_page() ) ? '' : 'entry-content';
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>
  <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      
      <link rel="profile" href="http://gmpg.org/xfn/11">
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
          
      <?php wp_head(); ?>
  </head>
    
  <body <?php body_class(); ?>>

    <section id="page-blank" class="mtb-40">
      <?php if(have_posts()) : while(have_posts())  : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class( esc_attr( $post_class ) ); ?>>
            <?php the_content(); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </section>

    <?php wp_footer(); ?>
   </body>
</html>