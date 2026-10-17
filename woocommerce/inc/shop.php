<?php
// ========== remove breadcrumbs ==========
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
// ========== remove result count ==========
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
// ========== remove woocommerce_catalog_ordering ==========
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_action('woocommerce_before_main_content', 'qhw_woocommerce_before_main_content', 5);
function qhw_woocommerce_before_main_content()
{
    echo '<section class="flex justify-center items-center bg-gray-600 h-[300px]">';
    echo '<h1 class="text-2xl font-bold uppercase">' . get_queried_object()->name . '</h1>';
    echo '</section>';
}

// ========== custom wrapper start ==========
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', 'qhw_woocommerce_wrapper_start', 10);
function qhw_woocommerce_wrapper_start()
{
    echo '<div id="primary" class="content-area">';
    echo '<main id="main" class="site-main woocommerce container px-4 mx-auto pt-24" role="main">';

    // if (function_exists('rank_math_the_breadcrumbs')) {
    //     echo '<div class="mb-10">';
    //     rank_math_the_breadcrumbs();
    //     echo '</div>';
    // }

    if (is_woocommerce() && is_archive() && is_tax()) {
        echo '<div class="grid grid-cols-12 gap-5 mb-10">';
        echo '<div class="col-span-12 lg:col-span-3">';
        do_action('woocommerce_sidebar_custom');
        echo '</div>';
        echo '<div class="flex flex-col col-span-12 lg:col-span-9 lg:rounded-lg lg:border lg:border-gray-200 lg:shadow-md p-0 lg:p-4">';
    }
}
// ========== custom wrapper end ==========
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_after_main_content', 'qhw_woocommerce_wrapper_end', 10);
function qhw_woocommerce_wrapper_end()
{
    if (is_woocommerce() && is_archive() && is_tax()) {
        echo '</div>
        </div>';
    }
    echo '</main>
    </div>';
}

// ========== custom title ==========
remove_action('woocommerce_shop_loop_header', 'woocommerce_product_taxonomy_archive_header', 10);
add_action('woocommerce_shop_loop_header', 'qhw_woocommerce_product_taxonomy_archive_header', 10);
function qhw_woocommerce_product_taxonomy_archive_header()
{
    echo '<div class="flex items-center gap-2 mb-4">
        <h1 class="text-2xl font-bold uppercase text-primary">' . get_queried_object()->name . '</h1>
        <div class="h-1 w-10 bg-primary"></div>
    </div>
    <p class="text-gray-500 mb-4">' . get_queried_object()->description . '</p>';
}

// ========== custom sale flash ==========
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
add_action('woocommerce_before_shop_loop_item_title', 'qhw_woocommerce_show_product_loop_sale_flash', 10);
function qhw_woocommerce_show_product_loop_sale_flash()
{
    echo '<div class="absolute top-0 right-0 z-10">';

    global $product;
    if ($product && $product->is_on_sale()) :
        $regular_price = floatval($product->get_regular_price());
        $sale_price    = floatval($product->get_sale_price());
        if ($regular_price > 0 && $sale_price > 0 && $regular_price > $sale_price) {
            $discount = round((($regular_price - $sale_price) / $regular_price) * 100);
        } else {
            $discount = false;
        }

        echo '<span class="w-10 h-10 absolute top-2 right-2 z-10 flex items-center justify-center rounded-l-full rounded-br-full bg-red-500 text-white text-sm">';
        if ($discount) :
            echo '-' . esc_html($discount) . '%';
        else :
            echo esc_html__('Sale!', 'woocommerce');
        endif;
        echo '</span>';
    endif;

    echo '</div>';
}

