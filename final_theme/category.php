<?php
/**
 * Template for Category and Archive Pages
 *
 * @package YourThemeName
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <?php
                    if ( is_category() ) {
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    } elseif ( is_tag() ) {
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    } elseif ( is_author() ) {
                        the_post();
                        echo '<h1 class="page-title">Author: ' . get_the_author() . '</h1>';
                        rewind_posts();
                    } elseif ( is_day() ) {
                        echo '<h1 class="page-title">Day: ' . get_the_date() . '</h1>';
                    } elseif ( is_month() ) {
                        echo '<h1 class="page-title">Month: ' . get_the_date( 'F Y' ) . '</h1>';
                    } elseif ( is_year() ) {
                        echo '<h1 class="page-title">Year: ' . get_the_date( 'Y' ) . '</h1>';
                    } else {
                        echo '<h1 class="page-title">Archives</h1>';
                    }
                ?>
            </header><!-- .page-header -->

            <?php
            // Start the Loop
            while ( have_posts() ) : the_post();

                // Include the content template for the post format
                get_template_part( 'template-parts/content/content', get_post_format() );

            endwhile;

            // Display pagination
            the_posts_navigation( array(
                'prev_text' => __( '&larr; Previous', 'yourthemename' ),
                'next_text' => __( 'Next &rarr;', 'yourthemename' )
            ) );

        else :

            get_template_part( 'template-parts/content/content', 'none' );

        endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
