<?php
get_header();

// Pobierz dane kontaktowe (z Customizera)
$email = get_theme_mod('contact_email');

// Pobierz dane projektu zapisane w meta (z meta boxów)
$overview  = get_post_meta( get_the_ID(), 'overview', true );
$challenge = get_post_meta( get_the_ID(), 'challenge', true );
$impact    = get_post_meta( get_the_ID(), 'impact', true );
?>

<!-- Start Hero -->
<div class="container-fluid project-banner">
  <div class="row">
    <div class="col-md-12 parallax-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>');"></div>
    <div class="overlay-text">
      <div class="project-title">
        <h1><?php the_title(); ?></h1>
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

<div class="scroller">
    <ul class="tag-list scroller_inner">
      <?php
      // Pobierz tytuł bieżącego projektu
      $project_title = get_the_title();
      $repeat_times = 5; // Ustal, ile razy ma się powtórzyć tytuł

      for ( $i = 0; $i < $repeat_times; $i++ ) {
          echo '<li>' . esc_html( $project_title ) . '</li>';
      }
      ?>
    </ul>
</div>


<!-- Project Detail Start -->
<div class="container section-space py-5 project-block">
  <div class="row gx-3 d-flex align-items-stretch mb-5">
    <!-- Kolumna z kartami -->
    <div class="col-12 col-lg-4">
      <div class="details-card h-100">
        <div>
          <h3>Overview</h3>
          <p><?php echo $overview; ?></p>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="details-card h-100">
        <div>
          <h3>Challenge</h3>
          <p><?php echo $challenge; ?></p>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="details-card h-100">
        <div>
          <h3>Impact &amp; Results</h3>
          <p><?php echo $impact; ?></p>
        </div>
      </div>
    </div>
    <!-- Koniec wiersza z kartami -->
  </div>
  
  <!-- Kolumna z treścią -->
  <div class="row">
    <div class="col-12">
      <div class="content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</div>

<div class="container project-navigation d-flex justify-content-between mt-5" role="navigation" aria-label="Project Navigation">
  <div class="prev-project">
    <?php previous_post_link('%link', '<i class="fas fa-arrow-left"></i> Previous Project'); ?>
  </div>
  <div class="next-project">
    <?php next_post_link('%link', 'Next Project <i class="fas fa-arrow-right"></i>'); ?>
  </div>
</div>



<?php get_footer(); ?>
