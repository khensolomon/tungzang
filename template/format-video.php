<?php
$images = get_children(
	array(
		'numberposts' => 2,
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
<div <?php post_class('container-fluid verso'); ?> style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
	<div class="container" id="post-<?php the_ID(); ?>">
		<div class="row align-items-center">
		<?php if ($imagesTotal) :?>
			<div class="cal col-md-7">
				<div class="row">
					<?php foreach ($images as $image): ?>
						<div class="col-<?php echo $imagesCulumn;?> col-md-auto col-sm-12">
							<?php echo wp_get_attachment_image( $image->ID, 'large',false,array('class' =>'img-fluid')); ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="cal col-md-5 text-center">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
		<?php else: ?>
			<div class="col mx-auto text-center">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>
