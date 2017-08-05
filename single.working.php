<?php
	get_header();
?>
<?php while ( have_posts() ) : the_post();   ?>
<div <?php post_class('container-fluid'); ?>>
	<div class="container" id="post-<?php the_ID(); ?>">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1><?php the_title(); ?></h1>
				<div><?php custom_meta_posted_on(); ?></div>
				<div><?php custom_meta_posted_on(); ?></div>
			</div>
		</div>
	</div>
</div>
	<?php
	$Id= get_the_ID();
	// echo custom_PostViews(get_the_ID(),true);
	setPostViews(get_the_ID());

	?>
	<?php
	echo getPostViews(get_the_ID());
	// get_template_part( 'template/single', get_post_format() );
	?>
<?php endwhile; ?>
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<nav class="navigation post-navigation" role="navigation">
					<ul class="nav-links pager">
						<?php
							next_post_link( '<li aria-hidden="true" class="badge">&laquo;%link</li> ', '%title' );
							previous_post_link( '<li aria-hidden="true" class="badge">%link&raquo;</li>', '%title');
						?>
					</ul>
				</nav>
			</div>
			<?php if ( comments_open() || get_comments_number() ): ?>
				<div class="col-md-12">
					<?php comments_template(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php
	get_footer();
?>
