<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if (is_singular() && pings_open(get_queried_object())) : ?><link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php endif; ?>
	<?php wp_head(); ?>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body <?php body_class(); ?>>
	<!-- navbar navbar-default navbar-static-top -->
	<!-- navbar-light rounded navbar-toggleable-md -->
<div class="navbar navbar-toggleable-md navbar-light">
	<div class="container">
		<div class="navbar-header">
			<div class="navbar-brand">
				<?php the_custom_logo(); ?>
			</div>
			<!-- navbar-toggler navbar-toggler-right collapsed -->
			<button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
		<?php
		wp_nav_menu(array(
			'menu'              => 'primary',
			'theme_location'    => 'primary',
			'depth'             => 2,
			'container'         => 'div',
			// 'container_class'   => 'collapse navbar-collapse text-sm-center navbar-ex1-collapse',
			'container_class'   => 'collapse navbar-collapse justify-content-md-center',
			'container_id'   		=> 'navbar-menu',
			'menu_class'        => 'nav navbar-nav navbar-right',
			// 'menu_class'        => 'nav navbar-nav pull-right',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker'            => new wp_bootstrap_navwalker()
		));
		?>
	</div>
</div>
