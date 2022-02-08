<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 11 );

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri() );
}

// Custom Social Settings
function social_settings_add_menu() {
	add_menu_page( 'Social Settings', 'Social Settings', 'manage_options', 'social-settings', 'social_settings_page', null, 99 );
}
add_action( 'admin_menu', 'social_settings_add_menu' );

// Create Custom Global Settings
function social_settings_page() { ?>
	<div class="wrap">
		<h1>Social Settings</h1>
		<form method="post" action="options.php">
				<?php
						settings_fields( 'section' );
						do_settings_sections( 'theme-options' );
						submit_button();
				?>
		</form>
	</div>
<?php }

function setting_twitter() { ?>
	<input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
<?php }

function setting_facebook() { ?>
	<input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>" />
<?php }

function setting_youtube() { ?>
	<input type="text" name="youtube" id="youtube" value="<?php echo get_option( 'youtube' ); ?>" />
<?php }

function setting_telegram() { ?>
	<input type="text" name="telegram" id="telegram" value="<?php echo get_option('telegram'); ?>" />
<?php }

function social_settings_page_setup() {
  add_settings_section( 'section', 'All Settings', null, 'theme-options' );
  add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
  add_settings_field( 'telegram', 'Telegram URL', 'setting_telegram', 'theme-options', 'section' );
  add_settings_field( 'facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'section' );
  add_settings_field( 'youtube', 'Youtube URL', 'setting_youtube', 'theme-options', 'section' );

  register_setting( 'section', 'twitter' );
  register_setting( 'section', 'telegram' );
  register_setting( 'section', 'facebook' );
  register_setting( 'section', 'youtube' );

}
add_action( 'admin_init', 'social_settings_page_setup' );

