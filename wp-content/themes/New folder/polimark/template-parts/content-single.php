<?php

/**
 * Template part for displaying post details
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package polimark
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-details-post'); ?>>
    <?php polimark_post_thumbnail(); ?>
    <div class="blog-details__content">
        <?php if ('post' === get_post_type()) : ?>
            <ul class="list-unstyled blog-one-card__meta">
                <li><?php polimark_posted_on(); ?></li>
                <li><?php polimark_posted_by(); ?></li>
                <?php if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) : ?>
                    <li><?php polimark_comment_count(); ?></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
        <div class="entry-content clearfix text">
            <?php
            the_content();

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'polimark'),
                    'after'  => '</div>',
                )
            );

            ?>
        </div><!-- .entry-content -->
    </div><!-- /.blog-details__content -->
    <div class="entry-footer">
        <?php polimark_entry_footer(); ?>
    </div><!-- /.entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->