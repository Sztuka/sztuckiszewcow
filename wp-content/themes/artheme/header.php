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
            <a aria-label="Chat on WhatsApp" href="https://wa.me/1XXXXXXXXXX">
                <svg width="160" height="36" fill="none" xmlns="http://www.w3.org/2000/svg" role="img">
                    <title>Chat on WhatsApp</title>
                    <rect width="160" height="36" rx="8" fill="#fff"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.7885 8.7896c2.4186.0116 4.7528.9613 6.4988 2.6351 1.7881 1.7141 2.8185 4.0126 2.9086 6.4879.088 2.4173-.7559 4.7918-2.3566 6.6052-1.7555 1.9889-4.1975 3.1312-6.835 3.2069a9.4172 9.4172 0 0 1-.2709.0039c-1.4211 0-2.8291-.3205-4.1043-.9341l-4.9568 1.1025a.0728.0728 0 0 1-.086-.0812l.8373-5.012c-.7146-1.3056-1.1135-2.7768-1.1565-4.2731-.0724-2.5285.844-4.9337 2.5805-6.7728 1.8005-1.9068 4.2593-2.9683 6.894-2.9683h.0469Z" fill="#103928"/>
                    <path d="M46.9736 17.312h1.824c-.056-.496-.192-.936-.408-1.32-.216-.384-.492-.704-.828-.96-.328-.264-.704-.464-1.128-.6-.416-.136-.86-.204-1.332-.204-.656 0-1.248.116-1.776.348-.52.232-.96.552-1.32.96-.36.408-.636.888-.828 1.44-.192.544-.288 1.136-.288 1.776 0 .624.096 1.208.288 1.752.192.536.468 1.004.828 1.404.36.4.8.716 1.32.948.528.224 1.12.336 1.776.336.528 0 1.012-.08 1.452-.24.44-.16.824-.392 1.152-.696.328-.304.592-.672.792-1.104.2-.432.324-.916.372-1.452h-1.824c-.072.576-.272 1.04-.6 1.392-.32.352-.768.528-1.344.528-.424 0-.784-.08-1.08-.24-.296-.168-.536-.388-.72-.66-.184-.272-.32-.576-.408-.912-.08-.344-.12-.696-.12-1.056 0-.376.04-.74.12-.092.04-.352.224-.5.4-.2.112-.348.264-.468.456-.112.184-.196.396-.252.636-.048.24-.072.484-.072.732s.024.492.072.732c.048.24.132.452.252.636.112.176.264.32.456.432.184.112.416.168.696.168Zm3.0025-2.88V23h1.704v-3.252c0-.632.104-1.084.312-1.356.208-.28.544-.42 1.008-.42.408 0 .692.128.852.384.16.248.24.628.24 1.14V23h1.704v-3.816c0-.384-.036-.732-.108-1.044-.064-.32-.18-.588-.348-.804-.168-.224-.4-.396-.696-.516-.288-.128-.66-.192-1.116-.192-.36 0-.712.084-1.056.252-.344.16-.624.42-.84.78h-.036v-.864h-1.62Z" fill="#103928"/>
                </svg>
            </a>
        </div>
    </div>
</nav>

    


