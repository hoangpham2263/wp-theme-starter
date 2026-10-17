<button
  class="js-btn-add-to-cart bg-primary text-white py-2 px-2 md:px-4 rounded text-[13px] md:text-sm lg:text-base w-full md:w-fit relative group"
  data-product-id="<?php echo get_the_ID(); ?>">
  <svg class="hidden md:block size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
  </svg>
  <span class="md:hidden text-[13px] md:text-sm lg:text-base">
    <?php echo esc_html__('Thêm vào giỏ hàng', 'ryvances'); ?>
  </span>
  <!-- Tooltip -->
  <span
    class="hidden lg:block absolute right-0 bottom-full mb-2 px-2 py-1 bg-black text-white text-xs rounded-lg opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-200 whitespace-nowrap z-50 shadow-md border border-gray-300
    after:content-[''] after:absolute after:right-2 after:top-[calc(100%-2px)] after:w-0 after:h-0 after:border-x-[10px] after:border-x-transparent after:border-t-[10px] after:border-t-black after:rounded-sm">
    <?php echo esc_html__('Thêm vào giỏ hàng', 'ryvances'); ?>
  </span>
</button>