// ========== custom pagination ==========
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
add_action('woocommerce_after_main_content', 'qhw_woocommerce_pagination', 9);
function qhw_woocommerce_pagination()
{
    ob_start();
?>
    <div class="col-span-12 mt-5">
        <?php woocommerce_pagination(); ?>
    </div>
    <style>
        .woocommerce-pagination ul {
            display: flex !important;
            justify-content: center;
            align-items: center;
            gap: 8px;
            border: none !important;
        }

        .woocommerce-pagination .page-numbers li {
            border: 1px solid #D9D9D9 !important;
            border-right: 1px solid #D9D9D9 !important;
            margin: 0 !important;
            border-radius: 4px !important;
        }

        .woocommerce-pagination .page-numbers li span,
        .woocommerce-pagination .page-numbers li a {
            color: #999999 !important;
            width: 32px;
            height: 32px;
        }

        .woocommerce-pagination .page-numbers li:hover span,
        .woocommerce-pagination .page-numbers li:hover a {
            background-color: #5227FF !important;
            color: #fff !important;
        }

        .woocommerce-pagination .page-numbers li:has(span.current),
        .woocommerce-pagination .page-numbers li:has(a.current),
        .woocommerce-pagination .page-numbers li:has(span.current) span,
        .woocommerce-pagination .page-numbers li:has(a.current) a {
            background-color: #5227FF !important;
            color: #fff !important;
        }
    </style>
<?php
    echo ob_get_clean();
}
?>
<?php
// ---------- content product ----------
// remove content product
remove_action('woocommerce_shop_loop', 'woocommerce_template_loop_product_link_open', 10);
// remove link
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
// remove price
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
// remove add to cart
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// custom product loop start
add_filter('woocommerce_product_loop_start', function ($html) {
    $html = str_replace(
        ['<ul class="products', '</ul>'],
        ['<div class="grid grid-cols-12 gap-3 md:gap-4"', '</div>'],
        $html
    );
    return $html;
});

// custom product loop start
add_action('woocommerce_before_shop_loop_item', 'qhw_woocommerce_template_wrapper_product', 10);
function qhw_woocommerce_template_wrapper_product()
{
    ob_start();
?>
    <div class="cart flex flex-col h-full shadow-md rounded-lg overflow-hidden border border-gray-200 hover:border-primary transition-all duration-300 bg-[#F5F5F5]">
    <?php
    echo ob_get_clean();
}

// add custom product loop end
add_action('woocommerce_after_shop_loop_item', 'qhw_woocommerce_template_wrapper_product_end', 10);
function qhw_woocommerce_template_wrapper_product_end()
{
    ob_start();
    ?>
    </div>
<?php
    echo ob_get_clean();
}

// add custom product image
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'qhw_woocommerce_template_loop_product_thumbnail', 10);
function qhw_woocommerce_template_loop_product_thumbnail()
{
    ob_start();
?>
    <div class="group w-full h-[240px] md:h-[400px] lg:h-[300px] bg-gray-200 overflow-hidden rounded-lg cursor-pointer relative">
        <img
            src="https://thietkeweb.dev/wp-content/uploads/2025/06/FireShot-Capture-033-Organic-Food-110211.thietkeweb.dev_-scaled.png"
            alt="<?php echo esc_attr(get_the_title()); ?>"
            class="w-full h-full !mb-0 object-cover transform translate-y-0 group-hover:-translate-y-[calc(100%-240px)] md:group-hover:-translate-y-[calc(100%-400px)] lg:group-hover:-translate-y-[calc(100%-300px)] transition-transform duration-[2000ms] linear">
        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="group-hover:bg-black/30 group-hover:opacity-100 opacity-0 absolute top-0 left-0 w-full h-full flex justify-center items-center transition-all duration-300">
            <div class="btn-posnawr flex items-center gap-1 text-white text-sm font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span class="text-sm lg:text-base"><?php echo esc_html('Xem chi tiết'); ?></span>
            </div>
        </a>
    </div>
<?php
    echo ob_get_clean();
}

// add custom product title
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'qhw_woocommerce_template_loop_product_title', 10);
function qhw_woocommerce_template_loop_product_title()
{
    ob_start();
?>
    <div class="flex flex-grow flex-col gap-2 lg:gap-4 p-2 md:p-3 bg-[#F5F5F5]">
        <h2 class="flex flex-grow items-center justify-center font-semibold text-center text-sm md:text-base"><a class="hover:text-primary line-clamp-2" href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title(); ?></a></h2>
        <div class="flex flex-col md:flex-row justify-between gap-2">
            <?php get_template_part('template-components/button-see-reality'); ?>
            <?php get_template_part('template-components/button-add-to-cart'); ?>
        </div>
    </div>
<?php
    echo ob_get_clean();
}
?>