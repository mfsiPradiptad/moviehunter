<?php 
    $args = array(  
        'post_type' => 'movies',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'tax_query' => array(
            array (
                'taxonomy' => 'release',
                'field' => 'slug',
                'terms' => 'coming-soon',
                )),
        'order' => 'DESC'
    );

    $query = new WP_Query($args);

    while( $query -> have_posts() ): $query->the_post(); ?>
        <div class="content">
            <h4> <?php echo the_title(); ?> </h4>
            <?php if ( has_post_thumbnail( $post->ID ) ) { 
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                    <a href="<?php echo the_permalink() ?>" ><img src="<?php echo $url ?>" title="<?php echo the_title(); ?>" /> </a>
            <?php } ?>
            <p><?php echo the_excerpt(); ?></p>
            <a href="<?php echo the_permalink() ?>">Read more</a> 
        </div>
        <div class="cl">&nbsp;</div>
  <?php  endwhile; wp_reset_postdata(); ?>
