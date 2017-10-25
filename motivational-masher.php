<?php
/**
 * @package Motivational_Masher
 * @version 666
 */
/*
Plugin Name: Motivational Masher
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Motivation in your admin page.
Author: Skullmasher Heartless
Version: 666
Author URI: https://skullmasher.io/
*/

function motivational_masher_get_lyric() {
	$lyrics = "Get your shit done
Everything that has a begening has an end
If everythings fails. Crowbar the fucker";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function motivational_masher() {
	$chosen = motivational_masher_get_lyric();
	echo "<p id='motivational-masher'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'motivational_masher' );

// We need some CSS to position the paragraph
function motivational_masher_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#motivational-masher {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 16px;
	}
	</style>
	";
}

add_action( 'admin_head', 'motivational_masher_css' );

?>
