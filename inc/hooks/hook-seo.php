<?php
/**
 * SEO
 */
function opengraph_tags() {
    // defaults
    $title = get_bloginfo('title');
    $img_src = get_stylesheet_directory_uri() . '/images/logo.png';
    $excerpt = get_bloginfo('description');
    // for non posts/pages, like /blog, just use the current URL
    $permalink = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(is_single() || is_page()) {
        global $post;
        setup_postdata( $post );
        $title = get_the_title();
        $permalink = get_the_permalink();
        if (has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large')[0];
        }
        $excerpt = get_the_excerpt();
        if ($excerpt) {
            $excerpt = strip_tags($excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        }

			}

      global $polylang;
      $lang = pll_current_language();
    ?>

	<!-- favicon -->
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-72x72.png">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-96x96.png" sizes="96x96">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-114x114.png">
	<link rel="apple-touch-icon" sizes="228x228" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-228x228.png">
	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon.png">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon.png">

	<?php
		$themes_header_color = myprefix_get_theme_option( 'themes_header_color' );
		if (!empty( $themes_header_color )) {
			echo '<meta name="theme-color" content="'. $themes_header_color .'"/>';
			echo '<meta name="msapplication-TileColor" content="'. $themes_header_color .'">';
		}
	?>

  <!-- meta tag seo html-->
  <meta name="description" content="<?php if ( is_single() ) {
          single_post_title('', true);
      } else {
        if($lang =='en'){
          $themes_description = myprefix_get_theme_option( 'themes_description' );

          echo $themes_description;
        }elseif ($lang =='fr') {
          $themes_description_fr = myprefix_get_theme_option( 'themes_description_fr' );

          echo $themes_description_fr;
        }
      }
      ?>" />
	<!-- meta tag facebook -->
	<meta name="resource-type" content="document" />
	<meta property="og:title" content="<?php if ( is_home() ||  is_front_page() ) { echo get_bloginfo('name'); }else{ echo $title .' - '. get_bloginfo('name'); }; ?>"/>


	<meta property="og:description" content="<?php if ( is_single() ) {
          single_post_title('', true);
      } else {
        $themes_description = myprefix_get_theme_option( 'themes_description' );

        echo $themes_description;
      }
      ?>"/>


	<?php if(!is_single()){
	if(is_home() || is_front_page()){ // not sure if you have set a static page as your front page
		echo '<meta property="og:url" content="'.get_bloginfo('url').'" />';
	}elseif(is_tag()){
		echo '<meta property="og:url" content="http://'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"].' ">';
		}
	} ?>
	<meta property="og:site_name" content="<?= get_bloginfo(); ?>"/>
	<meta property="og:type" content="<?php if ( is_front_page() ) { echo "website"; } else { echo "article"; } ?>">
	<meta property="og:image" content="<?php
				if (is_single()) {
					$post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
					echo $post_thumbnail[0];
				}else{
						echo get_template_directory_uri().'/images/favicon/favicon.png';
				}?>" />
	<meta property="og:image:secure_url" content="<?php
				if (is_single()) {
					$post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
					echo $post_thumbnail[0];
				}else{
						echo get_template_directory_uri().'/images/favicon/favicon.png';
				}?>" />

  <meta name="author" content="Lavai">
  <meta name="publisher" content="Lavai">
  <link rel="image_src" href="<?php
				if (is_single()) {
					$post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
					echo $post_thumbnail[0];
				}else{
						echo get_template_directory_uri().'/images/favicon/favicon.png';
				}?>" />
	<meta name="language" content="Indonesia" />
	<meta name="organization" content="<?= get_bloginfo(); ?>" />
	<meta name="copyright" content="Copyright (c)2023 <?= get_bloginfo(); ?>" />
	<meta name="audience" content="<?= get_bloginfo(); ?>" />
	<meta name="classification" content="Indonesia, English, Company Profile, Company Spirit" />
	<meta name="rating" content="general" />
	<meta name="page-topic" content="" />
	<meta name="revisit-after" content="7 days" />
	<meta name="mssmarttagspreventparsing" content="true" />
	<meta name="twitter:image" content="<?php
				if (is_single()) {
					$post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
					echo $post_thumbnail[0];
				}else{
						echo get_template_directory_uri().'/images/favicon/favicon.png';
				}?>" />

	<link rel="alternate" type="application/rss+xml" title="Feed" href="<?= get_bloginfo('feed'); ?>" />

    <?php
    	$themes_mix = myprefix_get_theme_option( 'themes_mix' );
    	if (!empty( $themes_mix )) {
    		echo $themes_mix;
    	}
    ?>


<?php
}
add_action('wp_head', 'opengraph_tags', 5);

?>
