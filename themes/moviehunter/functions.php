<?php

// Custom Movies Post Type
function create_movie_custom_post() {
	register_post_type( 'movies',
			array(
			'labels' => array(
            'name' => __( 'Movies' ),
            'singular_name' => __( 'Movie' ),
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'comments',
            'excerpt'
            )
        ));
}
add_action( 'init', 'create_movie_custom_post' );

// Support Featured Images
add_theme_support( 'post-thumbnails' );


//hook into the init action and call create_genres_taxonomies when it fires
 
add_action( 'init', 'create_genres_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it Genres for your posts
 
function create_genres_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Genres', 'taxonomy general name' ),
    'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Genres' ),
    'all_items' => __( 'All Genres' ),
    'parent_item' => __( 'Parent Genre' ),
    'parent_item_colon' => __( 'Parent Genre:' ),
    'edit_item' => __( 'Edit Genre' ), 
    'update_item' => __( 'Update Genre' ),
    'add_new_item' => __( 'Add New Genre' ),
    'new_item_name' => __( 'New Genre Name' ),
    'menu_name' => __( 'Genres' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('genres',array('movies'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'genres' ),
  ));
 
}

function create_news_custom_post() {
	register_post_type( 'news',
			array(
			'labels' => array(
            'name' => __( 'News' ),
            'singular_name' => __( 'News' ),
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'comments',
            'excerpt'
            )
        ));
}
add_action( 'init', 'create_news_custom_post' );

//hook into the init action and call create_genres_taxonomies when it fires
 
add_action( 'init', 'create_release_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it Genres for your posts
 
function create_release_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Release', 'taxonomy general name' ),
    'singular_name' => _x( 'Release', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Release' ),
    'all_items' => __( 'All Release' ),
    'parent_item' => __( 'Parent Release' ),
    'parent_item_colon' => __( 'Parent Release:' ),
    'edit_item' => __( 'Edit Release' ), 
    'update_item' => __( 'Update Release' ),
    'add_new_item' => __( 'Add New Release' ),
    'new_item_name' => __( 'New Release Name' ),
    'menu_name' => __( 'Release' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('release',array('movies'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'release' ),
  ));

  $parent_term = term_exists( 'release', 'release' ); // array is returned if taxonomy is given
  $parent_term_id = $parent_term['term_id']; // get numeric term id

  wp_insert_term(//this should probably be an array, but I kept getting errors..
    'Coming Soon', // the term 
    'release', // the taxonomy
    array(
    'slug' => 'coming-soon',
    'parent'=> $parent_term_id ));
  
  wp_insert_term(
    'In Theaters', // the term 
    'release', // the taxonomy
    array(
    'slug' => 'in-theaters',
    'parent'=> $parent_term_id ));

}

function get_genres_terms_list() { 
  $genres = get_terms( 'genres' );
  $str = "";

  foreach ( $genres as $genre ) {
    $str .= '<a href="'. get_bloginfo( 'wpurl' ) . '/genres/' . $genre->slug .'" >' . $genre->name . '</a>';
  }

  return $str;
}

add_shortcode( 'get_genres', 'get_genres_terms_list' );

