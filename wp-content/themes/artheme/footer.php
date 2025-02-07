<!-- Footer -->
 <?php
// Pobieranie strony "Contact" dynamicznie
$contact_page = get_page_by_path('contact');
if (!$contact_page) {
    $contact_page = get_page_by_title('Contact');
}
if ($contact_page):
    $contact_image   = get_the_post_thumbnail_url($contact_page->ID, 'large');
    $contact_title   = $contact_page->post_title;
    $contact_content = apply_filters('the_content', $contact_page->post_content);
?>
<div id="contact" class="contact-section container py-5">
  <div class="row align-items-center">
    <!-- Kolumna z obrazem (opcjonalnie) -->
    <?php if ($contact_image): ?>
    <div class="col-md-6 d-flex vr-me">
      <img src="<?php echo esc_url($contact_image); ?>" alt="<?php echo esc_attr($contact_title); ?>" class="img-fluid rounded">
    </div>
    <?php endif; ?>
    <!-- Kolumna z treścią -->
    <div class="col-md-6">
      <h3><?php echo esc_html($contact_title); ?></h3>
      <div class="contact-card">
        <?php echo $contact_content; ?>
      </div>
      <!-- Menu Social jako social icons -->
      <div class="social-icons">
        <?php
          wp_nav_menu(array(
              'theme_location' => 'social-menu',
              'container'      => false,
              'menu_class'     => 'list-inline',
              'fallback_cb'    => false,
          ));
        ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<footer class="footer bg-label-dark text-white pt-5">

  <div class="container">
    <!-- Logo and Contact Info -->
    <div class="row">
      <div class="col-md-6 d-flex align-items-center footer-content">
        
        <div class="contact-info pl-5">
          <p>
            <a href="tel:<?php the_field('phone'); ?>"><?php the_field('phone'); ?></a><br>
            <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- Copyright Stripe -->
  <div class="footer-copyright bg-label-dark text-center pb-3 pt-4">
    &copy; <?php echo date("Y"); ?> Piotr Sztucki-Szewców. All rights reserved.
  </div>
</footer>

<?php wp_footer() ?>

</body>
</html>
