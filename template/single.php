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
<div <?php post_class('container-fluid single'); ?>>
	<div class="container">
		<div class="row">
			<div class="<?php echo is_active_sidebar( 'single' )?'col-md-9':'col-md-12'; ?>">
				<article id="post-<?php the_ID(); ?>">
					<h1><?php the_title(); ?></h1>
					<h2><?php echo getPostViews(get_the_ID()); ?></h2>
					<h3><?php echo $imagesTotal; ?></h3>
					<?php the_content(); ?>
				</article>
			</div>
			<?php get_sidebar('single'); ?>
		</div>
	</div>
</div>

<?php if ($imagesTotal) : ?>
<div class="container-fluid single galleries-">
	<div class="container">
		<div class="row align-items-center">
			<?php foreach ($images as $image): ?>
				<div class="col col-md-<?php echo $imagesCulumn;?> col-md-auto col-sm-12">
					<h3>
						<?php echo wp_get_attachment_link($image->ID, false, true, false, $image->post_title); ?>
					</h3>
					<?php echo wp_get_attachment_image( $image->ID, 'large',false,array('class' =>'img-fluid')); ?>
					<p>
						<?php echo $image->post_content; ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endif; ?>
