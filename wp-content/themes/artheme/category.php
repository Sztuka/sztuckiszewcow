<?php get_header(); ?>

<?php 
  // Pobierz bieżący obiekt kategorii
  $current_cat = get_queried_object();
  $current_cat_id = $current_cat->term_id;
  // Pobierz slug bieżącej kategorii
  $cat_slug = $current_cat->slug;
?>

<!-- Start Hero -->
<div class="container-fluid project-banner">
  <div class="banner-wrapper">
    <div class="banner-image" style="background-image: url('<?php echo esc_url( get_theme_mod('services_image') ); ?>');"></div>
    <div class="overlay-text">
      <div class="project-title">
        <h1><?php single_cat_title(); ?> Projects</h1>
      </div>
      <div class="btn-holder mb-5">
        <?php if ( get_theme_mod('contact_email') ) : ?>
          <a href="mailto:<?php echo esc_attr( get_theme_mod('contact_email') ); ?>" class="btn btn-dark-3 dark-hover-border-2">
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
      for ( $i = 0; $i < 20; $i++ ) {
        echo '<li>' . esc_html( $cat_slug ) . '</li>';
      }
    ?>
  </ul>
</div>

<!-- Portfolio Section -->
<div id="portfolio" class="container section-space py-5">
  <h2><?php echo esc_html( $cat_slug ); ?> Projects</h2>
  
  <!-- Nowa pętla pobierająca tylko typ "project" -->
  <div class="portfolio-section mb-5">
    <?php 
      $projects_query = new WP_Query( array(
        'post_type'      => 'project',
        'cat'            => $current_cat_id,
        'posts_per_page' => -1,
      ) );
      if ( $projects_query->have_posts() ) :
        while ( $projects_query->have_posts() ) : $projects_query->the_post();
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
          <div class="project-label animate-on-scroll category-label">
            <h3><?php the_title(); ?></h3>
            <!-- <p class="cat"><?php echo strip_tags( get_the_category_list(', ') ); ?></p> -->
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
  
  <!-- See More Button -->
  <div class="row">
    <div class="btn-holder mx-auto">
      <a href="<?php echo esc_url( get_post_type_archive_link('project') ); ?>" class="btn btn-dark-3 dark-hover-border-2 mx-auto">
        <span>See More</span>
      </a>
    </div>
  </div>
</div>

<?php get_footer(); ?>
