<?php
/**
 * Default posts Page, connected to custom_post_query();
 * -aside
 * -audio
 * -chat
 * -gallery
 * -image
 * -link
 * -quote
 * -status
 * -standard
 * -video
 */
?>
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
/**
 * thumbnail,medium,medium_large,large,full
 * the_post_thumbnail( 'thumbnail' );
 * if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) )
 * style="background-image:url(<?php the_post_thumbnail_url(); ?>);"
 */
?>
<div <?php post_class('container-fluid verso'); ?> style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
	<div class="container" id="post-<?php the_ID(); ?>">
		<div class="row align-items-center">
		<?php if ($imagesTotal) :?>
			<div class="col col-md-7">
				<div class="row align-items-center">
					<?php foreach ($images as $image): ?>
						<div class="col-md-<?php echo $imagesCulumn;?> col-md-auto col-sm-12">
							<?php echo wp_get_attachment_image( $image->ID, 'large',false,array('class' =>'img-fluid')); ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col col-md-5 text-center text-md-left">
				<h2><?php the_title(); ?></h2>
				<?php the_excerpt(); ?>
			</div>
		<?php else: ?>
			<div class="col col-md-8 col-sm-12 offset-md-2">
				<h3 class="text-center"><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>
