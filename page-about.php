<?php
	/*
	Template Name: About
	*/
	get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
	<div <?php post_class('container-fluid'); ?> style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
		<div class="container">
		  <div class="row text-center">
		    <div class="col-md-12">
		      <h1><?php the_title(); ?></h1>
		      <?php the_content(); ?>
		    </div>
		  </div>
		</div>
	</div>
<?php endwhile; ?>
<?php
	custom_post_query(get_post_meta(get_the_ID()),'template/format',7);
?>
<?php
	get_footer();
?>
