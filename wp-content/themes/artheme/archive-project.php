<?php

get_header();

$email     = get_theme_mod('contact_email');
$phone     = get_theme_mod('contact_phone');
$whatsapp  = get_theme_mod('contact_whatsapp');
$messenger = get_theme_mod('contact_messenger');
$linkedin  = get_theme_mod('contact_linkedin');
$instagram = get_theme_mod('contact_instagram');
?>

<!-- Start Hero -->
<div class="container-fluid project-banner">
  <div class="row">
    <div class="col-md-12 parallax-image" style="background-image: url('<?php echo esc_url( get_theme_mod( 'services_image' ) ); ?>');"></div>
    <div class="overlay-text">
      <div class="project-title">
        <h1>Portfolio</h1>
      </div>
      <div class="btn-holder mb-5">
        <?php if ( $email ) : ?>
          <a href="mailto:<?php echo esc_attr( $email ); ?>" class="btn btn-dark-3 dark-hover-border-2">
            <span>Contact Me</span>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<!-- End Hero -->

<!-- Scroller Section -->
<div class="scroller section-space">
  <ul class="tag-list scroller_inner">
    <?php
      $args = array(
        'post_type'      => 'service',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
      );
      $services = new WP_Query($args);
      $service_titles = [];
      if ( $services->have_posts() ) :
        while ( $services->have_posts() ) : $services->the_post();
          $service_titles[] = get_the_title();
        endwhile;
        wp_reset_postdata();
      endif;
      // Podwójna lista tytułów
      foreach ( array_merge( $service_titles, $service_titles ) as $title ) {
        echo '<li>' . esc_html( $title ) . '</li>';
      }
    ?>
  </ul>
</div>

<!-- Portfolio Section -->
<div id="portfolio" class="container section-space py-5">
  
  <!-- Featured Projects: Case Studies -->
  <h2>Digital Case Studies</h2>
  <div class="featured-section section-space">
    <?php
      $featured_args = array(
        'post_type'      => 'project',
        'posts_per_page' => -1,
        'meta_query'     => array(
          array(
            'key'     => '_artzy_featured',
            'value'   => '1',
            'compare' => '='
          )
        )
      );
      $featured_projects = new WP_Query( $featured_args );
      if ( $featured_projects->have_posts() ) :
        while ( $featured_projects->have_posts() ) : $featured_projects->the_post();
    ?>
          <a href="<?php the_permalink(); ?>" class="project-link">
            <div class="project-card animate-on-scroll">
              <div class="project-image">
                <?php if ( has_post_thumbnail() ) : ?>
                  <img class="project-img"
                       src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>"
                       alt="<?php echo esc_attr( wp_strip_all_tags( get_the_excerpt() ) ); ?>">
                <?php endif; ?>
                <div class="overlay"></div>
              </div>
              <div class="project-label animate-on-scroll">
                <div class="label-content">
                  <h3><?php the_title(); ?></h3>
                  <p class="cat"><?php echo strip_tags( get_the_category_list(', ') ); ?></p>
                  <p class="excerpt">
                    <?php
                      $raw_excerpt = get_the_excerpt();
                      $custom_excerpt = wp_trim_words( $raw_excerpt, 42, '(...)' );
                      echo $custom_excerpt;
                    ?>
                  </p>
                </div>
                <div class="btn-holder label-btn mx-auto">
                  <div class="btn btn-dark-3 dark-hover-border-2">
                    <span>Open Project</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
    <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo '<p>No projects found in Featured.</p>';
      endif;
    ?>
  </div>
  
  <!-- Other Projects (Non-Featured) pogrupowane według kategorii -->
  <?php
    // Pobierz kategorie przypisane do postów typu "project"
    $categories = get_categories( array(
      'taxonomy'    => 'category',
      'hide_empty'  => true,
      'object_type' => array( 'project' )
    ) );

    // Definiujemy preferowaną kolejność
    $desired_order = array( 'digital', 'branding', 'motion', '3d' );

    // Sortujemy tablicę kategorii
    usort( $categories, function( $a, $b ) use ( $desired_order ) {
        $posA = array_search( $a->slug, $desired_order );
        $posB = array_search( $b->slug, $desired_order );
        // Jeśli jakaś kategoria nie występuje w liście, umieszczamy ją na końcu
        if ( $posA === false ) {
            $posA = count( $desired_order );
        }
        if ( $posB === false ) {
            $posB = count( $desired_order );
        }
        return $posA - $posB;
    } );

    foreach ( $categories as $category ) :
      // Zapytanie tylko o projekty, które nie są featured
      $other_args = array(
        'post_type'      => 'project',
        'cat'            => $category->term_id,
        'posts_per_page' => -1,
        'meta_query'     => array(
          'relation' => 'OR',
          array(
            'key'     => '_artzy_featured',
            'value'   => '1',
            'compare' => '!='
          ),
          array(
            'key'     => '_artzy_featured',
            'compare' => 'NOT EXISTS'
          )
        )
      );
      $project_query = new WP_Query( $other_args );
      if ( $project_query->have_posts() ) : 
  ?>
      <h2><?php echo esc_html( $category->slug ); ?> Projects</h2>
      <div class="portfolio-category section-space">
        <div class="portfolio-section mb-5">
          <?php
            while ( $project_query->have_posts() ) : $project_query->the_post();
          ?>
              <a href="<?php the_permalink(); ?>" class="project-link">
                <div class="project-card animate-on-scroll">
                  <div class="project-image">
                    <?php if ( has_post_thumbnail() ) : ?>
                      <img class="project-img" 
                           src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" 
                           alt="<?php echo esc_attr( wp_strip_all_tags( get_the_excerpt() ) ); ?>">
                    <?php endif; ?>
                    <div class="overlay"></div>
                    <div class="btn-holder">
                      <div class="btn btn-dark-3 dark-hover-border-2">
                        <span>Open Project</span>
                      </div>
                    </div>
                  </div>
                  <div class="project-label animate-on-scroll">
                    <h3><?php the_title(); ?></h3>
                    <p class="cat"><?php echo strip_tags( get_the_category_list(', ') ); ?></p>
                  </div>
                </div>
              </a>
          <?php
            endwhile;
          ?>
        </div>
      </div>
  <?php 
      endif;
      wp_reset_postdata();
    endforeach;
  ?>
  
</div>

<?php get_footer(); ?>
