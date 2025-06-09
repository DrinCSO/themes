<?php 
/**
 * The main template file
 *
 * @package YourThemeName
 */

get_header();
?>

<main id="primary" class="site-main py-4">
    <div class="container">
        <section class="main-posts">
            <?php if ( have_posts() ) : ?>
                <header class="page-header mb-4">
                    <h1 class="page-title h3 border-bottom pb-2">
                        <?php
                            if ( is_home() && ! is_front_page() ) {
                                single_post_title();
                            } else {
                                esc_html_e( 'Latest Posts', 'yourthemename' );
                            }
                        ?>
                    </h1>
                </header>

                <div class="row g-4">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content/content', get_post_format() );
                    endwhile;
                    ?>
                </div><!-- .row -->

                <div class="pagination-wrapper mt-5">
                    <?php
                        the_posts_pagination( array(
                            'mid_size'  => 2,
                            'prev_text' => __( '&laquo; Prev', 'yourthemename' ),
                            'next_text' => __( 'Next &raquo;', 'yourthemename' ),
                            'screen_reader_text' => __( 'Posts navigation' ),
                            'before_page_number' => '<span class="btn btn-outline-secondary me-1">',
                            'after_page_number'  => '</span>',
                        ) );
                    ?>
                </div>

            <?php else : ?>
                <div class="alert alert-warning">
                    <?php get_template_part( 'template-parts/content/content', 'none' ); ?>
                </div>
            <?php endif; ?>
        </section>
    </div>
</main>

<?php
get_sidebar();
get_footer();
