<?php get_header(); ?>

<div class="content">
	<div class="container">

	<h1><?php the_title();?></h1>
		
		<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
				//
				the_content();
				//
			} // end while
		} // end if
		?>

	</div>

</div>
	
<?php get_footer(); ?>