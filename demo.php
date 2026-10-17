<header id="header-2" class="fixed top-0 left-0 right-0 z-50 h-18 transition-all duration-200 border-b-2 border-transparent">
<section class="container px-4 mx-auto h-full flex justify-between items-center">
  <div class="h-full w-full flex justify-between items-center">
    <!-- logo -->
    <div class="flex items-center gap-x-2">
      <a href="<?php echo home_url(); ?>" title="Henry Pham - Thiết kế website WordPress chuyên nghiệp" class="">
        <img id="logo" src="<?php echo $logo_primary[0]; ?>" alt="Henry Pham - Thiết kế website WordPress chuyên nghiệp" class="w-auto h-10 transition-all duration-300">
      </a>
      <div id="js-menu-toggle-close" class="ml-12 flex flex-col justify-end gap-y-1.5 h-full cursor-pointer">
        <span class="block w-6 h-1 bg-white transition-all duration-300 transform origin-center"></span>
        <span class="block w-6 h-1 bg-white transition-all duration-300 transform origin-center"></span>
        <span class="block w-6 h-1 bg-white transition-all duration-300 transform origin-center"></span>
      </div>
    </div>

    <!-- menu -->
    <div id="js-wp-nav-menu" class="hidden">
      <?php get_template_part('template-customs/wp_nav_menu'); ?>
    </div>

    <!-- button phone number contact -->
    <div id="js-button-phone-number-contact" class="hidden">
      <?php get_template_part('template-components/button-phone-number-contact'); ?>
    </div>

    <!-- menu mobile -->
    <div class="relative inline-block lg:hidden">
      <button id="menu-mobile-button" class="lg:hidden bg-gradient-to-r from-[#7900ff] to-[#381ee5] text-white w-11 h-11 rounded-full p-1 relative z-[100]">
        <div class="relative w-full h-full">
          <svg id="menu-icon" class="absolute inset-0 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
          </svg>
          <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 transition-transform duration-300 rotate-90 opacity-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </div>
      </button>
      <!-- bg menu mobile -->
      <span id="bg-menu-mobile" class="absolute top-0 left-0 w-11 h-11 bg-gradient-to-r from-[#7900ff] to-[#381ee5] z-[98] rounded-full transition-all duration-300"></span>
    </div>
  </div>
</section>
</header>