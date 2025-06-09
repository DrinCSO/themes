<?php
/**
 * Main Sidebar Template
 *
 * @package YourThemeName
 */
?>

<aside id="secondary" class="sidebar-main widget-area" role="complementary">
    <div class="sidebar-inner">

        <!-- Search Form -->
        <section class="widget widget_search">
            <?php get_search_form(); ?>
        </section>

        <!-- Recent Posts -->
        <section class="widget widget_recent_entries">
            <h2 class="widget-title"><?php esc_html_e( 'Recent Posts', 'yourthemename' ); ?></h2>
            <ul>
                <?php
                $recent_posts = new WP_Query( array(
                    'posts_per_page' => 5,
                    'post_status'    => 'publish'
                ) );
                if ( $recent_posts->have_posts() ) :
                    while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <span class="post-date"><?php echo get_the_date(); ?></span>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <li><?php esc_html_e( 'No recent posts available.', 'yourthemename' ); ?></li>
                <?php endif; ?>
            </ul>
        </section>

        <!-- Categories -->
        <section class="widget widget_categories">
            <h2 class="widget-title"><?php esc_html_e( 'Categories', 'yourthemename' ); ?></h2>
            <ul>
                <?php
                wp_list_categories( array(
                    'orderby'    => 'name',
                    'title_li'   => '',
                    'show_count' => true,
                ) );
                ?>
            </ul>
        </section>

        <!-- Tag Cloud -->
        <section class="widget widget_tag_cloud">
            <h2 class="widget-title"><?php esc_html_e( 'Tags', 'yourthemename' ); ?></h2>
            <div class="tagcloud">
                <?php wp_tag_cloud( array(
                    'smallest'  => 10,
                    'largest'   => 20,
                    'unit'      => 'px',
                    'number'    => 20,
                    'orderby'   => 'count',
                    'order'     => 'DESC',
                ) ); ?>
            </div>
        </section>

        <!-- Social Icons (Optional Static) -->
        <section class="widget widget_social">
            <h2 class="widget-title"><?php esc_html_e( 'Follow Us', 'yourthemename' ); ?></h2>
            <ul class="social-icons">
                <li><a href="#" class="facebook"><span class="dashicons dashicons-facebook"></span> Facebook</a></li>
                <li><a href="#" class="twitter"><span class="dashicons dashicons-twitter"></span> Twitter</a></li>
                <li><a href="#" class="instagram"><span class="dashicons dashicons-instagram"></span> Instagram</a></li>
                <li><a href="#" class="youtube"><span class="dashicons dashicons-youtube"></span> YouTube</a></li>
            </ul>
        </section>

    </div><!-- .sidebar-inner -->
</aside><!-- #secondary -->
