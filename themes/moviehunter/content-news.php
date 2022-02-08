<?php

$args = array(  
    'post_type' => 'news',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'order' => 'DESC'
);

$wp_query = new WP_Query($args);

if ( $wp_query->have_posts() ) :

    while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
        <div class="content">
            <h4><?php echo the_title(); ?></h4>
            <p><?php echo the_excerpt(); ?></p>
            <a href="<?php echo the_permalink(); ?>">Read more</a> 
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>
    

