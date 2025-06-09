<?php
/* Template for static homepage */
get_header(); ?>
<main class="container py-5">
    <?php
    while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/content/content', 'page' );
    endwhile;
    ?>
</main>
<?php get_footer(); ?>
