<?php

	function register_collection() {

		/**
		 * Post Type: collection
		 */

		$labels = array(
			"name" => __( "Collection", "lavai_themes" ),
			"singular_name" => __( "Collection", "lavai_themes" ),
			"menu_name" => __( "Collection", "lavai_themes" ),
			"all_items" => __( "All Collection", "lavai_themes" ),
			"add_new" => __( "Add Collection", "lavai_themes" ),
			"add_new_item" => __( "Add New Collection", "lavai_themes" ),
			"edit_item" => __( "Edit Collection", "lavai_themes" ),
			"new_item" => __( "New Collection", "lavai_themes" ),
			"view_item" => __( "View Collection", "lavai_themes" ),
			"view_items" => __( "View Collection", "lavai_themes" ),
		);

		$args = array(
			"label" => __( "Collection", "lavai_themes" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			'taxonomies' => array('collection-category', 'collection-type'),
			// 'rewrite' => array('slug' => 'collection', 'with_front' => false),
			"has_archive" => false,
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"show_in_admin_bar" => true,
	    "menu_icon" => "dashicons-testimonial",
	    "menu_position" => 4,
			"show_in_nav_menus" => true,
			"exclude_from_search" => true,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"query_var" => true,
			"supports" => array( "title","thumbnail", "editor"),
		);

	  register_post_type( "collection", $args );
	}
	add_action( 'init', 'register_collection' );

	function collection_init() {
			register_taxonomy(
					'collection-category',
					'collection',
					array(
							'label' => __( 'Collection Category' ),
							'rewrite' => array('slug' => 'collection-category', 'with_front' => false),
							'hierarchical' => true,
							'show_ui' => true,
			        'show_admin_column' => true,
			        'query_var' => true,
					)
			);

			register_taxonomy(
				'collection-type',
				'collection',
				array(
						'label' => __( 'Collection Type' ),
						'rewrite' => array( 'slug' => 'collection-type' ),
						'hierarchical' => true,
						'show_ui' => true,
						'show_admin_column' => true,
						'query_var' => true,
				)
			);
	}
	add_action( 'init', 'collection_init' );





	add_filter('post_type_link', 'collection_category_permalink_structure', 10, 4);
	function collection_category_permalink_structure($post_link, $post, $leavename, $sample) {
	    if (false !== strpos($post_link, '%collection-category%')) {
	        $collectioncategory_type_term = get_the_terms($post->ID, 'collection');
	        if (!empty($collectioncategory_type_term))
	            $post_link = str_replace('%collection-category%', array_pop($collectioncategory_type_term)->
	            slug, $post_link);
	        else
	            $post_link = str_replace('%collection-category%', 'uncategorized', $post_link);
	    }
	    return $post_link;
	}

?>
