<?php
/**
 * Custom Product Swiper Template
 * Usage: get_template_part('template-parts/loop-product-swiper');
 */

// Thiết lập WP_Query để lấy sản phẩm
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 12, // Lấy 12 sản phẩm
    'post_status' => 'publish',
    // 'meta_query' => array(
    //     array(
    //         'key' => '_visibility',
    //         'value' => array('catalog', 'visible'),
    //         'compare' => 'IN'
    //     )
    // )
);

$products_query = new WP_Query($args);

if ($products_query->have_posts()) :
?>
<section class="custom-products-swiper my-8">
    <div class="container mx-auto">
        <!-- <h2 class="text-xl md:text-2xl uppercase text-btn-primary font-semibold mb-4 md:mb-6 flex items-center gap-2">
            <?php _e('Giao diện nổi bật', 'woocommerce'); ?>
            <div class="h-1 w-10 bg-btn-primary"></div>
        </h2> -->

        <div class="swiper custom-products-slider">
            <div class="swiper-wrapper">
                <?php while ($products_query->have_posts()) : $products_query->the_post(); 
                    global $post;
                    $product_id = get_the_ID();
                    
                    // Lấy thông tin sản phẩm trực tiếp
                    $product_title = get_the_title();
                    $product_permalink = get_permalink();
                    $product_image = get_the_post_thumbnail($product_id, 'woocommerce_thumbnail');
                    
                    // Lấy giá sản phẩm
                    $regular_price = get_post_meta($product_id, '_regular_price', true);
                    $sale_price = get_post_meta($product_id, '_sale_price', true);
                    
                    // Kiểm tra sản phẩm có sale không
                    $is_on_sale = !empty($sale_price) && $sale_price < $regular_price;
                    
                    // Tính phần trăm giảm giá
                    $discount_percent = 0;
                    if ($is_on_sale && $regular_price > 0) {
                        $discount_percent = round((($regular_price - $sale_price) / $regular_price) * 100);
                    }
                    
                    // Lấy ảnh sản phẩm URL
                    $image_id = get_post_thumbnail_id($product_id);
                    // $image_url = wp_get_attachment_image_url($image_id, 'full');
                    // if (!$image_url) {
                        $image_url = 'https://thietkeweb.dev/wp-content/uploads/2025/06/FireShot-Capture-033-Organic-Food-110211.thietkeweb.dev_-scaled.png';
                    // }
                ?>
                    <div class="swiper-slide">
                        <div class="cart flex flex-col h-full shadow-md rounded-lg overflow-hidden border border-gray-200 hover:border-btn-primary transition-all duration-300 bg-[#F5F5F5]">
                            
                            <!-- Sale Flash -->
                            <?php if ($is_on_sale) : ?>
                            <div class="absolute top-0 right-0 z-10">
                                <span class="w-10 h-10 absolute top-2 right-2 z-10 flex items-center justify-center rounded-l-full rounded-br-full bg-red-500 text-white text-sm">
                                    -<?php echo esc_html($discount_percent); ?>%
                                </span>
                            </div>
                            <?php endif; ?>

                            <!-- Product Image -->
                            <div class="group w-full h-[240px] md:h-[400px] lg:h-[300px] bg-gray-200 overflow-hidden rounded-lg cursor-pointer relative">
                                <img 
                                    src="<?php echo esc_url($image_url); ?>"
                                    alt="<?php echo esc_attr($product_title); ?>"
                                    class="w-full !mb-0 object-cover transform translate-y-0 group-hover:-translate-y-[calc(100%-240px)] md:group-hover:-translate-y-[calc(100%-400px)] lg:group-hover:-translate-y-[calc(100%-300px)] transition-transform duration-[2000ms] linear"
                                >
                                <a href="<?php echo esc_url($product_permalink); ?>" class="group-hover:bg-black/30 group-hover:opacity-100 opacity-0 absolute top-0 left-0 w-full h-full flex justify-center items-center transition-all duration-300">
                                    <div class="btn-posnawr flex items-center gap-1 text-white text-sm font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        <span class="text-sm lg:text-base"><?php echo esc_html('Xem chi tiết'); ?></span>
                                    </div>
                                </a>
                            </div>

                            <!-- Product Info -->
                            <div class="flex flex-grow flex-col gap-2 lg:gap-4 p-2 md:p-3 bg-[#F5F5F5]">
                                <h2 class="flex flex-grow items-center justify-center font-semibold text-center text-sm md:text-base">
                                    <a class="hover:text-btn-primary line-clamp-2" href="<?php echo esc_url($product_permalink); ?>">
                                        <?php echo esc_html($product_title); ?>
                                    </a>
                                </h2>
                                <div class="flex flex-col md:flex-row justify-between gap-2">
                                    <!-- View Reality Button -->
                                    <?php get_template_part('template-components/button-see-reality'); ?>
                                    
                                    <!-- Add to Cart Button -->
                                    <?php get_template_part('template-components/button-add-to-cart'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- <div class="swiper-button-next custom-products-next"></div>
            <div class="swiper-button-prev custom-products-prev"></div>
            <div class="swiper-pagination custom-products-pagination mt-6"></div> -->
        </div>
    </div>
</section>

<style>
    .custom-products-swiper {
        position: relative;
        --mask-offset: 1rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        will-change: transform;
    }

    .custom-products-slider {
        width: 100%;
        padding-bottom: 40px;
        position: relative;
        overflow: hidden;
    }

    @media (max-width: 1024px) {
        .custom-products-slider {
            padding-bottom: 60px !important;
        }
    }

    @media (max-width: 768px) {
        .custom-products-slider {
            padding-bottom: 50px !important;
        }
    }

    /* .custom-products-slider::before,
    .custom-products-slider::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 40px;
        width: var(--mask-offset);
        z-index: 10;
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        will-change: opacity;
    } */

    /* breakpoint > 1024px */
    @media (min-width: 1024px) {
        .custom-products-slider::before {
            left: 0;
            background: linear-gradient(90deg,
                rgba(255, 255, 255, 1) 0%,
                rgba(255, 255, 255, 0.8) 30%,
                rgba(255, 255, 255, 0) 100%);
        }

        .custom-products-slider::after {
            right: 0;
            background: linear-gradient(90deg,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.8) 70%,
                rgba(255, 255, 255, 1) 100%);
        }
    }

    .custom-products-slider .swiper-slide {
        height: auto;
        display: flex;
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1),
            opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        will-change: transform, opacity;
    }

    .custom-products-slider .swiper-slide>div {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        will-change: transform;
    }

    @media (hover: hover) and (pointer: fine) {
        .custom-products-swiper:hover .custom-products-slider::before,
        .custom-products-swiper:hover .custom-products-slider::after {
            opacity: 1;
        }
    }

    @media (hover: none) {
        .custom-products-swiper.touch-active .custom-products-slider::before,
        .custom-products-swiper.touch-active .custom-products-slider::after {
            opacity: 1;
        }

        .custom-products-swiper.touch-active .swiper-slide:first-child,
        .custom-products-swiper.touch-active .swiper-slide:last-child {
            transform: scale(0.98);
            opacity: 0.7;
        }
    }

    .custom-products-slider.swiper-transitioning .swiper-slide {
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1),
            opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Navigation buttons */
    @media (min-width: 1024px) {
        .custom-products-next,
        .custom-products-prev {
            opacity: 0;
            visibility: hidden;
            background: rgba(0, 0, 0, 0.3);
            color: white;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%) scale(0.8);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    }

    /* breakpoint < 1024px */
    @media (max-width: 1024px) {
        .custom-products-prev {
            left: 0 !important;
        }

        .custom-products-next {
            left: 54px !important;
        }

        .custom-products-next,
        .custom-products-prev {
            opacity: 0;
            visibility: hidden;
            background: rgba(0, 0, 0, 0.3);
            color: white;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            bottom: 0 !important;
            top: unset !important;
            pointer-events: none;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    }

    @media (max-width: 768px) {
        .custom-products-prev {
            left: 0 !important;
        }

        .custom-products-next {
            left: 46px !important;
        }

        .custom-products-next,
        .custom-products-prev {
            width: 38px;
            height: 38px;
        }
    }

    .custom-products-next:after,
    .custom-products-prev:after {
        font-size: 16px;
        font-weight: bold;
    }

    /* breakpoint > 1024px */
    @media (min-width: 1024px) {
        .custom-products-swiper:hover .custom-products-next,
        .custom-products-swiper:hover .custom-products-prev {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: translateY(-50%) scale(1);
        }
    }

    /* breakpoint < 1024px */
    @media (max-width: 1024px) {
        .custom-products-swiper .custom-products-next,
        .custom-products-swiper .custom-products-prev {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: translateY(0) scale(1);
        }
    }

    @media (min-width: 1024px) {
        .custom-products-next:hover,
        .custom-products-prev:hover {
            background: rgba(0, 0, 0, 0.8);
            color: rgba(255, 255, 255, 1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }
    }

    /* Pagination */
    .custom-products-pagination .swiper-pagination-bullet {
        background: #ccc;
        opacity: 1;
    }

    .custom-products-pagination .swiper-pagination-bullet-active {
        background: #007cba;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .custom-products-swiper {
            --mask-offset: 1rem;
        }
    }

    /* Price styling */
    .price-wrapper {
        margin: 8px 0;
    }
    
    .sale-price {
        font-size: 16px;
    }
    
    .regular-price {
        font-size: 14px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const customProductsSwiper = new Swiper('.custom-products-slider', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            speed: 600,
            slidesPerView: 2,
            spaceBetween: 10,
            grid: {
                rows: 2,
                fill: 'row',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 10
                },
                1280: {
                    slidesPerView: 5,
                    spaceBetween: 10
                }
            },
            pagination: {
                el: '.custom-products-pagination',
                clickable: true,
                dynamicBullets: true
            },
            navigation: {
                nextEl: '.custom-products-next',
                prevEl: '.custom-products-prev',
            },
            grabCursor: true,
            autoHeight: false,
            lazy: {
                loadPrevNext: true,
            },
            a11y: {
                prevSlideMessage: 'Previous product',
                nextSlideMessage: 'Next product',
            },
            effect: 'slide',
            watchSlidesProgress: true,
            on: {
                slideChangeTransitionStart: function() {
                    this.el.classList.add('swiper-transitioning');
                },
                slideChangeTransitionEnd: function() {
                    this.el.classList.remove('swiper-transitioning');
                }
            }
        });

        const swiperContainer = document.querySelector('.custom-products-swiper');

        if (swiperContainer) {
            // mouse events for desktop check breakpoint 1024px
            if (window.innerWidth > 1024) {
                swiperContainer.addEventListener('mouseenter', function() {
                    this.classList.add('hover-active');
                    setTimeout(() => {
                        this.style.setProperty('--mask-offset', '1rem');
                    }, 50);
                });

                swiperContainer.addEventListener('mouseleave', function() {
                    this.classList.remove('hover-active');
                    this.style.setProperty('--mask-offset', '1rem');
                });
            }
            if (window.innerWidth < 1024) {
                // touch events for mobile
                swiperContainer.addEventListener('touchstart', function() {
                    this.classList.add('touch-active');
                    this.style.setProperty('--mask-offset', '1rem');
                });

                swiperContainer.addEventListener('touchend', function() {
                    setTimeout(() => {
                        this.classList.remove('touch-active');
                        this.style.setProperty('--mask-offset', '1rem');
                    }, 400);
                });
            }
        }
    });
</script>

<?php
    wp_reset_postdata();
endif;
?>