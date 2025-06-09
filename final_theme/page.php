<?php
/**
 * The template for displaying all pages
 *
 * @package YourThemeName
 */

get_header(); ?>

<div id="primary" class="content-area">  
    <main id="main" class="site-main container py-4">

        <?php
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content/content', 'page' );

            // Load comments if enabled
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

        endwhile;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
