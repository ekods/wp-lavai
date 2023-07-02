<?php
/** * Completely Remove jQuery From WordPress */
// function my_init() {
//     if (!is_admin()) {
//         wp_deregister_script('jquery');
//         wp_register_script('jquery', false);
//     }
// }
// add_action('init', 'my_init');

function dm_remove_wp_block_library_css(){
  wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'dm_remove_wp_block_library_css' );



// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    if (!$data['type']) {
        $wp_filetype = wp_check_filetype($filename, $mimes);
        $ext = $wp_filetype['ext'];
        $type = $wp_filetype['type'];
        $proper_filename = $filename;
        if ($type && 0 === strpos($type, 'image/') && $ext !== 'svg') {
            $ext = $type = false;
        }
        $data['ext'] = $ext;
        $data['type'] = $type;
        $data['proper_filename'] = $proper_filename;
    }
    return $data;


}, 10, 4);


add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});


add_action('admin_head', function () {
    echo '<style type="text/css">
         .media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
      width: 100% !important;
      height: auto !important;
    }</style>';
});


function no_generator() { return ''; }
add_filter( 'the_generator', 'no_generator' );


/**
 * Support Thumbnail
 */
add_theme_support( 'post-thumbnails' );




/**
 * Custom Admin Login
 */
add_filter('admin_footer_text', 'remove_footer_admin');
function remove_footer_admin () {
  echo 'Themes and Development by <a href="https://mareds.com/" target="_blank">Mareds</a> &copy; 2023';
}

/*
 * Custom Login Logo
 */
add_action('login_head', 'lavai_themes_custom_login_logo');
function lavai_themes_custom_login_logo() {
	echo '<style type="text/css">
	.login h1 a { background-image: url('.get_bloginfo('template_directory').'/images/lavai.svg) !important; background-size:contain !important; height:70px !important; width:100% !important; }
	</style>';
}

add_filter( 'login_headerurl', 'lavai_themes_custom_login_url' );
function lavai_themes_custom_login_url($url) {
	return '';
}

/**
 * Custom Favicon
 */
add_action('admin_head','lavai_themes_favicon');
function lavai_themes_favicon(){
	echo '<link rel="shortcut icon" href="',get_template_directory_uri(),'/images/favicon/favicon.png" />',"\n";
}



// First, create a function that includes the path to your favicon
function add_favicon() {
  	$favicon_url = get_stylesheet_directory_uri() . '/images/favicon/favicon.png';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

// Now, just make sure that function runs when you're on the login page and admin pages
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');



//Disable Comment
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});



function custom_pre_get_posts( $query ) {
  if( $query->is_main_query() && !$query->is_feed() && !is_admin() && is_category()) {
    $query->set( 'paged', str_replace( '/', '', get_query_var( 'page' ) ) );
  }
}
add_action('pre_get_posts','custom_pre_get_posts');

function custom_request($query_string ) {
  if( isset( $query_string['page'] ) ) {
       if( ''!=$query_string['page'] ) {
           if( isset( $query_string['name'] ) ) {
             unset( $query_string['name'] );
           }
      }
  } return $query_string;
}
add_filter('request', 'custom_request');



function remove_category( $string, $type )  {       
  if ( $type != 'single' && $type == 'category' && ( strpos( $string, 'category' ) !== false ) )    {   $url_without_category = str_replace( "/category/", "/", $string ); 
     return trailingslashit( $url_without_category );   }    
return $string;  }    
add_filter( 'user_trailingslashit', 'remove_category', 100, 2);


?>
