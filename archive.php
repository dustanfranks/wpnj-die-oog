<?php
/**
 * Archives template.
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

<section id="content" <?php Avada()->layout->add_class( 'content_class' ); ?> <?php Avada()->layout->add_style( 'content_style' ); ?>>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'fusion-archive-description' ); ?>>
		<div class="post-content">

		<?php if (is_category()) : 

			$the_cat = get_query_var('cat');
			$the_cat_obj = get_category($the_cat);

		?>

			<h2>CATEGORY: <?= $the_cat_obj->name; ?></h2>
			<hr style="background-color: #a0b26f; height: 4px; border:none; width: 100%; max-width: 200px; float: left;">

		<?php elseif (is_archive()) : 

			if (is_month()) {
			 	$td_archive_title = get_the_date('FF Y f');
			} 

		?>

			<h2>ARCHIVE: <?= substr($td_archive_title, 3, -2); ?></h2>
			<hr style="background-color: #a0b26f; height: 4px; border:none; width: 100%; max-width: 200px; float: left;">
		
		<?php endif; ?>

		</div>
	</div>

	<?php get_template_part( 'templates/blog', 'layout' ); ?>

</section>
<?php do_action( 'avada_after_content' ); ?>
<?php
get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
