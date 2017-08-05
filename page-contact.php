<?php
	/*
	Template Name: Contact
	*/
	get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
	<div <?php post_class('container-fluid'); ?> style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
		<div class="container">
	    <div class="row text-center">
	      <div class="col-md-12">
	        <h1 class="display-3"><?php the_title(); ?></h1>
	        <?php the_content(); ?>
	      </div>
	    </div>
	  </div>
	</div>
<?php endwhile; ?>
<?php if ( comments_open() || get_comments_number() ): ?>
	<div class="container-fluid">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-6 offset-md-3 mx-auto">
					<?php comments_template('/comments-contact.php'); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php
	get_footer();
?>
