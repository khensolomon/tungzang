<?php
	get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
	<div <?php post_class('container-fluid'); ?>>
		<div class="container">
			<div class="row align-items-center">
				<?php if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) ) :?>
					<div class="col col-md-6">
						<?php echo get_the_post_thumbnail( get_the_ID(), 'large',array('class' =>'img-fluid mx-auto d-block')); ?>
					</div>
					<div class="col col-md-6 col-sm-12 text-center text-md-left">
				<?php else: ?>
					<div class="col-md-12 text-center">
				<?php endif; ?>
					<h1 class="display-4"><?php the_title(); ?></h1>
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
