<?php

	function register_acf_block_types() {

		// register blocks.
		acf_register_block_type(array(
			'name'              => 'newimage-block',
			'title'             => __('New Image Block'),
			'description'       => __('A different image block.'),
			'render_template'   => 'blocks/new-image/newimage-block.php',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array( 'image', 'text' ),
			'mode'				=> 'auto',
			'enqueue_style' 	=> get_template_directory_uri() . '/blocks/new-image/newimage.css',
		));

		acf_register_block_type(array(
            'name'              => 'slider',
            'title'             => __('Slider'),
            'description'       => __('A custom slider block.'),
            'render_template'   => 'blocks/slider/block-slider.php',
			'category'          => 'formatting',
			'icon' 				=> 'images-alt2',
			'align'				=> 'full',
			'enqueue_assets' 	=> function(){

				wp_enqueue_style( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
				wp_enqueue_style( 'slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
				wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );

				wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/blocks/slider/block-slider.css', array(), '1.0.0' );
				wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/blocks/slider/slider.js', array(), '1.0.0', true );
			  },
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
		wp_enqueue_style( 'wds-gutenberg-admin', get_stylesheet_directory_uri() . 'blocks/new-image/newimage.css', array(), '1.0.0' );
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