<?php get_header(); ?>
    <div class="container">
        <div class="row bg-black">
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-12"><h2 class="glb-color"><?php the_title(); ?></h2></div>
            <div class="col-sm-4">  
                <?php if ( has_post_thumbnail( $post->ID ) ) { 
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                    <img src="<?php echo $url ?>" title="<?php echo the_title();?>" class="img-dimensions" />
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <?php 
             $date = get_post_meta($post->ID, 'Release-Year', true);
            ?>
            <div class="col-sm-8 text-white">
                <p> Movie : <span class="glb-color"> <?php echo get_post_meta($post->ID, 'Movie', true); ?> </span> </p>
                <p> Director : <span class="glb-color"> <?php echo get_post_meta($post->ID, 'Director', true); ?> </span> </p>
                <p> Release Year : <span class="glb-color"> <?php echo date("d F Y", strtotime($date)); ?> </span> </p>
                <p> Writer : <span class="glb-color"> <?php echo get_post_meta($post->ID, 'Writer', true); ?> </span> </p>
                <p> Stars : <span class="glb-color"> <?php echo get_post_meta($post->ID, 'Stars', true); ?> </span> </p>

                <?php $terms = get_the_terms($post, 'genres'); 
                $tax_arr = array();
                 foreach ( $terms as $term ) : 
                    $tax_arr[] = '<a class="glb-color a-tag" href="'. get_bloginfo( 'wpurl' ) . '/genres/' . $term->slug .'">' . $term->name . "</a>"; 
                 endforeach; 
                 $str = implode( ", ", $tax_arr );
                ?>
                <p> Genres : <span class="glb-color"> <?php echo $str; ?> </span> </p>
                
            </div>                    
        </div>
        <?php 
            $release_terms = get_the_terms($post, 'release');
            $release_term = $release_terms[0];
            $tax_cmng = $release_term->slug;
        ?>
        <div class="row text-white ">  
            <?php  if ( $tax_cmng != 'coming-soon' ) : ?>         
                <p class="ml-3 mt-2"> Ratings :  <?php echo  do_shortcode( "[wppr_avg_rating]" ); ?> </p>
                <?php else: ?>
                <p class="ml-3 mt-2 glb-color"> Coming soon to theather near you.<strong>!</strong></p>
            <?php endif; ?>
            <div class="col-sm-12">
                <?php
                    $id = $post->ID;
                    $str = '[wp_get_like post_id= ' .'"'.$id. '"]';
                    echo do_shortcode( "$str" );
                ?>

            </div>
            <div class="col-sm-12">
                <h3 class="glb-color">Movie Plot:</h3>
                <p> <?php the_content(); ?> </p>  
            </div>                      
        </div>
        <?php 
            if ( $tax_cmng != 'coming-soon' ) :

                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                 endif;

            endif; 
            
        ?>
        <?php endwhile; endif;?>
    </div>
<?php get_footer(); ?>