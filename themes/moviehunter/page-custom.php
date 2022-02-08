<?php

    while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
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
                <p><?php the_excerpt() ?> </p>                
                <?php echo do_shortcode( "[wppr_avg_rating]" ) ?>

                <?php if ( get_comments_number($post->ID) > 0 ): ?>
                    <div class="col-sm-4 mt-5" style="margin-left: -6px;">
                        <p><?php echo get_comments_number($post->ID) . ' Reviews'; ?></p>
                    </div>
                <?php endif; ?>
                
            </div>
            <div class="col-sm-12"><hr class="red-hr"></div>  
        </div>

    <?php endwhile; 
    
    wp_reset_postdata(); 
    get_template_part( 'content', 'pagination' );
    ?>


