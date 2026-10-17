<?php

/**
 * Template Name: Home
 *
 * @author Henry
 */

get_header('home');
?>
<main>
  <h1 class="hidden">Henry Pham - Freelancer thiết kế web WordPress chuyên nghiệp tại thành phố Hồ Chí Minh</h1>
  <section class="h-screen">
    <div class="relative w-full h-screen overflow-hidden">
      <video
        autoplay
        loop
        muted
        playsinline
        class="absolute top-0 left-0 w-full h-screen object-cover">
        <source src="https://www.canhcam.vn/wp-content/uploads/2024/10/EVS_start_video.mp4" type="video/mp4">
      </video>
      <div class="absolute inset-0 bg-black/50"></div>

      <div class="relative z-10 flex items-center justify-center h-full text-white">
        <div class="flex flex-col items-start justify-center">
          <h2 class="select-none text-2xl md:text-3xl lg:text-5xl font-extrabold">
            Freelancer thiết kế website Doanh Nghiệp
          </h2>
          <p class="select-none text-2xl md:text-3xl lg:text-4xl font-thin mt-5 ml-10 tracking-wider" itemprop="description">
            Giúp web của bạn thu hút khách hàng & bán hàng hiệu quả!
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== section 2 ========== -->
  <section class="mt-10 lg:mt-20">
    <div class="container px-4 mx-auto min-h-[500px]">
      Section 2
    </div>
  </section>

  <!-- ========== section 3 ========== -->
  <section class="mt-10 lg:mt-20">
    <div class="container px-4 mx-auto min-h-[500px]">
      Section 3
    </div>
  </section>

  <!-- ========== section 4 ========== -->
  <section class="mt-10 lg:mt-20">
    <div class="container px-4 mx-auto min-h-[500px]">
      Section 4
    </div>
  </section>

  <!-- ========== section 5 ========== -->
</main>

<?php get_footer(); ?>