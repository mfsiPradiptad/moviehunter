<?php get_header(); ?>
<div id="main">
    <div id="content">
      <div class="box">
        <div class="head">
          <h2>LATEST MOVIES</h2>
          <p class="text-right"><a href="<?php echo get_bloginfo( 'wpurl' ) . '/movies';?>">See all</a></p>
        </div>
        <?php get_template_part( 'content', 'movies' ); ?> 
        <div class="cl">&nbsp;</div>
      </div>
      <div class="box">
        <div class="head">
          <h2>TOP RATED</h2>
          <p class="text-right"><a href="<?php echo get_bloginfo( 'wpurl' ) . '/top-rated-movies/'; ?>">See all</a></p>
        </div>
        <?php get_template_part( 'content', 'movies-rate' ); ?>
        <div class="cl">&nbsp;</div>
      </div>
      <div class="box">
        <div class="head">
          <h2>MOST COMMENTED</h2>
          <p class="text-right"><a href="<?php echo get_bloginfo( 'wpurl' ) . "/most-commented-movies/"; ?>">See all</a></p>
        </div>
        <?php get_template_part( 'content', 'movies-comment' ); ?>
       <div class="cl">&nbsp;</div>
      </div>
    </div>
    <div id="news">
      <div class="head">
        <h3>NEWS</h3>
        <p class="text-right"><a href="<?php echo get_post_type_archive_link('news'); ?>">See all</a></p>
      </div>
      <?php get_template_part('content', 'news') ?>
    </div>
    <div id="coming">
      <div class="head">
        <h3>COMING SOON<strong>!</strong></h3>
        <p class="text-right"><a href="<?php echo get_bloginfo( 'wpurl' ) . '/release/coming-soon/' ; ?>">See all</a></p>
      </div>
      <?php get_template_part('content', 'comingsoon') ?>
    </div>
    <div class="cl">&nbsp;</div>
  </div>

  <?php get_footer(); ?>