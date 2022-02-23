<?php
/*
Plugin Name: Conditional Display API
Plugin URI: http://www.thrivethemes.com
Description: An example plugin demonstrating how you can extend the Thrive Architect Conditional Display feature in order to create custom conditional rules.
Author: Thrive Team
Version: 0.01

This plugin is an example of how to extend the Conditional Display functionality and add your own custom rules.
*/

add_action( 'init', function () {
	if ( class_exists( '\TCB\ConditionalDisplay\Main', false ) ) {
		require_once __DIR__ . '/class-main.php';

		Thrive\ConditionalDisplayDemo\Main::init();
	}
}, 11 );
