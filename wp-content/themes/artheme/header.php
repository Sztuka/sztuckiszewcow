<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset=<?php bloginfo('charset') ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
  <body <?php body_class(); ?> data-bs-spy="scroll" data-bs-target="#navbarNav">
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <?php the_custom_logo(); ?>
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'menu_class'     => 'navbar-nav ms-auto',
                'container'      => false, // nie opakowujemy ul w dodatkowy div
                'depth'          => 2, // Limit głębokości zagnieżdżenia
                'fallback_cb'    => false, // Nie pokazujemy domyślnej listy stron jeśli menu nie jest ustawione
            ));
        ?>
        </div>
    </div>
</nav>

    


