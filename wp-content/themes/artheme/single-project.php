<?php

get_header();

$contact_email = get_field('contact_email');
?>

    <!-- Start Hero -->
    <div id="home" class="container-fluid project-banner">
      <div class="row">
        <div class="col-md-12 parallax-image" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');"></div>
          <div class="overlay-text">
            <h1><?php the_title(); ?></h1>
              <div class='btn-holder mb-5'>
                <a href="mailto:<?php echo esc_attr($contact_email); ?>" class="btn btn-dark-3 dark-hover-border-2">
                  <span>Contact Me
                  </span> 
                </a>
              </div>
          </div>  
        </div>
      </div>
    <!-- End Hero -->

    <!-- Project Detail Start -->
<div class="container mb-5 py-5">
  <div class="row gx-5">
    <!-- Kolumna z kartami -->
    <div class="col-12 col-md-4 mb-4">
      <div class="details-card mb-4">
        <div>
          <h4>customer</h4>
          <p><?php echo get_field('customer'); ?></p>
        </div>
      </div>
      <div class="details-card mb-4">
        <div>
          <h4>responsibilities</h4>
          <p><?php echo get_field('responsibilities'); ?></p>
        </div>
      </div>
      <div class="details-card mb-4">
        <div>
          <h4>brief</h4>
          <p><?php echo get_field('brief_description'); ?></p>
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