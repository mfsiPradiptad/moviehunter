<?php 
/**
* Template Name: search
*/
?>

<?php

    get_header();
?>
    <div class="col-sm-12">
        <h2 class="text-white">Result <strong>:</strong></h2>
    </div>
<?php
    if ( isset ( $_GET['search-field'] ) && $_GET['search-field'] != '' ) {
        $search = htmlspecialchars( $_GET['search-field'] );
        $args = array(
            'post_type' => array ( 'movies', 'news' ),
            's' => $search,
            'posts_per_page' => 10
        );
        $wp_query = new WP_Query($args);

        if ( $wp_query->have_posts() ) :
            get_template_part( 'page', 'custom' );
        else : ?>
        <div class="col-sm-12">
            <p class="text-white">No Result Found</p>
        </div>
        <?php endif;

    }

    get_footer();