<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package polimark
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-one-card'); ?>>
	<?php polimark_post_thumbnail(); ?>
	<div class="blog-one-card__content">
		<?php if ('post' === get_post_type()) : ?>
			<ul class="list-unstyled blog-one-card__meta">
				<li><?php polimark_posted_on(); ?></li>
				<li><?php polimark_posted_by(); ?></li>
				<?php if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) : ?>
					<li><?php polimark_comment_count(); ?></li>
				<?php endif; ?>
			</ul>
		<?php endif; ?>
		<?php
		if (is_singular()) :
			the_title('<h4 class="blog-one-card__title">', '</h4>');
		else :
			the_title('<h4 class="blog-one-card__title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');
		endif; ?>
		<p class="blog-one-card__text">
			<?php polimark_excerpt(37); ?>
		</p><!-- /.blog-one-card__text -->
		<a href="<?php the_permalink(); ?>" class="thm-btn blog-one-card__btn"><?php esc_html_e('Read More', 'polimark'); ?></a><!-- /.thm-btn -->
	</div><!-- /.blog-one-card__content -->
</article><!-- #post-<?php the_ID(); ?> -->