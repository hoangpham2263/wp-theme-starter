<footer class="bg-[#f5f5f5]">
  <!-- breadcrumbs -->
  <section class="py-1 lg:py-2">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-12 gap-4">
        <div class="col-start-3 col-end-11">
          <?php
          if (function_exists('rank_math_the_breadcrumbs')) {
            rank_math_the_breadcrumbs();
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->
  <?php
  $footer_primary_logo   = get_field('footer_primary_logo', 'option');
  $footer_secondary_logo = get_field('footer_secondary_logo', 'option');
  $footer_logo           = $footer_primary_logo ?: get_field('primary_logo', 'option');
  $footer_address   = get_field('footer_address', 'option') ?: 'Tầng 8, Pearl Plaza, 561 Điện Biên Phủ, Phường 25, Bình Thạnh, TP.HCM';
  $footer_hotline   = get_field('footer_hotline', 'option') ?: '0971 955 144';
  $footer_email     = get_field('footer_email', 'option') ?: 'hello@example.com';
  $footer_links_other_title  = get_field('footer_links_other_title', 'option') ?: 'Liên kết khác';
  $footer_links_other        = get_field('footer_links_other', 'option') ?: array();
  $footer_links_consult_title = get_field('footer_links_consult_title', 'option') ?: 'Yêu cầu tư vấn';
  $footer_links_consult       = get_field('footer_links_consult', 'option') ?: array();
  ?>
  <section class="py-5 lg:py-5">
    <div class="container mx-auto px-4">
      <?php if ($footer_logo) : ?>
      <div class="mb-6">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>">
          <img src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="h-8 w-auto">
        </a>
      </div>
      <?php endif; ?>
      <div class="grid grid-cols-12 gap-4">
        <!-- column 1 -->
        <div class="col-span-12 lg:col-span-2 lg:col-start-3">
          <h3 class="text-secondary-text font-normal uppercase mb-3 tracking-wider">Liên hệ</h3>
          <address class="flex flex-col gap-y-3">
            <span class="text-primary-text font-normal not-italic text-sm"><strong>Địa chỉ:</strong> <?php echo esc_html($footer_address); ?></span>
            <a class="text-primary-text font-normal not-italic text-sm" href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $footer_hotline)); ?>">
              <strong>Hotline:</strong> <span class="text-primary"><?php echo esc_html($footer_hotline); ?></span>
            </a>
            <a class="text-primary-text font-normal not-italic text-sm" href="mailto:<?php echo esc_attr($footer_email); ?>">
              <strong>Email:</strong> <?php echo esc_html($footer_email); ?>
            </a>
          </address>
        </div>
        <!-- column 2 -->
        <div class="col-span-12 lg:col-span-2 lg:col-start-5">
          <h3 class="text-secondary-text font-normal uppercase mb-3 tracking-wider">Dịch vụ</h3>
          <?php
          wp_nav_menu(
            array(
              'menu' => 'Footer service',
              'depth' => 1,
              'container' => 'nav',
              'menu_class' => 'flex flex-col gap-y-3 text-primary-text font-normal not-italic text-sm',
            )
          );
          ?>
        </div>
        <!-- column 3 -->
        <div class="col-span-12 lg:col-span-2 lg:col-start-7">
          <h3 class="text-secondary-text font-normal uppercase mb-3 tracking-wider"><?php echo esc_html($footer_links_other_title); ?></h3>
          <nav class="flex flex-col gap-y-3">
            <?php
            if (is_array($footer_links_other)) {
              foreach ($footer_links_other as $item) {
                $link = is_array($item['link']) ? $item['link'] : array('url' => '', 'title' => '');
                $url = $link['url'] ?? '';
                $title = $link['title'] ?? '';
                if ($url) {
                  echo '<a class="text-primary-text font-normal not-italic text-sm" href="' . esc_url($url) . '">' . esc_html($title ?: $url) . '</a>';
                }
              }
            }
            ?>
          </nav>
        </div>
        <!-- column 4 -->
        <div class="col-span-12 lg:col-span-2 lg:col-start-9">
          <h3 class="text-secondary-text font-normal uppercase mb-3 tracking-wider"><?php echo esc_html($footer_links_consult_title); ?></h3>
          <nav class="flex flex-col gap-y-3">
            <?php
            if (is_array($footer_links_consult)) {
              foreach ($footer_links_consult as $item) {
                $link = is_array($item['link']) ? $item['link'] : array('url' => '', 'title' => '');
                $url = $link['url'] ?? '';
                $title = $link['title'] ?? '';
                if ($url) {
                  echo '<a class="text-primary-text font-normal not-italic text-sm" href="' . esc_url($url) . '">' . esc_html($title ?: $url) . '</a>';
                }
              }
            }
            ?>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <!-- copyright -->
  <?php
  $footer_copyright   = get_field('footer_copyright', 'option') ?: 'Copyright © 2025 - All rights reserved';
  $footer_policy_privacy = get_field('footer_policy_privacy', 'option');
  $footer_policy_terms   = get_field('footer_policy_terms', 'option');
  ?>
  <section class="py-5 lg:py-5">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 lg:col-span-6 lg:col-start-3 lg:col-end-7">
          <p class="text-primary-text font-normal not-italic text-sm"><?php echo esc_html($footer_copyright); ?></p>
        </div>
        <div class="col-span-12 lg:col-span-6 lg:col-start-7 lg:col-end-11">
          <p class="text-primary-text font-normal not-italic text-sm flex flex-row gap-x-2 justify-end">
            <?php if ($footer_policy_privacy) : ?>
              <a href="<?php echo esc_url($footer_policy_privacy); ?>" target="_blank" rel="noopener noreferrer">Chính sách bảo mật</a>
            <?php endif; ?>
            <?php if ($footer_policy_privacy && $footer_policy_terms) : ?>|<?php endif; ?>
            <?php if ($footer_policy_terms) : ?>
              <a href="<?php echo esc_url($footer_policy_terms); ?>" target="_blank" rel="noopener noreferrer">Điều khoản sử dụng</a>
            <?php endif; ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- button social -->
    <?php // get_template_part('template-components/footer-button-social-mobile'); ?>
    <?php // get_template_part('template-components/footer-button-social'); ?>
  <!-- scroll to top -->
  <?php get_template_part('template-components/footer-button-scroll-to-top'); ?>

</footer>

<?php wp_footer(); ?>
</body>

</html>