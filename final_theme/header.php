<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Brand or Logo -->
            <a class="navbar-brand d-flex align-items-center gap-2" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    echo '<span class="fw-bold text-uppercase text-white">' . get_bloginfo( 'name' ) . '</span>';
                }
                ?>
            </a>

            <!-- Toggler for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'primary',
                    'depth'           => 2,
                    'container'       => false,
                    'menu_class'      => 'navbar-nav me-auto mb-2 mb-lg-0',
                    'fallback_cb'     => '__return_false',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ) );
                ?>

                <!-- Search Form -->
                <form class="d-flex" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input class="form-control me-2" type="search" name="s" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Go</button>
                </form>
            </div>
        </div>
    </nav>
</header>
