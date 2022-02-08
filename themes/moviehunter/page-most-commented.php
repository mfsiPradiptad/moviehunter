<?php 
/**
* Template Name: most-commented-movies
*/
?>
<?php get_header(); ?>

<?php

$args = array(  
    'post_type' => 'movies',
    'post_status' => 'publish',
    'posts_per_page' => 10,
    'orderby' => 'comment_count',
    'order' => 'DESC'
);

$wp_query = new WP_Query($args);

get_template_part( 'page', 'custom' );
get_footer();