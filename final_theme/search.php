<?php
/**
 * The template for displaying search results pages.
 *
 * @package YourThemeName
 */

get_header();
?>

<section id="primary" class="content-area search-results">
    <main id="main" class="site-main">

        <header class="page-header">
            <?php if ( have_posts() ) : ?>
                <h1 class="page-title">
                    <?php
                        printf(
                            esc_html__( 'Search Results for: %s', 'yourthemename' ),
                            '<span>' . get_search_query() . '</span>'
                        );
                    ?>
                </h1>
            <?php else : ?>
                <h1 class="page-title">
                    <?php esc_html_e( 'Nothing Found', 'yourthemename' ); ?>
                </h1>
            <?php endif; ?>
        </header><!-- .page-header -->

        <?php
        if ( have_posts() ) :

            /* Start the Loop */
            while ( have_posts() ) :
                the_post();

                /**
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part( 'template-parts/content/content', 'article' );

            endwhile;

            the_posts_navigation( array(
                'prev_text' => __( 'Previous Results', 'yourthemename' ),
                'next_text' => __( 'More Results', 'yourthemename' )
            ) );

        else :

            get_template_part( 'template-parts/content/content', 'none' );

        endif;
        ?>

    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
