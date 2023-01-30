<?php get_header(); ?>

<section class="single-event-post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <div class="single-event-post__image">
                    <?php the_post_thumbnail('polimark_770x408'); ?>

                    <div class="single-event-post__date">
                        <?php $event_date = get_post_meta(get_the_ID(), 'polimark_event_date', true);
                        $dateTimeFormatted = DateTime::createFromFormat('m/d/Y', $event_date);
                        echo esc_html($dateTimeFormatted->format('d M'));
                        ?>
                    </div><!-- /.single-event-post__date -->
                </div><!-- /.single-event-post__image -->
                <div class="single-event-post__content">
                    <ul class="list-unstyled single-event-post__meta">
                        <li><i class="far fa-clock"></i> <?php echo esc_html(get_post_meta(get_the_ID(), 'polimark_event_time', true)); ?></li>
                        <li><i class="fa fa-location-arrow"></i><?php echo esc_html(get_post_meta(get_the_ID(), 'polimark_event_location', true)); ?></li>
                    </ul><!-- /.list-unstyled -->
                    <h3 class="single-event-post__title">
                        <?php the_title(); ?>
                    </h3><!-- /.single-event-post__title -->
                    <div class="single-event-post__text">
                        <?php the_content(); ?>
                    </div><!-- /.single-event-post__text -->
                </div><!-- /.single-event-post__content -->
            </div><!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <div class="single-event-post__widget">

                    <h3 class="single-event-post__widget__title">
                        <?php echo esc_html__('Event Details', 'polimark-addon'); ?>
                    </h3><!-- /.single-event-post__widget__title -->
                    <ul class="list-unstyled single-event-post__widget__list">
                        <li>
                            <i class="fa fa-calendar"></i>
                            <strong>
                                <?php echo esc_html__('Date', 'polimark-addon'); ?>
                            </strong>
                            <span>
                                <?php echo esc_html($dateTimeFormatted->format('d F, Y')); ?>
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-clock"></i>
                            <strong>
                                <?php echo esc_html__('Time', 'polimark-addon'); ?>
                            </strong>
                            <span>
                                <?php echo esc_html(get_post_meta(get_the_ID(), 'polimark_event_time', true)); ?>
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-home"></i>
                            <strong>
                                <?php echo esc_html__('Venue', 'polimark-addon'); ?>
                            </strong>
                            <span>
                                <?php echo esc_html(get_post_meta(get_the_ID(), 'polimark_event_venue', true)); ?>
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <strong>
                                <?php echo esc_html__('Location', 'polimark-addon'); ?>
                            </strong>
                            <span>
                                <?php echo esc_html(get_post_meta(get_the_ID(), 'polimark_event_location', true)); ?>
                            </span>
                        </li>
                    </ul><!-- /.list-unstyled single-event-post__widget__list -->
                </div><!-- /.single-event-post__widget -->

                <div class="single-event-post__widget">
                    <h3 class="single-event-post__widget__title">
                        <?php echo esc_html__('Speakers', 'polimark-addon'); ?>
                    </h3><!-- /.single-event-post__widget__title -->
                    <ul class="list-unstyled single-event-post__widget__speakers">
                        <?php $event_speakers = get_post_meta(get_the_ID(), 'polimark_event_speakers', true);
                        ?>
                        <?php foreach ($event_speakers as $speaker) : ?>
                            <li>
                                <?php echo wp_get_attachment_image($speaker['polimark_speaker_image_id'], 'polimark_60x60'); ?>
                                <div class="single-event-post__widget__speakers__content">
                                    <h3 class="single-event-post__widget__speakers__name">
                                        <?php echo esc_html($speaker['polimark_speaker_name']); ?>
                                    </h3>
                                    <p class="single-event-post__widget__speakers__designation">
                                        <?php echo esc_html($speaker['polimark_speaker_designation']); ?>
                                    </p>
                                </div><!-- /.single-event-post__widget__speakers__content -->
                            </li>

                        <?php endforeach; ?>
                    </ul><!-- /.list-unstyled single-event-post__widget__list -->
                </div><!-- /.single-event-post__widget -->

                <div class="single-event-post__widget">
                    <h3 class="single-event-post__widget__title">
                        <?php echo esc_html__('Location', 'polimark-addon'); ?>
                    </h3><!-- /.single-event-post__widget__title -->
                    <div class="single-event-post__widget__map__wrapper">
                        <iframe src="<?php echo esc_attr(get_post_meta(get_the_ID(), 'polimark_location_map', true)); ?>" class="single-event-post__widget__map"></iframe>
                    </div><!-- /.single-event-post__widget__map__wrapper -->
                </div><!-- /.single-event-post__widget -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.single-event -->



<section class="recent-events">

    <div class="container">
        <div class="block-heading text-center">
            <p class="block-heading__text">
                <?php esc_html_e('Checkout Our Events', 'polimark-addon'); ?>
            </p><!-- /.block-heading__text -->
            <h2 class="block-heading__title">
                <?php esc_html_e('Related Events', 'polimark-addon'); ?>
            </h2><!-- /.block-heading__title -->
        </div><!-- /.block-heading -->

        <div class="owl-carousel owl-theme recent-events-carousel">
            <?php
            $polimark_event_post_query = new WP_Query(array(
                'post_type' => 'event',
                'posts_per_page' => 9,
            ));
            ?>
            <?php while ($polimark_event_post_query->have_posts()) : ?>
                <?php $polimark_event_post_query->the_post(); ?>

                <div class="item">
                    <div class="recent-events-card">
                        <div class="recent-events-card__image">
                            <?php the_post_thumbnail('polimark_370x228'); ?>
                            <div class="recent-events-card__date">
                                <?php
                                $recent_event_date = get_post_meta(get_the_ID(), 'polimark_event_date', true);
                                $recentDateTimeFormatted = DateTime::createFromFormat('m/d/Y', $recent_event_date);
                                echo esc_html($recentDateTimeFormatted->format('d M')); ?>
                            </div><!-- /.single-event-post__date -->
                        </div><!-- /.recent-events-card__image -->
                        <div class="recent-events-card__content">
                            <ul class="list-unstyled single-event-post__meta">
                                <li><i class="far fa-clock"></i> <?php echo esc_html(get_post_meta(get_the_ID(), 'polimark_event_time', true)); ?></li>
                                <li><i class="fa fa-location-arrow"></i><?php echo esc_html(get_post_meta(get_the_ID(), 'polimark_event_location', true)); ?></li>
                            </ul><!-- /.list-unstyled -->
                            <h3 class="recent-events-card__title">
                                <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <a href="<?php echo esc_url(get_the_permalink()) ?>" class="recent-events-card__link">
                                <?php esc_html_e('Read More', 'polimark-addon'); ?>
                            </a>

                        </div><!-- /.recent-events-card__content -->
                    </div><!-- /.recent-events-card -->
                </div><!-- /.item -->
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- /.owl-carousel owl-theme recent-events-carousel -->

    </div><!-- /.container -->
</section><!-- /.recent-events -->

<?php get_footer(); ?>