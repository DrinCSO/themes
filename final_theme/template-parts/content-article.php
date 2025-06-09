<?php
/**
 * Template part for displaying a single article in a list or grid.
 *
 * @package YourThemeName
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-block'); ?>>
    <div class="article-inner">
        <header class="entry-header">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="article-thumbnail">
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <?php the_post_thumbnail( 'medium_large' ); ?>
                    </a>
                </div>
            <?php endif; ?>

            <div class="entry-meta">
                <span class="posted-on">
                    <i class="dashicons dashicons-calendar-alt"></i>
                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                        <?php echo esc_html( get_the_date() ); ?>
                    </time>
                </span>

                <span class="byline">
                    <i class="dashicons dashicons-admin-users"></i>
                    <?php the_author_posts_link(); ?>
                </span>

                <?php if ( has_category() ) : ?>
                    <span class="cat-links">
                        <i class="dashicons dashicons-category"></i>
                        <?php the_category( ', ' ); ?>
                    </span>
                <?php endif; ?>
            </div><!-- .entry-meta -->

            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        </header><!-- .entry-header -->

        <div class="entry-summary">
            <?php if ( has_excerpt() ) {
                echo '<p>' . get_the_excerpt() . '</p>';
            } else {
                echo '<p>' . wp_trim_words( get_the_content(), 30, '...' ) . '</p>';
            } ?>
        </div><!-- .entry-summary -->

        <footer class="entry-footer">
            <a class="read-more-button" href="<?php the_permalink(); ?>">
                <?php esc_html_e( 'Read More', 'yourthemename' ); ?> &rarr;
            </a>

            <?php if ( comments_open() || get_comments_number() ) : ?>
                <span class="comments-link">
                    <i class="dashicons dashicons-admin-comments"></i>
                    <?php
                    comments_popup_link(
                        esc_html__( 'Leave a comment', 'yourthemename' ),
                        esc_html__( '1 Comment', 'yourthemename' ),
                        esc_html__( '% Comments', 'yourthemename' )
                    );
                    ?>
                </span>
            <?php endif; ?>
        </footer><!-- .entry-footer -->
    </div><!-- .article-inner -->
</article><!-- #post-## -->
