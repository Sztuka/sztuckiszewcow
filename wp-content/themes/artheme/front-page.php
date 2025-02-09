<?php

get_header();

$email     = get_theme_mod('contact_email');
$phone     = get_theme_mod('contact_phone');
$whatsapp  = get_theme_mod('contact_whatsapp');
$messenger = get_theme_mod('contact_messenger');
$linkedin  = get_theme_mod('contact_linkedin');
$instagram = get_theme_mod('contact_instagram');

?>


<div id="home" class="container-fluid page-banner">
    <div class="row">
        <div class="col-md-12 parallax-image" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');"></div>
        <div class="overlay-text">
          <?php the_content(); ?>
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





<!-- About Me Section -->
<?php
// Pobieranie strony „About Me” dynamicznie
$about_page = get_page_by_path('about-me'); // lub użyj 'about' jako slug w zależności od URL
if (!$about_page) {
    $about_page = get_page_by_title('About Me'); // Wyszukiwanie po tytule, jeśli slug nie istnieje
}

if ($about_page):
    $about_image = get_the_post_thumbnail_url($about_page->ID, 'large'); // Obraz wyróżniający
    $about_title = $about_page->post_title; // Tytuł strony
    $about_content = apply_filters('the_content', $about_page->post_content); // Treść strony
?>
<div id="about me" class="about-section container mb-5 py-5">
  <div class="row align-items-center">
    <div class="col-md-6">
      <?php if ($about_image): ?>
        <img src="<?php echo esc_url($about_image); ?>" alt="<?php echo esc_attr($about_title); ?>" class="img-fluid rounded">
      <?php endif; ?>
    </div>
    <div class="col-md-6">
      <h3><?php echo esc_html($about_title); ?></h3>
      <div class="about-card">
        <div class="about-content">
          <div class="experience-label">
            <h4><span data-count="11">0</span></h4><p>years of experience</p>
          </div>
          <p><?php echo $about_content; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>



<!-- Portfolio Section -->
<div id="portfolio" class="container mb-5 py-5">
  <h3>Portfolio</h3>  
  <!-- Portfolio Grid -->
  <div class="portfolio-section mb-5">
    <?php
      // Zapytanie pobierające maksymalnie 8 postów typu 'project'
      $args = array(
        'post_type'      => 'project',
        'posts_per_page' => 8,
      );
      $projects = new WP_Query($args);
      if ($projects->have_posts()) :
        while ($projects->have_posts()) : $projects->the_post();
    ?>
      <a href="<?php the_permalink(); ?>" class="project-link">
        <div class="project-card">
          <!-- Obraz projektu -->
          <?php if ( has_post_thumbnail() ) : ?>
            <img class="project-img" 
              src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" 
              alt="<?php echo esc_attr( wp_strip_all_tags( get_the_excerpt() ) ); ?>">
          <?php endif; ?>
          <!-- Overlay, który pojawia się na hover -->
          <div class="overlay">
          </div>
          <div class='btn-holder'>
            <div class="btn btn-dark-3 dark-hover-border-2">
              <span>Open Project</span>
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
        wp_reset_postdata();
      else :
        echo '<p>No projects found.</p>';
      endif;
    ?>
  </div>
  <!-- See More Button – zachowujemy klasy Bootstrapa -->
  <div class="row">
    <div class="btn-holder mx-auto">
      <a href="<?php echo esc_url( get_post_type_archive_link('project') ); ?>" class="btn btn-dark-3 dark-hover-border-2 mx-auto">
        <span>See More</span>
      </a>
    </div>
  </div>   
</div>

<!-- Testimonials Section -->
<div id="testimonials" class="container-fluid testimonials-section mb-5">
  <div class="container relative-testimonial py-5">
    <h3>Testimonials</h3>
    <h4>Here's what my clients and coworkers had to say about me</h4>
    <div class="testimonial-block">
      <?php
        // Zapytanie pobierające wszystkie posty typu 'quote'
        $args = array(
          'post_type'      => 'quote',
          'posts_per_page' => -1,
        );
        $quotes = new WP_Query( $args );
        if( $quotes->have_posts() ) :
          $count = 0;
          while( $quotes->have_posts() ) : $quotes->the_post();
            // Dodajemy klasę active tylko do pierwszego elementu
            $active_class = ( $count === 0 ) ? ' active' : '';
      ?>
            <div class="testimonial-item<?php echo $active_class; ?>">
              <?php the_content(); ?>
            </div>
      <?php
            $count++;
          endwhile;
          wp_reset_postdata();
        else :
          echo '<p>No testimonials found.</p>';
        endif;
      ?>
    </div>
    
    <!-- Obraz dekoracyjny – pobierany z Customizera -->
    <div 
        class="testimonials-me" 
        style="background-image: url('<?php echo esc_url( get_theme_mod( 'testimonial_image' ) ); ?>');">
    </div>
  </div>
</div>



<!-- Services Section -->
<div id="services" class="container mb-5 py-5">
  <h3>Services</h3>
  <div class="row mb-5 services-block" style="background-image: url('<?php echo esc_url( get_theme_mod( 'services_image' ) ); ?>');">
    <?php
    $services_query = new WP_Query(array(
        'post_type' => 'service',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));
    if ($services_query->have_posts()) {
        while ($services_query->have_posts()) {
            $services_query->the_post();
            ?>
            <div class="service-card">
                <div class="owner-bio">
                  <h4><?php the_title(); ?></h4>
                  <p><?php the_content(); ?></p>
                </div>
                <div class='btn-holder'>
                  <a href="mailto:peter@sztuckiszewcow.com" class="btn btn-dark-3 dark-hover-border-2">
                    <span>Contact Me</span>
                  </a>
                </div>
            </div>
            <?php
        }
    }
    wp_reset_postdata();
    ?>
  </div>
</div>



<?php get_footer(); ?>
