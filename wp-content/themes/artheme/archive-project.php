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
        <h1>Projects</h1>
        <div class='btn-holder mb-5'>
          <?php if ($email) {
              echo '<a href="mailto:' . esc_attr($email) . '" class="btn btn-dark-3 dark-hover-border-2">' . esc_html($email) . ' <span>Contact Me
            </span> </a>';
          }
          ?>
        </div>
      </div>  
    </div>
  </div>
</div>
<!-- End Hero -->


<div class="scroller">
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

      if ($services->have_posts()) :
        while ($services->have_posts()) : $services->the_post();
          $service_titles[] = get_the_title();
        endwhile;
        wp_reset_postdata();
      endif;

      foreach (array_merge($service_titles, $service_titles) as $title) {
        echo '<li>' . esc_html($title) . '</li>';
      }
      ?>
    </ul>
</div>

<!-- Portfolio Section -->
<div id="portfolio" class="container mb-5 py-5">
  <?php
  // Pobierz wszystkie kategorie przypisane do postów typu "project"
  $categories = get_categories( array(
    'taxonomy'   => 'category', // Jeśli używasz domyślnej taksonomii
    'hide_empty' => true,
    'object_type'=> array( 'project' )
  ) );

  // Iterujemy po każdej kategorii
  foreach ( $categories as $category ) :
    ?>
    <h3><?php echo esc_html( $category->name ); ?></h3>
    <div class="portfolio-category">
      <?php
      // Pobieramy wszystkie posty typu "project" z bieżącej kategorii
      $project_query = new WP_Query( array(
        'post_type'      => 'project',
        'cat'            => $category->term_id,
        'posts_per_page' => -1, // Bez limitu
      ) );
      if ( $project_query->have_posts() ) :
        echo '<div class="portfolio-section mb-5">';
        while ( $project_query->have_posts() ) :
          $project_query->the_post();
          ?>
          <a href="<?php the_permalink(); ?>" class="project-link">
            <div class="project-card">
              <?php if ( has_post_thumbnail() ) : ?>
                <img class="project-img" 
                  src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" 
                  alt="<?php echo esc_attr( wp_strip_all_tags( get_the_excerpt() ) ); ?>">
              <?php endif; ?>
              <!-- Overlay z przyciskiem -->
              <div class="overlay">
                <div class="btn-holder">
                  <div class="btn btn-dark-3 dark-hover-border-2">
                    <span>Open Project</span>
                  </div>
                </div>
              </div>
              <!-- Etykieta projektu -->
              <div class="project-label">
                <h4><?php the_title(); ?></h4>
                <p><?php echo strip_tags( get_the_category_list(', ') ); ?></p>
              </div>
            </div>
          </a>
          <?php
        endwhile;
        echo '</div>'; // koniec .portfolio-section
        wp_reset_postdata();
      else :
        echo '<p>No projects found in this category.</p>';
      endif;
      ?>
    </div>
  <?php endforeach; ?>
</div>


<?php get_footer(); ?>
