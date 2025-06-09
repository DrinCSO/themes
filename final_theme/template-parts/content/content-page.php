<?php
/**
 * Template part for displaying page content.
 *
 * @package YourThemeName
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
    <header class="entry-header mb-4">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <div class="entry-content">
        <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yourthemename' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
