<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset=<?php bloginfo('charset') ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
          <?php the_custom_logo(); ?>
        </a>

        <button id="hamburger" class="navbar-toggler hamburger" type="button" aria-label="Toggle navigation">
          <span class="hamburger-line"></span>
          <span class="hamburger-line"></span>
          <span class="hamburger-line"></span>
        </button>

        <div class="navbar-collapse" id="navbarNav">
            <?php the_custom_logo(); ?>
            <h2>sztuckiszewcow</h2>
          <?php
            wp_nav_menu(array(
              'theme_location' => 'header-menu',
              'menu_class'     => 'navbar-nav ms-auto',
              'container'      => false,
              'depth'          => 2,
              'fallback_cb'    => false,
            ));
            if ( is_active_sidebar( 'social-icons-widget' ) ) : ?>
              <div class="social-icons-widget-area">
                <?php dynamic_sidebar( 'social-icons-widget' ); ?>
              </div>
            <?php endif; ?>
        </div>
      </div>
    </nav>