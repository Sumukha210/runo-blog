<?php get_header() ?>
<?php if (have_posts()) : while (have_posts()) : the_post() ?>

        <!-- hero section -->
        <div class="hero">
            <style>
                .hero {
                    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.3)), url("<?php echo get_the_post_thumbnail_url() ?>");
                }
            </style>

            <div class="hero__content">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xxl-5">
                        <h1 class="hero__title"><?php echo esc_html(get_the_title()) ?></h1>
                    </div>
                </div>
            </div>
        </div>


        <!-- content -->
        <div class="content__section">
            <div class="container">
                <?php the_content() ?>
            </div>
        </div>

<?php endwhile;
endif; ?>
</div>
<?php get_footer() ?>