<?php
// ---------- Global Variable (ACF Options Page) ----------
add_action('acf/init', function () {
	if (function_exists('acf_add_options_page')) {
		acf_add_options_page([
			'page_title' => 'Global Variable',
			'menu_title' => 'Global Variable',
			'menu_slug'  => 'global-variable',
			'capability' => 'manage_options',
			'icon_url'   => 'dashicons-admin-generic',
            // 'icon_url' => 'https://res.cloudinary.com/dmiohqn36/image/upload/v1756911893/logo-icon_fwwq17.svg',
			'redirect'   => false,
		]);
	}
});

// Mặc định đóng tất cả ACF postbox trên trang Global Variable (tự động, không cần thêm config khi thêm field group mới)
add_action('admin_footer', function () {
	$screen = function_exists('get_current_screen') ? get_current_screen() : null;
	if (!$screen || $screen->id !== 'toplevel_page_global-variable') {
		return;
	}
	?>
	<script>
	(function () {
		function closeGlobalBoxes() {
			var boxes = document.querySelectorAll('#wpbody-content .acf-postbox');
			boxes.forEach(function (box) {
				if (box && !box.classList.contains('closed')) {
					box.classList.add('closed');
					var toggle = box.querySelector('.handlediv');
					if (toggle) toggle.setAttribute('aria-expanded', 'false');
				}
			});
		}
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', closeGlobalBoxes);
		} else {
			closeGlobalBoxes();
		}
		setTimeout(closeGlobalBoxes, 100);
	})();
	</script>
	<?php
}, 20);

// ---------- Register Nav Menu ----------
register_nav_menus(
	[
		'primary' => __('Primary Menu', 'tailpress'),
		'top-nav' => __('Top Nav Menu', 'tailpress'),
		'footer' => __('Footer Menu', 'tailpress'),
	]
);

// ---------- Add Menu ----------
function add_menu()
{
	add_theme_support('menus');
	register_nav_menu('themeLocationOne', 'Theme Footer One');
	register_nav_menu('themeLocationTwo', 'Theme Footer Two');
}
add_action('after_setup_theme', 'add_menu');

// Enable WooCommerce
function enable_woocommerce()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'enable_woocommerce');

// Add theme support for title tag
function qhw_theme_setup() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'qhw_theme_setup');

// ---------- Custom Walker Nav Menu ----------
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<div class=\"sub-menu\">\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "$indent</div>\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$indent = ($depth) ? str_repeat("\t", $depth) : '';
			$classes = empty($item->classes) ? array() : (array) $item->classes;
			$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
			$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

			$output .= $indent . '<div' . $class_names . '>';

			$atts = array();
			$atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
			$atts['target'] = ! empty($item->target)     ? $item->target     : '';
			$atts['rel']    = ! empty($item->xfn)        ? $item->xfn        : '';
			$atts['href']   = ! empty($item->url)        ? $item->url        : '';

			$atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

			$attributes = '';
			foreach ($atts as $attr => $value) {
					if (!empty($value)) {
							$value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
							$attributes .= ' ' . $attr . '="' . $value . '"';
					}
			}

			$title = apply_filters('the_title', $item->title, $item->ID);
			$title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {
			$output .= "</div>\n";
	}
}

