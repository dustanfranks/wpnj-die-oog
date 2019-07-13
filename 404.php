<?php
/**
 * The template used for 404 pages.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>
<section id="content" class="full-width">

	<div id="post-404page">
		
		<div class="post-content">
			
			<img src="<?= DieOog::$theme_dir; ?>/dist/images/404.png" alt="">

			<h1>Oops, Nothing found here</h1>

			<a href="<?= get_bloginfo('url'); ?>" class="cta-btn">Hop On Home</a>

		</div>

	</div>

</section>
<?php
get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
