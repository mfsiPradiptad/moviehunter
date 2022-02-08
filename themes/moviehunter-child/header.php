<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MovieHunter</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/assets/dist/css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/assets/dist/css/bootstrap.min.css" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/assets/dist/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/assets/dist/js/jquery-func.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/assets/dist/js/bootstrap.min.js"></script>
<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->

<?php wp_head();?>

</head>
<body>
<!-- START PAGE SOURCE -->
<div id="shell">
  <div id="header">
    <h1 id="logo"><a href="<?php echo get_bloginfo( 'wpurl' );?>" ><?php echo get_bloginfo( 'name' ); ?></a></h1>
    <div class="social"> <span>FOLLOW US ON:</span>
      <ul>
        <li><a class="twitter" href="<?php echo get_option( 'twitter' ); ?>">twitter</a></li>
        <li><a class="facebook" href="<?php echo get_option( 'facebook' ); ?>">facebook</a></li>
        <li><a class="vimeo" href="<?php echo get_option( 'youtube' ); ?>">vimeo</a></li>
        <li><a class="rss" href="<?php echo get_option( 'telegram' ); ?>">rss</a></li>
      </ul>
    </div>
    <div id="navigation">
      <ul>
        <li><a class="active" href="<?php echo get_bloginfo( 'wpurl' );?>">HOME</a></li>
        <li><a href="<?php echo get_bloginfo( 'wpurl' ) . '/news';?>">NEWS</a></li>
        <li>
        <div class="dropdown">
          <button class="dropbtn">GENRES</button>
          <div class="dropdown-content">
            <!-- <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a> -->
            <?php echo do_shortcode( "[get_genres]" );?>
          </div>
        </div>
        </li>
        <li><a href="<?php echo get_bloginfo( 'wpurl' ) . '/release/in-theaters/'; ?>">IN THEATERS</a></li>
        <li><a href="<?php echo get_bloginfo( 'wpurl' ). '/release/coming-soon/' ; ?>">COMING SOON</a></li>
      </ul>
    </div>
    <div id="sub-navigation">
      <ul>
        <li><a href="<?php echo get_bloginfo( 'wpurl' ) . '/movies';?>">SHOW ALL</a></li>
        <!-- <li><a href="#">LATEST TRAILERS</a></li> -->
        <li><a href="<?php echo get_bloginfo( 'wpurl' ) . '/top-rated-movies/'; ?>">TOP RATED</a></li>
        <li><a href="<?php echo get_bloginfo( 'wpurl' ) . '/most-commented-movies/'; ?>">MOST COMMENTED</a></li>
      </ul>
      <div id="search">
        <form action="<?php echo get_bloginfo( 'wpurl' ) . '/search' ?>" method="get" accept-charset="utf-8">
          <label for="search-field">SEARCH</label>
          <input type="text" name="search-field" value="Enter search here" id="search-field" class="blink search-field"  />
          <input type="submit" value="GO!" class="search-button" />
        </form>
      </div>
    </div>
  </div>
