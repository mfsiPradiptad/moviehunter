<?php get_header(); ?>
    <div class="container">
        <div class="row mt-1">
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-3">
                <?php if ( has_post_thumbnail( $post->ID ) ) { 
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                    <img src="<?php echo $url ?>" title="<?php echo the_title(); ?>" class="img-dimensions" />
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-9 text-white"> 
                <h2 class="glb-color"><?php the_title(); ?></h2> 
                <p> <?php the_content(); ?> </p> 
                <p><span class="glb-color">Author :</span>  <?php echo get_the_author_meta( 'display_name', $post->post_author ); ?></p>
                <p><span class="glb-color">Publish Date :</span>  <?php echo date( "d F Y", strtotime( $post->post_date ) ); ?></p>
                
            </div>                    
        </div>
        <?php endwhile; endif;?>
    </div>
<?php get_footer(); ?>