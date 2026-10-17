<?php
// ---------- remove sidebar ----------
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// ---------- add custom sidebar ----------
add_action('woocommerce_sidebar_custom', 'custom_woocommerce_sidebar', 10);

function custom_woocommerce_sidebar()
{
  // Lấy category cha 'mau-website'
  $current_language = pll_current_language();
  if ($current_language == 'en') {
    $parent_category = get_term_by('slug', 'website-template', 'product_cat');
  } else {
    $parent_category = get_term_by('slug', 'mau-website', 'product_cat');
  }

  if ($parent_category && !is_wp_error($parent_category)) {
    // Lấy các subcategories của category cha
    $terms = get_terms([
      'taxonomy'   => 'product_cat',
      'hide_empty' => false,
      // 'parent'     => $parent_category->term_id,
      'orderby'    => 'menu_order',
    ]);
  } else {
    $terms = [];
  }

  echo '<aside class="woocommerce-sidebar rounded-lg border border-gray-200 shadow-md">';
  echo '<h2 class="text-lg font-medium uppercase bg-primary text-white p-4 rounded-t-lg">' . ($current_language == 'en' ? 'Product Category' : 'Danh mục sản phẩm') . '</h2>';

  if (!is_wp_error($terms)) {
    echo '<div class="space-y-3 md:space-y-4 p-3 md:p-4">';
    foreach ($terms as $term) {
      $term_link = get_term_link($term);
      $current_term = get_queried_object();
      $is_current = ($current_term && $current_term->term_id === $term->term_id);

      echo '<div class="flex items-center justify-between gap-2">';
      echo '<a href="' . esc_url($term_link) . '" class="flex items-center gap-2">';
      echo '<h3 class="text-sm md:text-base font-medium hover:text-primary transition-all duration-300 ' . ($is_current ? 'text-primary' : 'text-gray-900') . '" style="' . ($is_current ? 'display: list-item; list-style-type: disclosure-closed; margin-left: 20px;' : '') . '">' . esc_html($term->name) . '</h3>';
      echo '</a>';
      echo '<span class="text-gray-500 text-sm md:text-base font-mono font-normal">(' . $term->count . ')</span>';
      echo '</div>';
    }
    echo '</div>';
  }

  echo '</aside>';
}
