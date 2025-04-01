<?php get_header(); ?>

<div class="primary">
    <div class="main">
        <div class="container">
            <?php
            while( have_posts() ):
                the_post();
                ?>
                <article>
                    <header>
                        <h1><?php the_title(); ?></h1>
                        <div class="meta-info">
                            <p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link();?></p>
                            <p>Catgeries: <?php the_category( ' ' ); ?> </p>
                            <p> <?php the_tags('', ', '); ?></p>
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
<?php get_footer(); ?> 
