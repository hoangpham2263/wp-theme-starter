<?php
/**
 * Theme functions and definitions
 */

// Core
require_once get_template_directory() . '/inc/core/assets.php';
require_once get_template_directory() . '/inc/core/setup.php';
require_once get_template_directory() . '/inc/core/helpers.php';
// require_once get_template_directory() . '/inc/core/custom-post-types.php';

// Fields (mỗi file đăng ký 1 field group riêng)
require_once get_template_directory() . '/inc/fields/global-header.php';
require_once get_template_directory() . '/inc/fields/global-pre.php';
require_once get_template_directory() . '/inc/fields/global-footer.php';

// Common
// require_once get_template_directory() . '/inc/common/func-standard.php';

// Shortcodes
// require_once get_template_directory() . '/inc/shortcodes/sc_polylang.php';
// require_once get_template_directory() . '/inc/shortcodes/sc_search-global-icon.php';
