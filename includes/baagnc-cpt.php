<?php

function baagnc_post_type() {

	$labels = array(
		'name'                => _x( 'Galleries', 'Post Type General Name', 'twentythirteen' ),
		'singular_name'       => _x( 'Gallery', 'Post Type Singular Name', 'twentythirteen' ),
		'menu_name'           => __( 'Galleries', 'twentythirteen' ),
		'parent_item_colon'   => __( 'Galleries Parent', 'twentythirteen' ),
		'all_items'           => __( 'All Galleries', 'twentythirteen' ),
		'view_item'           => __( 'Gallery View', 'twentythirteen' ),
		'add_new_item'        => __( 'Add Gallery', 'twentythirteen' ),
		'add_new'             => __( 'Add new', 'twentythirteen' ),
		'edit_item'           => __( 'Edit Gallery', 'twentythirteen' ),
		'update_item'         => __( 'Update Gallery', 'twentythirteen' ),
		'search_items'        => __( 'Search Gallery', 'twentythirteen' ),
		'not_found'           => __( 'Not Found', 'twentythirteen' ),
		'not_found_in_trash'  => __( 'Not Found on Trash', 'twentythirteen' ),
	);
	

	$args = array(
		'label'               => __( 'galleries', 'twentythirteen' ),
		'description'         => __( 'Galleries to Show', 'twentythirteen' ),
		'labels'              => $labels,
		'supports'            => array( 'title'),
		
		
		/* You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'type-of-Gallery' ),*/
		

		'hierarchical'        => false,
		'public'              => true,
		'publicly_queryable'  => true,  // you should be able to query it
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'galleries', $args );
	
	
	register_taxonomy(
        "type-of-gallery", 
        array("galleries"), 
        array("label" => "Gallery Types", 
              "rewrite" => true,
              "hierarchical" => true
             )
        );

}
add_action( 'init', 'baagnc_post_type', 0 );


