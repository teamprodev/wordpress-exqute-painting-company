<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package polimark
 */

get_header();
?>

<main class="blog-one" id="main">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr((is_active_sidebar('sidebar-1') ? 'col-lg-8' : 'col-lg-12')); ?>">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) :
						the_post();
						get_template_part('template-parts/content', get_post_type());
					endwhile; ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="blog-pagination">
								<?php polimark_pagination(); ?>
							</div><!-- /.blog-pagination -->
						</div><!-- /.col-lg-12 -->
					</div><!-- /.row -->
				<?php else :
					get_template_part('template-parts/content', 'none');
				endif; ?>
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
get_sidebar();
get_footer();
