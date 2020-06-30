<?php

function register_acf_block_types() {

// register custom blocks.
acf_register_block_type(array(
    'name'              => 'newimage-block',
    'title'             => __('New Image Block'),
    'description'       => __('A different image block.'),
    'render_template'   => 'blocks/new-image/newimage-block.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array( 'image', 'text' ),
    'mode'				      =>  'edit',
    'align'             => array( 'wide', 'full' ),
    'enqueue_assets' 	  => function(){

        wp_enqueue_style( 'block-image', get_template_directory_uri() . '/blocks/new-image/newimage.css', array(), '1.0.0' );
        
      },
));

acf_register_block_type(array(
    'name'              => 'slider',
    'title'             => __('Slider'),
    'description'       => __('A custom slider block.'),
    'render_template'   => 'blocks/slider/block-slider.php',
    'category'          => 'formatting',
    'icon' 				      => 'images-alt2',
    'align'				      => 'full',
    'mode'              => 'edit',
    'enqueue_assets' 	  => function(){

        wp_enqueue_style( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
        wp_enqueue_style( 'slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
        wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );

        wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/blocks/slider/block-slider.css', array(), '1.0.0' );
        wp_enqueue_script( 'block-slider-js', get_template_directory_uri() . '/blocks/slider/slider.js', array(), '1.0.0', true );
      },
));

acf_register_block_type(array(
  'name'              => 'testimonial',
  'title'             => __('Testimonial'),
  'description'       => __('A custom testimonial block.'),
  'example'           => array(
    'attributes' => array(
        'mode' => 'preview',
        'data' => array(
            'text'   => "Blocks are...",
            'is_preview'    => true
        )
    )
        ),
  'render_template'   => 'blocks/block-testimonial/block-testimonial.php',
  'category'          => 'formatting',
  'icon' 				      => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z" /><path d="M19 13H5v-2h14v2z" /></svg>',
  'align'				      => 'full',
  'supports'          => array('align' => array('full', 'center')),
  'mode'              => 'edit',
  'enqueue_assets' 	  => function(){

      wp_enqueue_style( 'block-testimonial', get_template_directory_uri() . '/blocks/block-testimonial/block-testimonial.css', array(), '1.0.0' );
    },
));

}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
add_action('acf/init', 'register_acf_block_types');
}

// Custom styles for blocks
function be_gutenberg_scripts() {

  wp_enqueue_script(
    'be-editor', 
    get_stylesheet_directory_uri() . '/dist/js/editor.js', 
    array( 'wp-blocks', 'wp-dom' ), 
    filemtime( get_stylesheet_directory() . '/dist/js/editor.js' ),
    true
  );
}
add_action( 'enqueue_block_editor_assets', 'be_gutenberg_scripts' );


// Custom colors for color picker (also ACF color picker)
add_theme_support( 'editor-color-palette', array(
  array(
    'name'  => __( 'Blue', 'vmst' ),
    'slug'  => 'blue',
    'color'	=> '#59BACC',
  ),
  array(
    'name'  => __( 'Gray', 'vmst' ),
    'slug'  => 'gray',
    'color' => '#CCCCCC',
  ),
  array(
    'name'  => __( 'Dark-Gray', 'vmst' ),
    'slug'  => 'darkgray',
    'color' => '#333',
  ),
) );


// Get the colors formatted for use with Iris, Automattic's color picker
function output_the_colors() {
  
  // get the colors
    $color_palette = current( (array) get_theme_support( 'editor-color-palette' ) );

  // bail if there aren't any colors found
  if ( !$color_palette )
    return;

  // output begins
  ob_start();

  // output the names in a string
  echo '[';
    foreach ( $color_palette as $color ) {
      echo "'" . $color['color'] . "', ";
    }
  echo ']';
    
    return ob_get_clean();

}


// Add the colors into Iris
add_action( 'acf/input/admin_footer', 'gutenberg_sections_register_acf_color_palette' );
function gutenberg_sections_register_acf_color_palette() {

    $color_palette = output_the_colors();
    if ( !$color_palette )
        return;
    
    ?>
    <script type="text/javascript">
        (function( $ ) {
            acf.add_filter( 'color_picker_args', function( args, $field ){
                // add the hexadecimal codes here for the colors you want to appear as swatches
                args.palettes = <?php echo $color_palette; ?>
                // return colors
                return args;
            });
        })(jQuery);
    </script>
    <?php
}