<?php

	function register_acf_block_types() {

		// register a testimonial block.
		acf_register_block_type(array(
			'name'              => 'newimage-block',
			'title'             => __('New Image Block'),
			'description'       => __('A different image block.'),
			'render_template'   => 'blocks/newimage-block.php',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array( 'image', 'text' ),
			'mode'				=> 'auto'
		));
	}

	// Check if function exists and hook into setup.
	if( function_exists('acf_register_block_type') ) {
		add_action('acf/init', 'register_acf_block_types');
	}

	/**
	 * Enqueue Gutenberg scripts and styles to backend area.
	 */
	function wds_gutenberg_assets() {
		wp_enqueue_style( 'wds-gutenberg-admin', get_stylesheet_directory_uri() . '/gutenberg.css', array(), '1.0.0' );
	}
	add_action( 'enqueue_block_assets', 'wds_gutenberg_assets' );



	
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	
	// Get the theme settings
	$active_theme = wp_get_theme();
	define( 'THEME_VERSION', $active_theme->get('Version') );
	
	
	// Disablers and cleanup
	include_once 'functions/admin/_auto-update.php';
	include_once 'functions/admin/_wp-disabler.php';
	include_once 'functions/admin/_wp-backend.php';
	include_once 'functions/admin/_admin.php';
	
	// Include main function files
	include_once 'functions/_theme.php';
	include_once 'functions/_functions.php';
	include_once 'functions/_customposts.php';
	include_once 'functions/_shortcodes.php';
	include_once 'functions/_ajax.php';

	// Include ACF blocks
	include_once 'functions/_acf-blocks.php';
	
	
	
	// External vendor includes
	if( !function_exists('include_field_types_Gravity_Forms') ) {
		include_once 'functions/vendor/gravityforms-acf-population/acf-gravity_forms.php';
	}
	
?>