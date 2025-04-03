<?php get_header(); ?>

<div class="primary">
    <div class="main">
        <div class="container">
            <?php
            while( have_posts() ):
                the_post();
                ?>
                <article class="post">
                    <header>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        <h1><?php the_title(); ?></h1>
                        <div class="meta-info">
                            <p>Posted on <?php echo get_the_date(); ?> by <?php the_author_posts_link();?></p>
                            <p>Categories: <?php the_category( ', ' ); ?> </p>
                            <p>Tags: <?php the_tags('', ', '); ?></p>
                        </div>
                    </header>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php
            if(comments_open() || get_comments_number() ){
                comments_template();
            }
            endwhile;
            ?>
        </div>
    </div>
</div>

<style>
    .post {
        background: #fff;
        padding: 20px;
        margin: 20px 0;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .post-thumbnail img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }
    .meta-info p {
        font-size: 14px;
        color: #666;
    }
    .content {
        margin-top: 20px;
        font-size: 16px;
        line-height: 1.6;
    }
</style>

<?php get_footer(); ?>
