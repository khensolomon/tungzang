<?php
	/*
	Template Name: Home
	*/
	get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
	<div <?php post_class('container-fluid'); ?>>
		<div class="container">
			<?php
				// while ( have_posts() ) : the_post();
				// 	get_template_part('template/home');
				// 	if ( '' !== get_the_author_meta( 'description' ) ) { get_template_part( 'template/biography' ); }
				// 	the_post_thumbnail( 'medium', array( 'class' => 'img-fluid' ));
				// endwhile;
			?>
			<?php if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) ) :?>
			<?php else: ?>
			<?php endif; ?>
			<div class="row text-center">
				<div class="col-md-12 col-md-offset-2">
					<h1 class="display-3"><?php the_title(); ?></h1>
					<?php the_content(); ?>
					<p class="blog-post-meta" style="display:none;"><?php the_date(); ?> by <a href="#"><?php the_author(); ?></a></p>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>
<?php custom_post_query(get_post_meta(get_the_ID()),'template/format',13); ?>
<?php
	get_footer();
?>
