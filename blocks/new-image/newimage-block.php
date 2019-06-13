<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'image-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'image';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$text = get_field('text') ?: 'Je tekst hier...';
$image = get_field('image') ?: 295;
$button = get_field('button') ?: 'Button link hier';
$background_color = get_field('background_color');
$text_color = get_field('text_color');
$order = get_field('order');

?>

<h2><?php the_field('title');?></h2>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" data-image="<?php echo $order; ?>">

    <div class="flexbox">

        <div class="photo">
            <?php echo wp_get_attachment_image( $image, 'full' ); ?>
        </div>
        
        <span class="image-text">
            <?php echo $text; ?>
        </span>
    
        <?php 
        
            if( $button ): 
                $link_url = $button['url'];
                $link_title = $button['title'];
                $link_target = $button['target'] ? $button['target'] : '_self';
                ?>
                <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        <?php endif; ?>

    </div>

    <style type="text/css">
        #<?php echo $id; ?> {
            background: <?php echo $background_color; ?>;
            color: <?php echo $text_color; ?>;
        }
    </style>
</div>