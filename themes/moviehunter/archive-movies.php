<?php get_header(); ?>
<?php

    while ( have_posts() ) : the_post(); ?>
        <div class="row mt-2">
            <div class="col-sm-4 mb-2">
                <?php if ( has_post_thumbnail( $post->ID ) ) { 
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                    <a href="<?php echo the_permalink() ?>" ><img src="<?php echo $url ?>" title="<?php echo the_title(); ?>" class="img-dimensions" /> </a>
                <?php } ?>
            </div>
            <div class="col-sm-8 text-white">
                <h2><a href="<?php echo the_permalink() ?>" class="glb-color a-tag" ><?php the_title(); ?></a></h2>
                <p>
                <?php $terms = get_the_terms( $post, 'genres' ); 
                    $tax_arr = array();
                    foreach ( $terms as $term ) : 
                        $tax_arr[] =  $term->name; 
                    endforeach; 
                    $str = implode( " | ", $tax_arr ); 
                    echo $str;
                    ?>
                    
                </p>
                <?php the_excerpt() ?>
                <p> <?php echo do_shortcode( "[wppr_avg_rating]" ) ?></p>
                
            </div>
            <div class="col-sm-12"><hr class="red-hr"></div>  
        </div>
    <?php 
    endwhile; wp_reset_postdata();
    get_template_part( 'content', 'pagination' );
    ?>
<?php get_footer(); ?>

