<?php 
// Smart Coupon Toggle for WooCommerce
add_action('woocommerce_checkout_order_review', 'custom_checkcout_coupon_code');
function custom_checkcout_coupon_code()
{
  ob_start();
?>
<div class="bg-primary p-5 rounded-lg text-white mb-7">
  <p class="uppercase font-bold mb-2">Mã giảm giá</p>
  <div>
    <?php
    $query_coup = new WP_Query(array(
      'post_type' => 'shop_coupon',
      'posts_per_page' => -1,
      'post_status' => 'publish',
    ));
    while ($query_coup->have_posts()): $query_coup->the_post();
    ?>
      <div class="flex flex-col gap-2 md:gap-3 border-b border-white/25 mb-3 pb-3 last:mb-0 last:pb-0 last:border-0">
        <div class="grid grid-cols-12 items-center">
          <p class="col-span-12 md:col-span-8 xl:col-span-7 text-sm mb-2 md:mb-0"><?php echo get_the_title(); ?></p>
          <div class="col-span-12 md:col-span-4 xl:col-span-5 flex gap-5 md:gap-10">
            <button class="flex-shrink-0 text-sm h-8 px-4 rounded-full w-28 bg-white text-primary cursor-pointer hover:underline apply-coupon" data-coupon="<?php echo esc_attr(get_the_title()); ?>">Áp dụng</button>
            <button class=" toggle-detail text-sm text-white bg-transparent !cursor-pointer underline">Điều kiện</button>
          </div>
        </div>
        <div class="detail-content text-sm max-h-0 bg-white/15 rounded-lg overflow-hidden transition-[max-height] duration-500 ease-[cubic-bezier(0.4,0,0.2,1)]">
          <div class="detail-inner p-4">
            <?php echo get_the_excerpt(); ?>
          </div>
        </div>
      </div>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>
  </div>
</div>
  <script>
    // Toggle detail
    document.querySelectorAll('.toggle-detail').forEach(function(button) {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        const detail = this.closest('.flex-col').querySelector('.detail-content');
        if (!detail.classList.contains('open')) {
          const inner = detail.querySelector('.detail-inner');
          detail.style.maxHeight = inner.scrollHeight + "px";
          detail.classList.add('open');
        } else {
          detail.style.maxHeight = null;
          detail.classList.remove('open');
        }
      });
    });
    // Apply coupon
    document.querySelectorAll('.apply-coupon').forEach(function(button) {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        var coupon = this.getAttribute('data-coupon');
        var couponForm = document.getElementById('woocommerce-checkout-form-coupon');
        if (couponForm) {
          var input = couponForm.querySelector('input[name="coupon_code"]');
          if (input) {
            input.value = coupon;
            // Nếu muốn tự động submit form:
            var applyBtn = couponForm.querySelector('button[type="submit"], input[type="submit"]');
            if (applyBtn) {
              applyBtn.click();
            }
          }
        }
      });
    });
  </script>
  <script>
    function highlightAppliedCoupon() {
      // Lấy danh sách mã đã áp dụng từ WooCommerce
      var appliedCoupons = [];
      document.querySelectorAll('.woocommerce-remove-coupon').forEach(function(el) {
        var code = el.getAttribute('data-coupon');
        if (code) appliedCoupons.push(code.toLowerCase());
      });

      // Reset trạng thái các nút
      document.querySelectorAll('.apply-coupon').forEach(function(btn) {
        var coupon = btn.getAttribute('data-coupon').toLowerCase();
        if (appliedCoupons.includes(coupon)) {
          btn.textContent = 'Đã áp dụng';
          btn.classList.remove('hover:underline');
          btn.disabled = true;
        } else {
          btn.textContent = 'Áp dụng';
          btn.classList.add('hover:underline');
          btn.disabled = false;
        }
      });
    }

    // Gọi hàm khi trang load và sau khi Ajax update (WooCommerce update lại review)
    document.addEventListener('DOMContentLoaded', highlightAppliedCoupon);
    jQuery(document.body).on('updated_checkout updated_cart applied_coupon removed_coupon', highlightAppliedCoupon);

    // Khi bấm "Áp dụng" thì tự động điền và submit như trước
    document.querySelectorAll('.apply-coupon').forEach(function(button) {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        var coupon = this.getAttribute('data-coupon');
        var couponForm = document.getElementById('woocommerce-checkout-form-coupon');
        if (couponForm) {
          var input = couponForm.querySelector('input[name="coupon_code"]');
          if (input) {
            input.value = coupon;
            var applyBtn = couponForm.querySelector('button[type="submit"], input[type="submit"]');
            if (applyBtn) {
              applyBtn.click();
            }
          }
        }
      });
    });
  </script>
<?php
  $content = ob_get_clean();
  echo $content;
}
?>