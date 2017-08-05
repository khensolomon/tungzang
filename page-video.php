<?php
	/*
	Template Name: Video
	*/
	get_header();
?>
<div <?php post_class('container-fluid'); ?>>
	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
		  <div class="row text-center">
		    <div class="col-md-12">
		      <h1 class="display-3"><?php the_title(); ?></h1>
		      <?php the_content(); ?>
		    </div>
		  </div>
		<?php endwhile; ?>
	</div>
</div>
<?php
	custom_post_query(get_post_meta(get_the_ID()),'template/format',7);
?>
<?php
	get_footer();
?>
