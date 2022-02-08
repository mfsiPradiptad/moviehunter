<?php

$args = array(  
    'post_type' => 'movies',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'orderby' => 'comment_count',
    'order' => 'DESC'
);

$wp_query = new WP_Query($args);

get_template_part( 'content', 'row' );
    

