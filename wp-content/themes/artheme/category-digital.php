<?php
get_header();
$email     = get_theme_mod('contact_email');
$phone     = get_theme_mod('contact_phone');
$whatsapp  = get_theme_mod('contact_whatsapp');
$messenger = get_theme_mod('contact_messenger');
$linkedin  = get_theme_mod('contact_linkedin');
$instagram = get_theme_mod('contact_instagram');
// Pobierz kategorię "Digital" – zakładamy, że slug kategorii to "digital"
$current_cat = get_queried_object();
$current_cat_id = $current_cat->term_id;
// Pobierz slug bieżącej kategorii
$cat_slug = $current_cat->slug;
?>

<!-- Start Hero -->
<div class="container-fluid project-banner">
  <div class="banner-wrapper">
    <div class="banner-image" style="background-image: url('<?php echo esc_url( get_theme_mod( 'services_image' ) ); ?>');"></div>
    <div class="overlay-text">
      <div class="project-title">
        <h1><?php single_cat_title(); ?> Projects</h1>
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

<!-- Scroller z nazwą kategorii -->
<div class="scroller section-space">
  <ul class="tag-list scroller_inner">
    <?php
        // Pobierz nazwę bieżącej kategorii przy pomocy single_cat_title()
        $category_name = single_cat_title("", false);
        // Powtórz nazwę kategorii 20 razy – możesz dostosować liczbę iteracji
        for ( $i = 0; $i < 20; $i++ ) {
          echo '<li>' . esc_html( $category_name ) . '</li>';
        }
      ?>
  </ul>
</div>

<!-- Portfolio Section -->
<div id="digital-portfolio" class="container section-space py-5">
  <!-- Featured Projects: Case Studies -->
  <h2>Case Studies</h2>
  <div class="featured-section section-space">
    <?php
      $featured_args = array(
        'post_type'      => 'project',
        'posts_per_page' => 4,
        'meta_query'     => array(
          array(
            'key'     => '_artzy_featured',
            'value'   => '1',
            'compare' => '='
          )
        ),
        'cat'            => $current_cat_id,
      );
      $featured_projects = new WP_Query($featured_args);
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
  
  <!-- Other Digital Projects -->
  <h2>Other <?php echo esc_html( $cat_slug ); ?> Projects</h2>
  <div class="portfolio-section mb-5">
    <?php
      $other_args = array(
        'post_type'      => 'project',
        'posts_per_page' => 8,
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
        ),
        'cat'            => $current_cat_id,
      );
      $other_projects = new WP_Query($other_args);
      if ( $other_projects->have_posts() ) :
        while ( $other_projects->have_posts() ) : $other_projects->the_post();
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
        echo '<p>No projects found in Other Projects.</p>';
      endif;
    ?>
  </div>
  
  <!-- See More Button -->
  <div class="row">
    <div class="btn-holder mx-auto">
      <a href="<?php echo esc_url( get_post_type_archive_link('project') ); ?>" class="btn btn-dark-3 dark-hover-border-2 mx-auto">
        <span>All Projects</span>
      </a>
    </div>
  </div>
</div>

<?php get_footer(); ?>


