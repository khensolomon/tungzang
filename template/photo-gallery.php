<div <?php post_class('container-fluid'); ?>>
	<div class="container">
		<?php
			// while ( have_posts() ) : the_post();
			// 	get_template_part('template/photo');
			// endwhile;
		?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row text-center">
				<div class="col-md-8 offset-md-2">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</div>
<div class="galleries container-fluid">
	<div class="container">
		<?php foreach ($catGallery as $category ): ?>
			<?php
			$img_query = new WP_Query(
				array(
					'cat' => $category->term_id,
					'post_type'  => 'attachment',
					'post_mime_type' => 'image',
					'post_status' => 'published',
					'posts_per_page' => 6
				)
			);
			if ($img_query->posts) :
				$img_category_link = add_query_arg(array('gallery' => $category->category_nicename), get_permalink() );
			?>
			<div class="row">
				<div class="mx-auto">
					<h2><a href="<?php echo $img_category_link; ?>"><?php echo esc_html($category->name); ?></a></h2>
				</div>
			</div>
			<div class="row text-center">
				<div class="d-block mx-auto">
					<div class="row align-items-center">
						<?php foreach ($img_query->posts as $image ) : ?>
							<?php
								printf( '<a class="col  galleries" title="%1$s" href="%2$s">%3$s</a>',
									esc_html($category->name),
									esc_url( wp_get_attachment_url( $image->ID ) ),
									wp_get_attachment_image( $image->ID, 'medium',false,array('class' =>'img-fluid'))
								);
							?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col col-md-6 offset-md-3">
					<!-- <hr class="featurette-divider" title="<?php echo $img_query->found_posts; ?>" /> -->
					<div class="jumbotron text-center">
						<p class="lead">
							<?php
								if ($category->description == '') {
									echo esc_html($category->name).' gallery contains ';
								} else {
									echo esc_html($category->description);
								}
							?>
							<?php
								printf(
									_n(
										'<span>%1$s photo</span>.',
										'<a href="%2$s" class="badge badge-pill badge-danger">%1$s photos.</a>', $img_query->found_posts
									),
									number_format_i18n( $img_query->found_posts ),$img_category_link
								);
							?>
						</p>
					</div>
				</div>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
