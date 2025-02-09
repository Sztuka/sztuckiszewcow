<?php
get_header();

// Pobierz dane kontaktowe (w Customizerze, bo to nadal ustawienia witryny)
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
      <h1><?php the_title(); ?></h1>
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

<!-- Project Detail Start -->
<div class="container mb-5 py-5 project-block">
  <div class="row gx-5">
    <!-- Kolumna z kartami -->
    <div class="col-12 col-md-4 mb-4">
      <div class="details-card mb-4">
        <div>
          <h4>Overview</h4>
          <p><?php echo $overview; ?></p>
        </div>
      </div>
      <div class="details-card mb-4">
        <div>
          <h4>Challenge</h4>
          <p><?php echo $challenge; ?></p>
        </div>
      </div>
      <div class="details-card mb-4">
        <div>
          <h4>Impact & Results</h4>
          <p><?php echo $impact; ?></p>
        </div>
      </div>
    </div>

    <!-- Kolumna z treścią -->
    <div class="col-12 col-md-8">
      <div class="content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
