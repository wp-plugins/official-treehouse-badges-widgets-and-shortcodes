<?php

/*
 *	Plugin Name: Official Treehouse Badges Widgets and Shortcodes
 *	Plugin URI: http://wptreehouse.com/wptreehouse-badges/
 *	Description: Provides both widgets and shortcodes to help you display your Treehouse profile badges on your website.  Official Treehouse widgets and shortcodes from Treehouse.
 *	Version: 1.4
 *	Author: Zac Gordon
 *	Author URI: http://wp.zacgordon.com
 *	License: GPL2
 *
*/

/*
 *	Assign global variables
 *
*/

$plugin_url = WP_PLUGIN_URL . '/wptreehouse-badges';
$options = array();
$display_json = false;

/*
 *	Add a link to our plugin in the admin menu
 *	under 'Settings > Treehouse Badges'
 *
*/

function wptreehouse_badges_menu() {

	/*
	 * 	Use the add_options_page function
	 * 	add_options_page( $page_title, $menu_title, $capability, $menu-slug, $function ) 
	 *
	*/

	add_options_page(
		'Official Treehouse Badges',
		'Treehouse Badges',
		'manage_options',
		'wptreehouse-badges',
		'wptreehouse_badges_options_page'
	);

}
add_action( 'admin_menu', 'wptreehouse_badges_menu' );


function wptreehouse_badges_options_page() {

	if( !current_user_can( 'manage_options' ) ) {

		wp_die( 'You do not have sufficient permissions to access this page.' );

	}

	global $plugin_url;
	global $options;
	global $display_json;

	if( isset( $_POST['wptreehouse_form_submitted'] ) ) {

		$hidden_field = esc_html( $_POST['wptreehouse_form_submitted'] );

		if( $hidden_field == 'Y' ) {

			$wptreehouse_username = esc_html( $_POST['wptreehouse_username'] );

			$wptreehouse_profile = 	wptreehouse_badges_get_profile( $wptreehouse_username );

			$options['wptreehouse_username']	= $wptreehouse_username;
			$options['wptreehouse_profile']		= $wptreehouse_profile;
			$options['last_updated']			= time();

			update_option( 'wptreehouse_badges', $options );

		}

	}

	$options = get_option( 'wptreehouse_badges' );

	if( $options != '' ) {

		$wptreehouse_username = $options['wptreehouse_username'];
		$wptreehouse_profile =	$options['wptreehouse_profile'];

	}

	require( 'inc/options-page-wrapper.php' );


}

/*	
 *	Create a badges widget
 *
*/

class Wptreehouse_Badges_Widget extends WP_Widget {

	function wptreehouse_badges_widget() {
		// Instantiate the parent object
		parent::__construct( false, 'Official Treehouse Badges' );
	}

	function widget( $args, $instance ) {
		// Widget output

		extract( $args );
		$title = apply_filters( 'widget_title' , $instance['title'] );
		$num_badges = $instance['num_badges'];
		$display_tooltip = $instance['display_tooltip'];
		$display_random = $instance['display_random'];

		$options = get_option( 'wptreehouse_badges' );
		$wptreehouse_profile = $options['wptreehouse_profile'];

		if( $display_random == 1 ) {
			$random_badge_array = get_random_badge_array( 0, count( $wptreehouse_profile->{'badges'} ), $num_badges );
		}

		require( 'inc/front-end-badges.php' );

	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['num_badges'] = strip_tags($new_instance['num_badges']);
		$instance['display_tooltip'] = strip_tags($new_instance['display_tooltip']);
		$instance['display_random'] = strip_tags($new_instance['display_random']);
		
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form

		$title 		= ( isset($instance['title']) ? esc_attr($instance['title']) : null );
		$num_badges = ( isset($instance['num_badges']) ? esc_attr($instance['num_badges']) : null );
		$display_tooltip = ( isset($instance['display_tooltip']) ? esc_attr($instance['display_tooltip']) : null );	
		$display_random = ( isset($instance['display_random']) ? esc_attr($instance['display_random']) : null );	
		

		$options = get_option( 'wptreehouse_badges' );
		$wptreehouse_profile = $options['wptreehouse_profile'];

		require( 'inc/widget-fields-badges.php' );

	}
}

class Wptreehouse_Affiliates_Widget extends WP_Widget {

	function wptreehouse_affiliates_widget() {
		// Instantiate the parent object
		parent::__construct( false, 'Treehouse Affiliate Widget' );
	}

