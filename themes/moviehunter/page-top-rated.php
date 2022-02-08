<?php 
/**
* Template Name: top-rated-movies
*/
?>
<?php

get_header(); 

global $wpdb;

$results = $wpdb->get_results( "SELECT DISTINCT(wp_comments.comment_post_ID), GROUP_CONCAT(wp_comments.comment_iD separator ', ') comment_ids FROM wp_comments JOIN wp_commentmeta ON wp_commentmeta.comment_id = wp_comments.comment_ID GROUP BY wp_comments.comment_post_ID", ARRAY_A );

foreach( $results as $key => $value ) {

    $c_post_id = $value['comment_post_ID'];
    $comment_ids = $value['comment_ids'];
    $res = $wpdb->get_results( "SELECT AVG(`meta_value`) as avg_rate FROM wp_commentmeta WHERE `meta_key` = 'rating' AND comment_ID IN ($comment_ids) ORDER BY meta_value" );
   $results[$key]['avg_rate'] = $res[0]->avg_rate;
}

$avg_rate = array_column( $results, 'avg_rate' );
array_multisort( $avg_rate, SORT_DESC, $results );

$top_rated = array();
foreach ( $results as $result ) {

    if( $result['avg_rate'] && $result['comment_ids'] )
    {
        $top_rated[] = $result['comment_post_ID'];
    }
}

$args = array(
    'post_type' => array( "movies" ),
    'posts_per_page' => 10,
    'post__in' => $top_rated,
    'orderby' => 'post__in' 
);

$wp_query = new WP_Query( $args );

get_template_part( 'page', 'custom' );

get_footer();
