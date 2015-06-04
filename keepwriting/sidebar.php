<?php
/**
 * Sidebar template
 *
 * @package WordPress
 * @subpackage keepwriting
 * @since keepwriting 1.0
 */
?>

<ul class="sidebar">

	<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'bottomsection' ) ) : else : ?>

		<li><p><?php _e( 'Please configure this section through Widgets', 'keepwriting' ); ?></p></li>

	<?php endif; ?>

</ul>