<?php
$images = get_children(
	array(
		// 'numberposts' => 4,
		'post_parent' => get_the_ID(),
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		// 'order' => 'ASC',
		// 'order'=> 'DESC',
		// 'orderby' => 'menu_order'
	)
);
$imagesTotal = count( $images );
$imagesCulumn = ceil(12/$imagesTotal);
?>
<div <?php post_class('container-fluid verso'); ?>>
	<div class="container" id="post-<?php the_ID(); ?>">
		<div class="row align-items-center">
		<?php if ($imagesTotal) :?>
			<div class="col-md-12 text-center">
				<h2><?php the_title(); ?></h2>
			</div>
			<div class="col mx-auto">
				<div class="row align-items-center">
					<?php
					foreach ($images as $image):
						$imageUrl = wp_get_attachment_image_url($image->ID,'');
						$imageFluid = wp_get_attachment_image( $image->ID, 'large',false,array('class' =>'img-fluid'));
						print sprintf('<a class="col col-md-%1$d mx-auto col-sm-6 galleries" href="%2$s">%3$s</a>',$imagesCulumn,$imageUrl,$imageFluid);
					endforeach;
					?>
				</div>
			</div>
			<div class="col-md-12 text-center">
				<?php the_content(); ?>
			</div>
		<?php else: ?>
			<div class="col-md-8 offset-md-2 text-center">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>
