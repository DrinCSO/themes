<?php
/**
 * The template for displaying all single posts
 *
 * @package YourThemeName
 */

get_header();
?>

<main id="primary" class="site-main single-post-page">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content/content', get_post_type() );
        ?>

            <div class="post-meta">
                <span class="posted-on">
                    <i class="dashicons dashicons-calendar"></i>
                    <?php echo get_the_date(); ?>
                </span>
                <span class="byline">
                    <i class="dashicons dashicons-admin-users"></i>
                    <?php the_author_posts_link(); ?>
                </span>
                <span class="cat-links">
                    <i class="dashicons dashicons-category"></i>
                    <?php the_category( ', ' ); ?>
                </span>
                <span class="tags-links">
                    <i class="dashicons dashicons-tag"></i>
                    <?php the_tags( '', ', ', '' ); ?>
                </span>
            </div>

            <div class="post-navigation">
                <div class="nav-previous">
                    <?php previous_post_link( '%link', '<i class="dashicons dashicons-arrow-left-alt2"></i> %title' ); ?>
                </div>
                <div class="nav-next">
                    <?php next_post_link( '%link', '%title <i class="dashicons dashicons-arrow-right-alt2"></i>' ); ?>
                </div>
            </div>

            <?php
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            ?>

        <?php endwhile;
        ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();