// ========== Custom Category Order System ==========
function init_custom_category_order() {
    
    // 1. Thêm field "Order" vào Category forms
    add_action('category_add_form_fields', function() {
        ?>
        <div class="form-field">
            <label for="term_order"><?php _e('Order'); ?></label>
            <input type="number" name="term_order" id="term_order" value="0">
            <p class="description"><?php _e('Set custom order for this category'); ?></p>
        </div>
        <?php
    });

    add_action('category_edit_form_fields', function($term, $taxonomy) {
        $value = get_term_meta($term->term_id, 'term_order', true);
        ?>
        <tr class="form-field">
            <th scope="row"><label for="term_order"><?php _e('Order'); ?></label></th>
            <td>
                <input type="number" name="term_order" id="term_order" value="<?php echo esc_attr($value) ? esc_attr($value) : 0; ?>">
                <p class="description"><?php _e('Set custom order for this category'); ?></p>
            </td>
        </tr>
        <?php
    }, 10, 2);

    // 2. Save field value cho cả form thường và quick edit
    $save_order_function = function($term_id) {
        if (isset($_POST['term_order'])) {
            update_term_meta($term_id, 'term_order', intval($_POST['term_order']));
        }
    };
    
    add_action('created_category', $save_order_function);
    add_action('edited_category', $save_order_function);
    add_action('edit_term', $save_order_function);

    // 3. Custom query order by term_order (with null support)
    add_filter('get_terms', function($terms, $taxonomies, $args) {
        if (!in_array('category', $taxonomies) || empty($terms)) {
            return $terms;
        }
        
        $term_orders = array();
        foreach ($terms as $term) {
            if (!is_object($term) || !isset($term->term_id)) {
                continue;
            }
            
            $order = get_term_meta($term->term_id, 'term_order', true);
            $term_orders[$term->term_id] = ($order !== '' && $order !== false) ? intval($order) : 999999;
        }
        
        usort($terms, function($a, $b) use ($term_orders) {
            if (!is_object($a) || !is_object($b) || !isset($a->term_id) || !isset($b->term_id)) {
                return 0;
            }
            
            $order_a = isset($term_orders[$a->term_id]) ? $term_orders[$a->term_id] : 999999;
            $order_b = isset($term_orders[$b->term_id]) ? $term_orders[$b->term_id] : 999999;
            
            if ($order_a == $order_b) {
                return strcmp($a->name, $b->name);
            }
            
            return $order_a - $order_b;
        });
        
        return $terms;
    }, 10, 3);

    // 4. Thêm cột Order vào admin category list
    add_filter('manage_edit-category_columns', function($columns) {
        $new_columns = array();
        foreach ($columns as $key => $value) {
            $new_columns[$key] = $value;
            if ($key == 'name') {
                $new_columns['term_order'] = __('Order');
            }
        }
        return $new_columns;
    });

    add_filter('manage_category_custom_column', function($content, $column_name, $term_id) {
        if ($column_name == 'term_order') {
            $order = get_term_meta($term_id, 'term_order', true);
            $content = $order !== '' ? $order : '0';
        }
        return $content;
    }, 10, 3);

    // 5. Thêm field Order vào Quick Edit
    add_action('quick_edit_custom_box', function($column_name, $screen, $taxonomy) {
        if ($column_name != 'term_order' || $taxonomy != 'category') {
            return;
        }
        ?>
        <fieldset>
            <div class="inline-edit-col">
                <label>
                    <span class="title"><?php _e('Order'); ?></span>
                    <span class="input-text-wrap">
                        <input type="number" name="term_order" class="ptitle" value="">
                    </span>
                </label>
            </div>
        </fieldset>
        
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('body').on('click', '.editinline', function() {
                var term_id = $(this).closest('tr').attr('id').replace('tag-', '');
                var order_value = $(this).closest('tr').find('.column-term_order').text();
                $('input[name="term_order"]').val(order_value);
            });
        });
        </script>
        <?php
    }, 10, 3);
}
init_custom_category_order();











// ========== Cursor - SEO Page en ==========
// Danh sách slug category (có thể multi-level trong URL)
$exclude_categories_for_redirect = array(
    'website-template',   // parent category slug
    'e-commerce',        // child category slug
    'another-category',  // ví dụ thêm
);

// Hàm redirect tự động sang URL có /en/ nếu chưa có
function redirect_categories_to_en_prefix() {
    global $exclude_categories_for_redirect;

    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    foreach ($exclude_categories_for_redirect as $slug) {
        // Kiểm tra nếu URL có chứa slug category trong bất kỳ cấp nào
        if (preg_match('/(^|\/)' . preg_quote($slug, '/') . '($|\/)/', $request_uri)) {
            // Nếu URL chưa có /en/ ở đầu thì redirect thêm
            if (strpos($request_uri, 'en/') !== 0) {
                wp_redirect(home_url('/en/' . $request_uri), 301);
                exit;
            }
        }
    }
}
add_action('template_redirect', 'redirect_categories_to_en_prefix');


// Thêm rewrite rule để map URL /en/slug (cả đa cấp) về product_cat tương ứng
function add_custom_en_rewrite_rule_for_categories() {
    global $exclude_categories_for_redirect;

    foreach ($exclude_categories_for_redirect as $slug) {
        // Cho phép slug + các sub slug sau nó (/a/b...) có dấu hỏi ở cuối cho optional
        add_rewrite_rule(
            '^en/' . preg_quote($slug, '/') . '(/.*)?/?$',
            'index.php?product_cat=' . $slug . '&lang=en',
            'top'
        );
    }
}
add_action('init', 'add_custom_en_rewrite_rule_for_categories');


// Đăng ký biến query lang để phân biệt URL ngôn ngữ
function add_query_vars_filter($vars) {
    $vars[] = 'lang';
    return $vars;
}
add_filter('query_vars', 'add_query_vars_filter');


// Chặn Polylang redirect tiếng Việt nếu URL nằm trong danh sách exclude
function prevent_polylang_redirect_for_custom_categories($redirect_url, $requested_url) {
    global $exclude_categories_for_redirect;

    if (function_exists('pll_current_language') && pll_current_language() === 'en') {
        $parsed_url = wp_parse_url($requested_url);
        $path = trim($parsed_url['path'], '/');
        $path_parts = explode('/', $path);

        // Nếu trong bất kỳ phần nào của path có slug cần exclude
        foreach ($exclude_categories_for_redirect as $slug) {
            if (in_array($slug, $path_parts)) {
                return false; // Chặn redirect
            }
        }
    }

    return $redirect_url;
}
add_filter('pll_get_redirect_url', 'prevent_polylang_redirect_for_custom_categories', 10, 2);


// Giữ ngôn ngữ Polylang là tiếng Anh khi có biến lang=en trong URL
function custom_polylang_force_en_language() {
    if (get_query_var('lang') === 'en') {
        add_filter('locale', function($locale) {
            return 'en_US';
        }, 20);
        // Nếu cần thêm hook của Polylang để thiết lập ngôn ngữ, thêm ở đây
    }
}
add_action('template_redirect', 'custom_polylang_force_en_language');

?>