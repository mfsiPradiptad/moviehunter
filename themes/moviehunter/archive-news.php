<?php get_header(); ?>
<?php

    while ( have_posts() ) : the_post(); ?>
        <div class="row mt-2">
            <div class="col-sm-4">
                <?php if ( has_post_thumbnail( $post->ID ) ) { 
                    $url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
                    <img src="<?php echo $url ?>" title="<?php echo the_title(); ?>" class="img-dimensions" />
                <?php } ?>
            </div>
            <div class="col-sm-8 text-white">
                <h2><a href="<?php echo the_permalink() ?>" class="glb-color a-tag" ><?php the_title(); ?></a></h2>
                <?php the_excerpt() ?>
                <p><a href="<?php echo the_permalink() ?>" class="glb-color" >... more</a></p>
            </div>
        </div>
        <div class="col-sm-12"><hr class="red-hr"></div>

    <?php 
    endwhile; wp_reset_postdata();
    get_template_part( 'content', 'pagination' );
    ?>
    
<?php get_footer(); ?>