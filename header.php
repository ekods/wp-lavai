<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

		<?php
			if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
				$post_type = get_post_type();
				$post_type_object = get_post_type_object($post_type);

				// if($post_type != 'post') {
				// 	$title = ucwords($post_type_object->label);
				// }
		}else{
			$title = wp_title("", false);
		}
		?>
		<title><?php echo ($title == '') ? get_bloginfo('name') : $title .' - '. get_bloginfo('name'); ?></title>


		<?php
			$themes_keyword = myprefix_get_theme_option( 'themes_keyword' );
			if (!empty( $themes_keyword )) {
				echo '<meta name="keywords"  content="'. $themes_keyword .'" />';
			}
		?>

    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  	<?php endif; ?>


		<?php
	  	$themes_css = myprefix_get_theme_option( 'themes_css' );
	  	if (!empty( $themes_css )) {
				echo "<style>";
	  			echo $themes_css;
				echo "</style>";
	  	}
	  ?>
  	<?php wp_head(); ?>
  </head>

<body <?php echo body_class();?>>
	<?php if ( is_home() ||  is_front_page() ) : ?>
		<div id="introLoader" class="introloader">
			<div class="e-loader">
				<div class="loaderLoad">
					<div class="spin"></div>
					<?php get_template_part( 'template-parts/parts/_logo' ); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>


	<header class="headerMain">
		<div class="js-nav-offset"></div>
		<div class="headerInner">
			<div class="container-fluid w-100">
				<div class="headerWrapper">
					<div class="headerLeft">
						<div class="brandLogo">
							<a href="<?= esc_url(home_url()) ?>">
								<?php get_template_part( 'template-parts/parts/_logo' ); ?>
							</a>
						</div>
					</div>

					<div class="headerRight">
						<div class="headerNav">
							<ul class="menuBox">
								<li class="menuItem-l list-main-menu">
									<div class="menuNav-box headerMenu">
										<?php
											wp_nav_menu( array(
													'menu' => 'Main Menu'
											) );
										?>
									</div>
								</li>
								<li class="menuItem-l switcher">
									<ul><?php pll_the_languages();?></ul>
								</li>
								<li class="menuItem-l navSearch">
									<a href="javascript:void(0)" class="openSearch">
										<img src="<?php echo get_template_directory_uri(); ?>/images/svg/icn-search.svg" alt="">
									</a>
								</li>
								<li class="hamburger">
									<div class="hamburger-menu" id="hamburger-menu">
										<div class="menu-bar1"></div>
										<div class="menu-bar2"></div>
										<div class="menu-bar3"></div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="pageWrapper">
