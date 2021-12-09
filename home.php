<?php get_header(); ?>

<h1 class="text-center">Article page</h1>



<div class="row">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="col-md-4">
                <div class="article__card">
                    <h3 class="article__card--title"><?php echo esc_html(get_the_title()) ?></>
                        <p class="article__card--content"><?php echo esc_textarea(get_the_excerpt()) ?></p>
                </div>
            </div>
    <?php endwhile;
    endif; ?>
</div>

<?php get_footer(); ?>