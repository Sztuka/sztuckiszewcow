<!-- Footer -->
<footer class="footer">
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
<div id="contact" class="contact-section py-5 container">
  <div class="container section-space contact-wrapper">
    <?php if ($contact_image): ?>
      <div class="contact-image">
        <img src="<?php echo esc_url($contact_image); ?>" alt="<?php echo esc_attr($contact_title); ?>" class="img-fluid">
      </div>
    <?php endif; ?>
    
    <div class="contact-content">
      <h2><?php echo esc_html($contact_title); ?></h2>
      <div class="contact-card">
        <?php echo $contact_content; ?>
      </div>

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


  <!-- Copyright Stripe -->
  <div class="footer-copyright">
    &copy; <?php echo date("Y"); ?> Piotr Sztucki-Szewców. All rights reserved.
  </div>
</footer>
<?php wp_footer() ?>
</body>
</html>