	function widget( $args, $instance ) {
		// Widget output

		extract( $args );
		$title = apply_filters( 'widget_title' , $instance['title'] );
		$custom_message = $instance['custom_message'];

		$options = get_option( 'wptreehouse_badges' );

		require( 'inc/front-end-affiliate.php' );

	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['custom_message'] = strip_tags($new_instance['custom_message']);
		
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form

		$title 	= ( isset($instance['title']) ? esc_attr($instance['title']) : null );			
		$custom_message = ( isset($instance['custom_message']) ? esc_attr($instance['custom_message']) : null );

		$options = get_option( 'wptreehouse_badges' );
		
		require( 'inc/widget-fields-affiliate.php' );
	
	}
}

function wptreehouse_badges_register_widgets() {
	register_widget( 'Wptreehouse_Badges_Widget' );
	register_widget( 'Wptreehouse_Affiliates_Widget' );
}

add_action( 'widgets_init', 'wptreehouse_badges_register_widgets' );


function wptreehouse_badges_shortcode( $atts, $content = null ) {

	global $post;

	extract( shortcode_atts( array(
		'num_badges' => '8',
		'tooltip' => 'on',
		'random' => 'off'
	), $atts ) );

	if( $tooltip == 'on' ) $tooltip = 1;
	if( $tooltip == 'off' ) $tooltip = 0;

	if( $random == 'true' ) $random = 1;
	if( $random == 'on' ) $random = 1;
	if( $random == 'false' ) $random = 0;
	if( $random == 'off' ) $random = 0;

	$display_tooltip = $tooltip;
	$display_random = $random;	

	$options = get_option( 'wptreehouse_badges' );
	$wptreehouse_profile = $options['wptreehouse_profile'];

	if( $display_random == 1 ) {
		$random_badge_array = get_random_badge_array( 0, count( $wptreehouse_profile->{'badges'} ), $num_badges );
	}

	ob_start();

	require( 'inc/front-end-badges.php' );

	$content = ob_get_clean();

	return $content;

}
add_shortcode( 'wptreehouse_badges', 'wptreehouse_badges_shortcode' );


function wptreehouse_badges_get_profile( $wptreehouse_username ) {

	$json_feed_url = 'http://teamtreehouse.com/' . $wptreehouse_username . '.json';
	$args = array( 'timeout' => 120 );

	$json_feed = wp_remote_get( $json_feed_url, $args );

	$wptreehouse_profile = json_decode( $json_feed['body'] );

	return $wptreehouse_profile;

}

function get_random_badge_array($min, $max, $quantity) {

	$numbers = range($min, $max);
	shuffle($numbers);
	return array_slice($numbers, 0, $quantity);	

}

function wptreehouse_badges_refresh_profile() {

	$options = get_option( 'wptreehouse_badges' );
	$last_updated = $options['last_updated'];

	$current_time = time();

	$update_difference = $current_time - $last_updated;

	if( $update_difference > 86400 ) {

		$wptreehouse_username = $options['wptreehouse_username'];

		$options['wptreehouse_profile'] = wptreehouse_badges_get_profile( $wptreehouse_username );
		$options['last_updated'] = time();

		update_option( 'wptreehouse_badges', $options );

	}

	die();

}
add_action( 'wp_ajax_wptreehouse_badges_refresh_profile', 'wptreehouse_badges_refresh_profile' );

function wptreehouse_badges_enable_frontend_ajax() {
?>

	<script>

		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

	</script>

<?php
}
add_action( 'wp_head', 'wptreehouse_badges_enable_frontend_ajax' );

function wptreehouse_badges_backend_styles() {

	wp_enqueue_style( 'wptreehouse_badges_backend_css', plugins_url( 'official-treehouse-badges-widgets-and-shortcodes/wptreehouse-badges.css' ) );

}
add_action( 'admin_head', 'wptreehouse_badges_backend_styles' );

function wptreehouse_badges_frontend_scripts_and_styles() {

	wp_enqueue_style( 'wptreehouse_badges_frontend_css', plugins_url( 'official-treehouse-badges-widgets-and-shortcodes/wptreehouse-badges.css' ) );
	wp_enqueue_script( 'wptreehouse_badges_frontend_js', plugins_url( 'official-treehouse-badges-widgets-and-shortcodes/wptreehouse-badges.js' ), array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'wptreehouse_badges_frontend_scripts_and_styles' );












?>