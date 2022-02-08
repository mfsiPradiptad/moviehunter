<?php
/**
 * Plugin Name: WP Movie Like Button
 * Plugin URI: pradiptadas
 * Description: This plugin adds like to custom movie theme posts.
 * Version: 1.0.0
 * Author: Pradipta Das
 * Author URI: http://pradiptadas.site
 * License: GPL2
 */


// define the actions for the two hooks created, first for logged in users and the next for logged out users
add_action( "wp_ajax_my_user_like", "my_user_like" );
add_action( "wp_ajax_nopriv_my_user_like", "please_login" );

// define the function to be fired for logged in users
function my_user_like() {
   
   // nonce check for an extra layer of security, the function will exit if it fails
   if ( !wp_verify_nonce( $_REQUEST['nonce'], "my_user_like_nonce")) {
      exit("Woof Woof Woof");
   }   
   
   // fetch like_count for a post, set it to 0 if it's empty, increment by 1 when a click is registered 
   $like_count = get_post_meta( $_REQUEST["post_id"], "likes", true );
   $like_count = ( $like_count == '' ) ? 0 : $like_count;
   $new_like_count = $like_count + 1;
   $like = false ;
   $logged_in = 0;

   if ( is_user_logged_in() ) {
        // Update the value of 'likes' meta key for the specified post, creates new meta data for the post if none exists
        $like = update_post_meta($_REQUEST["post_id"], "likes", $new_like_count);
        $logged_in = 1;
   }
   
   // If above action fails, result type is set to 'error' and like_count set to old value, if success, updated to new_like_count  
   if($like === false) {
      $result['type'] = "error";
      $result['like_count'] = $like_count;
      $result['logged_in'] = $logged_in;
   }
   else {
      $result['type'] = "success";
      $result['like_count'] = $new_like_count;
      $result['logged_in'] = $logged_in;
   }
   
   // Check if action was fired via Ajax call. If yes, JS code will be triggered, else the user is redirected to the post page
   if( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
      $result = json_encode($result);
      echo $result;
   }
   else {
      header("Location: ".$_SERVER["HTTP_REFERER"]);
   }

   // don't forget to end your scripts with a die() function - very important
   die();
}

// define the function to be fired for logged out users
function please_login() {
  // echo "You must log in to like";
   $result['type'] = "error";
   $result['logged_in'] = 0;
   $result = json_encode($result);
   echo $result;
   die();
}

add_action( 'init', 'script_enqueuer' );

function script_enqueuer() {
   
   // Register the JS file with a unique handle, file location, and an array of dependencies
   wp_register_script( "liker_script", plugin_dir_url(__FILE__).'liker_script.js', array('jquery') );
   
   // localize the script to your domain name, so that you can reference the url to admin-ajax.php file easily
   wp_localize_script( 'liker_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        
   
   // enqueue jQuery library and the script you registered above
   wp_enqueue_script( 'jquery' );
   wp_enqueue_script( 'liker_script' );
}

function get_movie_like_button($post) { 
    //print_r( $post_id);
    $nonce = wp_create_nonce("my_user_like_nonce");
    $link = admin_url('admin-ajax.php?action=my_user_like&post_id='. $post['post_id']. '&nonce='. $nonce);
    $likes = get_post_meta($post['post_id'], "likes", true);
    $likes = ($likes == "") ? 0 : $likes;
    $str ="";
    $str .= '<p>Total Likes: <span id="like_counter">' . $likes . '</span> </p>';
    $str .= '<p class="hide-like"><span> Give a Thumbs UP, If You Like This Movie:</span> <a class="user_like glb-color" data-nonce="' . $nonce . '" data-post_id="' . $post['post_id'] . '" href="'. $link .'"><ion-icon name="thumbs-up"></ion-icon></a></span></p>';
    return $str;
  }
  
  add_shortcode( 'wp_get_like', 'get_movie_like_button' );