<?php

/**

 * The Header for our theme

 *

 * @package WordPress

 * @subpackage keepwriting

 * @since keepwriting 1.0

 */

?><!DOCTYPE html>

<!--[if IE 7]>

<html class="ie ie7" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8]>

<html class="ie ie8" <?php language_attributes(); ?>>

<![endif]-->

<!--[if !(IE 7) | !(IE 8) ]><!-->

<html <?php language_attributes(); ?>>

<!--<![endif]-->

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--[if lt IE 9]>

	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>

	<![endif]-->

	<?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>



<div class="container mainbody">

	<nav class="navmenu navbar-inverse" role="navigation">

		<!-- Brand and toggle get grouped for better mobile display -->

		<div class="container">

		<div class="navbar-header">

			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">

				<span class="sr-only"><?php _e( 'Toggle navigation', 'keepwriting' ); ?></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

			</button>

			<div class="datetime"><span id="nowday"></span> | <span id="nowdate"></span></div>

		

		</div>

	

		<?php

		    wp_nav_menu( array(

		        'menu'              => 'primary',

		        'theme_location'    => 'primary',

		        'depth'             => 2,

		        'container'         => 'div',

		        'container_class'   => 'collapse navbar-collapse',

		         'container_id'      => 'navbar-ex-collapse',

		         'menu_class'        => 'nav navbar-nav navbar-right',

		        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',

		        'walker'            => new wp_bootstrap_navwalker())

		    );



		?>



		</div>

	</nav>



	<header id="masthead" class="header" role="banner">

		<div class="row">

			<div class="col-md-12">

			<h1 class="heading"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('title'); ?></a></h1>

			<h2 class="description"><?php bloginfo('description'); ?></h2>

			</div>

		</div>

	</header>
