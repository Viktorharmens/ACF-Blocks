<?php


/**
 * Testimonial Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


    // Create id attribute allowing for custom "anchor" value.
    $id = 'testimonial-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" and "align" values.
    $className = 'testimonial';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }

    // Load values and assing defaults.
    $text = get_field('testimonial') ?: 'Your testimonial here...';
    $author = get_field('author') ?: 'Author name';
    $role = get_field('role') ?: 'Author role';
    $image = get_field('image') ?: 295;
    $background_color = get_field('background_color');
    $text_color = get_field('text_color');

    ?>

<?php
    echo $text;
    echo "<pre>";
    print_r($post->post_content);
    echo "</pre>";
?>

<img src="<?php echo $image['url']; ?>">

