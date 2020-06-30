<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

	<div class="container">

		<h2><?php the_field('title');?></h2>

			<?php if( have_rows('slides') ): ?>
				<div class="slides">
					<?php while( have_rows('slides') ): the_row(); 
						$image = get_sub_field('image');
						?>
						<div>
              <img src="<?php echo $image['sizes']['large']; ?>" height="auto" width="100%" />
						</div>
					<?php endwhile; ?>
				</div>
			<?php else: ?>
				<p>Please add some slides.</p>
			<?php endif; ?>

	</div>
</div>