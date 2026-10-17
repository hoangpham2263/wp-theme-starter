<?php
// ---------- config tailwind css ----------
function theme_enqueue_styles()
{
  wp_enqueue_style('theme-styles', get_template_directory_uri() . '/css/app.css', array(), filemtime(get_template_directory() . '/css/app.css'));
  wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/resources/js/app.js', array('jquery'), filemtime(get_template_directory() . '/resources/js/app.js'), true);
  wp_enqueue_script('toastify-script', 'https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.js', array(), '1.0.0', true);
  wp_enqueue_style('toastify-style', 'https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.css', array(), '1.0.0');
  wp_enqueue_script('custom-toastify', get_template_directory_uri() . '/resources/js/toastify.js', array('toastify-script'), filemtime(get_template_directory() . '/resources/js/toastify.js'), true);

  // ---------- Font Awesome ----------
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css', array(), '1.0.0');

  // ---------- Swiper ----------
  // wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '1.0.0');
  // wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '1.0.0', true);

  // ---------- Animation AOS ----------
  // wp_enqueue_style('animation-aos-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1');
  // wp_enqueue_script('animation-aos-script', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// ---------- Initialize AOS in footer ----------
add_action('wp_footer', function () {
?>
  <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      AOS.init({
        duration: 800,
        once: true,
        offset: 100
      });
    });
  </script> -->
<?php
});

// ---------- For editor styles ----------
function theme_add_editor_styles()
{
  add_editor_style('css/editor-style.css');
}
add_action('admin_init', 'theme_add_editor_styles');