<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package polimark
 */

get_header();
?>

<main class="blog-one blog-details blog-details--page" id="main">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr((is_active_sidebar('sidebar-1') ? 'col-lg-8' : 'col-lg-12')); ?>">
				<?php while (have_posts()) :
					the_post();
					get_template_part('template-parts/content-single');

					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;
				endwhile; ?>
			</div><!-- /.col-lg-8 -->
			<?php if (is_active_sidebar('sidebar-1')) : ?>
				<div class="col-lg-4">
					<div class="blog-sidebar">
						<?php get_sidebar(); ?>
					</div><!-- /.blog-sidebar -->
				</div><!-- /.col-lg-4 -->
			<?php endif; ?>
		</div><!-- /.row -->
	</div><!-- /.container -->
</main><!-- /#main.blog-one -->

<?php
get_footer();
