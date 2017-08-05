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
// if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) )
?>
<div <?php post_class('verso container-fluid'); ?> style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
	<div class="container" id="post-<?php the_ID(); ?>">
		<div class="row align-items-center">
		<?php if ($imagesTotal) :?>
			<div class="cal col-md-5 col-sm-12 text-center text-md-right">
				<h2><?php the_title(); ?></h2>
				<?php the_excerpt(); ?>
			</div>
			<div class="cal col-md-7">
				<div class="row">
					<?php foreach ($images as $image): ?>
						<div class="col-<?php echo $imagesCulumn;?> col-md-auto col-sm-12">
							<?php echo wp_get_attachment_image( $image->ID, 'large',false,array('class' =>'img-fluid')); ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php else: ?>
			<div class="col-md-12 col-md-offset-1 text-center">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>
