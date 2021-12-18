<?php get_header(); ?>


<!-- Hero section -->
<?php $heroQuery = new WP_Query(array("posts_per_page" => 3, "meta_key" => "featured_article", "orderby" => "meta_value"));
$pageInc = 0;
if ($heroQuery->have_posts()) : ?>
    <div class="hero">
        <div id="heroIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <div class="container">
                    <button type="button" data-bs-target="#heroIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#heroIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#heroIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
            </div>
            <div class="carousel-inner">
                <?php while ($heroQuery->have_posts()) :
                    $heroQuery->the_post();
                    $pageInc++;
                ?>
                    <div class="carousel-item <?php echo $pageInc == 1 ? "active" : "" ?>">
                        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" srcset="<?php echo wp_get_attachment_image_srcset(get_post_thumbnail_id()) ?>" sizes="100vw">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xxl-6">
                                        <h2 class="hero__title"><a href="<?php echo esc_url(get_permalink()) ?>"><?php echo sanitize_text_field(get_the_title()); ?></a></h2>
                                        <p class="hero__content"><?php echo esc_textarea(get_the_excerpt()) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
    </div>

<?php endif;
wp_reset_postdata(); ?>


<?php get_footer(); ?>