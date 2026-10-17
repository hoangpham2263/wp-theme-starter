<?php
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_after_single_product_summary', 'hozi_woocommerce_output_related_products', 20);

function hozi_woocommerce_output_related_products()
{
  global $product;

  if (!$product) {
    return;
  }

  $related_products_ids = wc_get_related_products($product->get_id(), 8);

  if (empty($related_products_ids)) {
    return;
  }

  $related_products = array_filter(array_map('wc_get_product', $related_products_ids), 'wc_products_array_filter_visible');

  if (empty($related_products)) {
    return;
  }

  ob_start();
?>
  <section class="related-products-swiper my-8">
    <div class="container mx-auto">
      <h2 class="text-xl md:text-2xl uppercase text-primary font-semibold mb-4 md:mb-6 flex items-center gap-2">
        <?php _e('Giao diện liên quan', 'woocommerce'); ?>
        <div class="h-1 w-10 bg-primary"></div>
      </h2>

      <div class="swiper related-products-slider">
        <div class="swiper-wrapper">
          <?php foreach ($related_products as $related_product) : ?>
            <div class="swiper-slide">
              <?php
              $post_object = get_post($related_product->get_id());
              setup_postdata($GLOBALS['post'] = $post_object);
              wc_get_template_part('content', 'product');
              ?>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="swiper-button-next related-products-next"></div>
        <div class="swiper-button-prev related-products-prev"></div>
        <div class="swiper-pagination related-products-pagination mt-6"></div>
      </div>
    </div>
  </section>

  <style>
    .related-products-swiper {
      position: relative;
      --mask-offset: 1rem;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      will-change: transform;
    }

    .related-products-slider {
      width: 100%;
      padding-bottom: 40px;
      position: relative;
      overflow: hidden;
    }

    @media (max-width: 1024px) {
      .related-products-slider {
        padding-bottom: 60px !important;
      }
    }

    @media (max-width: 768px) {
      .related-products-slider {
        padding-bottom: 50px !important;
      }
    }

    .related-products-slider::before,
    .related-products-slider::after {
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
    }

    /* breakpoint > 1024px */
    @media (min-width: 1024px) {
      .related-products-slider::before {
        left: 0;
        background: linear-gradient(90deg,
            rgba(255, 255, 255, 1) 0%,
            rgba(255, 255, 255, 0.8) 30%,
            rgba(255, 255, 255, 0) 100%);
      }

      .related-products-slider::after {
        right: 0;
        background: linear-gradient(90deg,
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 0.8) 70%,
            rgba(255, 255, 255, 1) 100%);
      }
    }

    .related-products-slider .swiper-slide {
      height: auto;
      display: flex;
      transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1),
        opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      will-change: transform, opacity;
    }

    .related-products-slider .swiper-slide>div {
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      will-change: transform;
    }

    @media (hover: hover) and (pointer: fine) {

      .related-products-swiper:hover .related-products-slider::before,
      .related-products-swiper:hover .related-products-slider::after {
        opacity: 1;
      }
    }

    @media (hover: none) {

      .related-products-swiper.touch-active .related-products-slider::before,
      .related-products-swiper.touch-active .related-products-slider::after {
        opacity: 1;
      }

      .related-products-swiper.touch-active .swiper-slide:first-child,
      .related-products-swiper.touch-active .swiper-slide:last-child {
        transform: scale(0.98);
        opacity: 0.7;
      }
    }

    .related-products-slider.swiper-transitioning .swiper-slide {
      transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1),
        opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Navigation buttons */
    @media (min-width: 1024px) {

      .related-products-next,
      .related-products-prev {
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
      .related-products-prev {
        left: 0 !important;
      }

      .related-products-next {
        left: 54px !important;
      }


      .related-products-next,
      .related-products-prev {
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
      .related-products-prev {
        left: 0 !important;
      }

      .related-products-next {
        left: 46px !important;
      }

      .related-products-next,
      .related-products-prev {
        width: 38px;
        height: 38px;
      }
    }

    .related-products-next:after,
    .related-products-prev:after {
      font-size: 16px;
      font-weight: bold;
    }

    /* breakpoint > 1024px */
    @media (min-width: 1024px) {

      .related-products-swiper:hover .related-products-next,
      .related-products-swiper:hover .related-products-prev {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
        transform: translateY(-50%) scale(1);
      }
    }

    /* breakpoint < 1024px */
    @media (max-width: 1024px) {

      .related-products-swiper .related-products-next,
      .related-products-swiper .related-products-prev {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
        transform: translateY(0) scale(1);
      }
    }

    @media (min-width: 1024px) {

      .related-products-next:hover,
      .related-products-prev:hover {
        background: rgba(0, 0, 0, 0.8);
        color: rgba(255, 255, 255, 1);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      }
    }

    /* Pagination */
    .related-products-pagination .swiper-pagination-bullet {
      background: #ccc;
      opacity: 1;
    }

    .related-products-pagination .swiper-pagination-bullet-active {
      background: #007cba;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .related-products-swiper {
        --mask-offset: 1rem;
      }
    }

    /* @media (max-width: 640px) {

      .related-products-next,
      .related-products-prev {
        display: none;
      }

      .related-products-swiper {
        --mask-offset: 1rem;
      }
    } */
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const relatedProductsSwiper = new Swiper('.related-products-slider', {
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        speed: 600,
        slidesPerView: 2,
        spaceBetween: 10,
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
          el: '.related-products-pagination',
          clickable: true,
          dynamicBullets: true
        },
        navigation: {
          nextEl: '.related-products-next',
          prevEl: '.related-products-prev',
        },
        grabCursor: true,
        autoHeight: false,
        lazy: {
          loadPrevNext: true,
        },
        a11y: {
          prevSlideMessage: 'Previous related product',
          nextSlideMessage: 'Next related product',
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

      const swiperContainer = document.querySelector('.related-products-swiper');

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
  echo ob_get_clean();
}
?>