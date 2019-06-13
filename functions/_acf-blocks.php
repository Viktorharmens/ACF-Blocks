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
    'enqueue_assets' 	=> function(){

        wp_enqueue_style( 'block-image', get_template_directory_uri() . '/blocks/new-image/newimage.css', array(), '1.0.0' );
        
      },
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
