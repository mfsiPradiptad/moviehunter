<?php 

if ( $wp_query->have_posts() ) :

    while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
        <div class="movie mr-2">
            <div class="movie-image"> 
                <span class="play"><span class="name"><?php echo $post->post_tittle; ?> </span></span>                 
                <?php if ( has_post_thumbnail( $post->ID ) ) { 
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                    <a href="<?php echo the_permalink() ?>" ><img src="<?php echo $url ?>" title="<?php echo the_title(); ?>" /> </a>
                <?php } ?>
            </div>
            <?php 
                $release_terms = get_the_terms( $post, 'release' );
                $release_term = $release_terms[0];
                $tax_cmng = $release_term->slug;
            ?>
            <div class="rating">
                <?php  if ( $tax_cmng != 'coming-soon' ) : ?>
                    <div class="main-page-rating">
                        <?php echo do_shortcode( "[wppr_avg_rating]" ); ?>
                    </div>                
                    <span class="comments"><?php echo get_comments_number($post->ID); ?></span> 
                <?php else: ?>
                    <p class="cmg-soon-p ml-2"> Coming Soon<strong>!</strong></p>
                <?php endif; ?>
            </div>
        </div>

    <?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>