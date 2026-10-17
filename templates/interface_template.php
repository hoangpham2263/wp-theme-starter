<?php

/**
 * Template Name: Interface Template
 *
 * @author Henry
 */

get_header();
?>

<main>
  <!-- menu -->
  <section class="bg-[#767676]">
    <div class="container px-4 mx-auto h-full">
      <div class="flex justify-between items-center w-full h-full">
        <div class="flex justify-center items-center gap-x-4">
          <h2 class="text-lg font-bold w-fit">Mẫu giao diện</h2>
          <div class="w-[1px] h-[16px] bg-gray-300"></div>
          <ul class="flex justify-center items-center gap-x-4">
            <li><a href="#">Tất cả</a></li>
            <li><a href="#">Giao diện 1</a></li>
            <li><a href="#">Giao diện 2</a></li>
            <li><a href="#">Giao diện 3</a></li>
          </ul>
        </div>
        <!-- search -->
        <div class="flex justify-center items-center gap-x-4">
          <input type="text" placeholder="Tìm kiếm" class="w-full">
        </div>
      </div>
    </div>
  </section>
  <!-- title -->
  <section class="secondary">
    <div class="container px-4 mx-auto">
      <div class="flex flex-col justify-center items-center w-full h-full min-h-[200px]">
        <h1 class="text-[40px] font-bold text-center uppercase"><?php the_title(); ?></h1>
        <?php if (function_exists('rank_math_the_breadcrumbs')) : ?>
          <div class="breadcrumbs mt-4 text-sm text-center">
            <?php rank_math_the_breadcrumbs(); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <!-- content -->
  <section class="py-8">
    <div class="container px-4 mx-auto">
      <div class="flex flex-col justify-center items-center w-full">
        <h2 class="text-transparent font-extrabold bg-clip-text bg-gradient-to-r from-[#F53CE6] to-[#7220CF] text-4xl uppercase mb-4">DR Solutions - Cung cấp mẫu giao diện hiện đại</h2>
        <p class="text-center text-lg w-[920px]">
          Mẫu giao diện website được chúng tôi thiết kế và thu thập phân chia theo từng ngành nghề phù hợp với nhu cầu thiết kế website của khách hàng. Các mẫu website đều là giao diện mới nhất, giao diện chuẩn trên các thiết bị, chuẩn SEO Google. Khách hàng có thể lựa chọn thiết kế tương tự hoặc giống như website mẫu.
        </p>
        <!-- get template-parts/loop-product-swiper -->
        <?php get_template_part('template-parts/loop-product-swiper-banner'); ?>
      </div>
    </div>
  </section>
  <section class="py-8">
    <div class="container px-4 mx-auto">
      <?php get_template_part('template-parts/loop-product-swiper'); ?>
    </div>
  </section>

  <section class="bg-secondary">
    <div class="container px-4 mx-auto h-full">
      <div class="flex justify-center items-center w-full h-full min-h-[500px]">
        <p class="text-xl font-bold text-center">Interface Template 3</p>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>