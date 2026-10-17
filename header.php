<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <?php wp_head(); ?>
</head>

<!-- ===== HEADER SETUP ===== -->
<?php
$logo_primary   = get_field('primary_logo', 'option');
$logo_secondary = get_field('secondary_logo', 'option');
$title          = 'QUOCHOANGIT - Thiết kế website WordPress chuyên nghiệp';
?>

<body <?php body_class(); ?>>

  <!-- ===== SINGLE HEADER ===== -->
  <header id="main-header" class="fixed top-0 left-0 right-0 z-50 h-20 bg-transparent border-b-2 border-transparent transition-all duration-300 ease-in-out">
    <section class="container px-4 mx-auto h-full flex justify-between items-center">
      <div class="h-full w-full flex justify-between items-center relative lg:static">

        <!-- Logo -->
        <a href="<?php echo home_url(); ?>" title="<?php echo esc_attr($title); ?>" class="relative z-20">
          <img id="site-logo-img" src="<?php echo esc_url($logo_primary); ?>" alt="<?php echo esc_attr($title); ?>" class="w-auto !h-7.5">
          <div class="absolute -z-10 left-[9px] top-1/2 -translate-y-1/2 size-5 flex items-center justify-center pointer-events-none">
            <span id="bg-hamburger-menu" class="size-px bg-secondary rounded-full transition-all duration-300"></span>
            <div class="absolute top-0 left-0 right-0 bottom-0 rounded-full hb-ring hb-ring-1"></div>
            <div class="absolute top-0 left-0 right-0 bottom-0 rounded-full hb-ring hb-ring-2"></div>
            <div class="absolute top-0 left-0 right-0 bottom-0 rounded-full hb-ring hb-ring-3"></div>
            <div class="absolute top-0 left-0 right-0 bottom-0 rounded-full hb-ring hb-ring-4"></div>
            <div class="absolute top-0 left-0 right-0 bottom-0 rounded-full hb-ring hb-ring-5"></div>
          </div>
        </a>

        <!-- Menu Container -->
        <div class="absolute z-40 top-20 left-0 right-0 bottom-0 hidden opacity-0 invisible transition-opacity duration-500 ease-in-out lg:static lg:block lg:opacity-100 lg:visible lg:z-auto lg:top-auto lg:left-auto lg:right-auto lg:bottom-auto">
          <?php // do_shortcode('[qhw_polylang_langswitcher_mobile]'); ?>
          <?php get_template_part('template-customs/wp_nav_menu'); ?>
          <div class="lg:hidden mt-4"><?php get_template_part('template-components/header-button-link-to-contact-mobile'); ?></div>
          <div class="lg:hidden flex items-center gap-x-4 mt-4">
            <?php get_template_part('template-components/header-button-circle-facebook-mobile'); ?>
            <?php get_template_part('template-components/header-button-circle-youtube-mobile'); ?>
          </div>
        </div>

        <!-- Phone Contact -->
        <div class="hidden lg:flex items-center gap-x-4">
          <?php get_template_part('template-components/header-button-link-to-contact'); ?>
          <?php get_template_part('template-components/header-button-circle-facebook'); ?>
          <?php get_template_part('template-components/header-button-circle-youtube'); ?>
          <?php // echo do_shortcode('[qhw_polylang_langswitcher]'); ?>
        </div>

        <!-- Hamburger -->
        <div class="lg:hidden ml-12 relative">
          <div id="js-menu-toggle-close" class="flex flex-col justify-end gap-y-1.5 h-full cursor-pointer relative z-[100]">
            <span class="block w-6 h-1 transition-all duration-300 transform origin-center hamburger-line"></span>
            <span class="block w-6 h-1 transition-all duration-300 transform origin-center hamburger-line"></span>
            <span class="block w-6 h-1 transition-all duration-300 transform origin-center hamburger-line"></span>
          </div>
        </div>
      </div>
    </section>
  </header>

  <style>
    #js-menu-toggle-close.hamburger-white .hamburger-line { background-color: #fff !important; }
  </style>

  <!-- ===== MOBILE MENU MANAGEMENT ===== -->
  <script>
    const menuMobile = document.getElementById('id-nav-container');
    const html = document.querySelector('html');

    window.addEventListener('resize', function() {
      if (window.innerWidth > 1024) {
        if (menuMobile) menuMobile.classList.remove('menu-mobile-active');
        html.style.overflow = 'auto';
        if (isMenuOpen && resetAllHamburgerButtonsGlobal) {
          resetAllHamburgerButtonsGlobal();
        }
        const menuToggle = document.getElementById('js-menu-toggle-close');
        if (menuToggle) menuToggle.classList.remove('hamburger-white');
      }
    });
  </script>

  <!-- ===== MOBILE SUBMENU ===== -->
  <script>
    if (window.innerWidth <= 1024) {
      const menuItemHasChildren = document.querySelectorAll('.menu-item-has-children');

      menuItemHasChildren.forEach(function(item) {
        const link = item.querySelector('a');
        link.addEventListener('click', function(e) {
          const rect = link.getBoundingClientRect();
          const isClickOnArrow = (e.clientX > rect.right - 50);

          if (isClickOnArrow) {
            e.preventDefault();

            item.classList.toggle('active');
            const subMenu = item.querySelector('.sub-menu');

            if (subMenu) {
              const willOpen = !subMenu.classList.contains('active');
              subMenu.classList.toggle('active');
              if (willOpen) {
                subMenu.style.transition = 'none';
                subMenu.style.maxHeight = 'none';
                const height = subMenu.scrollHeight;
                subMenu.style.maxHeight = '0';
                subMenu.offsetHeight;
                subMenu.style.transition = '.4s ease-in-out all';
                subMenu.style.maxHeight = height + 'px';
              } else {
                subMenu.style.maxHeight = '0';
              }
            }
          }
        });
      });
    }
  </script>

  <!-- ===== HAMBURGER MENU SYSTEM ===== -->
  <script>
    let isMenuOpen = false;
    let resetAllHamburgerButtonsGlobal;

    function getCurrentMenu() {
      return document.querySelector('.js-wp-nav-menu');
    }

    function setupHamburgerToggle(toggleSelector) {
      const menuToggle = document.querySelector(toggleSelector);
      if (!menuToggle) return;

      const bgElement = document.getElementById('bg-hamburger-menu');

      menuToggle.addEventListener('click', function() {
        const spans = menuToggle.querySelectorAll('span');
        const currentMenu = getCurrentMenu();
        const containerApplyMenu = document.getElementById('id-nav-container');
        const wrapperApplyMenu = containerApplyMenu ? containerApplyMenu.parentElement : null;
        const isMenuInApply = currentMenu && containerApplyMenu && containerApplyMenu.contains(currentMenu);
        const visibilityTarget = isMenuInApply ? wrapperApplyMenu : currentMenu;

        if (!isMenuOpen) {
          transformToX(spans);
          isMenuOpen = true;

          if (bgElement) {
            bgElement.style.transform = 'scale(1180)';
            bgElement.classList.add('sun-open');
          }

          // Hiển thị menu ngay lập tức với transition mượt
          if (visibilityTarget && isMenuOpen) {
            visibilityTarget.classList.remove('hidden', 'invisible');
            visibilityTarget.classList.add('flex', 'visible', 'flex-col', 'items-start');
            // Trigger reflow để transition hoạt động
            visibilityTarget.offsetHeight;
            visibilityTarget.classList.remove('opacity-0');
            visibilityTarget.classList.add('opacity-100');
          }

          if (window.innerWidth <= 1024) {
            if (menuMobile) menuMobile.classList.add('menu-mobile-active');
            html.style.overflow = 'hidden';

            // Đổi logo sang primary khi mở hamburger menu trên mobile
            const logoImg = document.getElementById('site-logo-img');
            if (logoImg) {
              logoImg.setAttribute('src', '<?php echo esc_js($logo_primary); ?>');
            }
            if (menuToggle) menuToggle.classList.add('hamburger-white');
          }

          syncAllHamburgerButtons(true);
        } else {
          transformToHamburger(spans);
          isMenuOpen = false;

          if (visibilityTarget) {
            visibilityTarget.classList.remove('opacity-100');
            visibilityTarget.classList.add('opacity-0');
            // Đợi transition opacity hoàn thành rồi mới ẩn
            setTimeout(() => {
              if (!isMenuOpen) {
                visibilityTarget.classList.remove('flex', 'visible', 'flex-col', 'items-start');
                visibilityTarget.classList.add('hidden', 'invisible');
              }
            }, 150);
          }

          setTimeout(() => {
            if (!isMenuOpen) {
              if (bgElement) {
                bgElement.style.transform = 'scale(1)';
                bgElement.classList.remove('sun-open');
              }
            }
          }, 200);

          if (window.innerWidth <= 1024) {
            if (menuMobile) menuMobile.classList.remove('menu-mobile-active');
            html.style.overflow = 'auto';

            // Đổi logo về trạng thái phù hợp khi đóng hamburger trên mobile
            const logoImg = document.getElementById('site-logo-img');
            if (logoImg) {
              const siteScroll = window.scrollY;
              if (siteScroll > 100) {
                logoImg.setAttribute('src', '<?php echo esc_js($logo_secondary); ?>');
              } else {
                logoImg.setAttribute('src', '<?php echo esc_js($logo_primary); ?>');
              }
            }
            if (menuToggle) menuToggle.classList.remove('hamburger-white');
          }

          syncAllHamburgerButtons(false);
        }
      });
    }

    function transformToX(spans) {
      spans[0].style.transform = 'rotate(45deg) translate(8px, 8px)';
      spans[1].style.opacity = '0';
      spans[2].style.transform = 'rotate(-45deg) translate(6px, -6px)';
    }

    function transformToHamburger(spans) {
      spans[0].style.transform = 'rotate(0deg) translate(0px, 0px)';
      spans[1].style.opacity = '1';
      spans[2].style.transform = 'rotate(0deg) translate(0px, 0px)';
    }

    function syncAllHamburgerButtons(isOpen) {
      const menuToggle = document.getElementById('js-menu-toggle-close');
      const bgElement = document.getElementById('bg-hamburger-menu');
      if (!menuToggle) return;

      const spans = menuToggle.querySelectorAll('span');

      if (isOpen) {
        transformToX(spans);
        if (bgElement) {
          bgElement.style.transform = 'scale(1180)';
          bgElement.classList.add('sun-open');
        }
      } else {
        transformToHamburger(spans);
        if (bgElement) {
          bgElement.style.transform = 'scale(1)';
          bgElement.classList.remove('sun-open');
        }
      }
    }

    function resetAllHamburgerButtons() {
      isMenuOpen = false;
      const currentMenu = getCurrentMenu();
      const containerApplyMenu = document.getElementById('id-nav-container');
      const wrapperApplyMenu = containerApplyMenu ? containerApplyMenu.parentElement : null;
      const isMenuInApply = currentMenu && containerApplyMenu && containerApplyMenu.contains(currentMenu);
      const visibilityTarget = isMenuInApply ? wrapperApplyMenu : currentMenu;

      if (visibilityTarget) {
        visibilityTarget.classList.remove('block', 'opacity-100', 'visible', 'flex', 'flex-col', 'items-start');
        visibilityTarget.classList.add('hidden', 'opacity-0', 'invisible');
      }

      setTimeout(() => {
        syncAllHamburgerButtons(false);
      }, 200);
    }

    resetAllHamburgerButtonsGlobal = resetAllHamburgerButtons;
    setupHamburgerToggle('#js-menu-toggle-close');

    document.addEventListener('click', function(e) {
      if (!isMenuOpen) return;

      const currentMenu = getCurrentMenu();
      const hamburgerButton = document.getElementById('js-menu-toggle-close');

      const isClickInsideMenu = currentMenu && currentMenu.contains(e.target);
      const isClickOnHamburger = hamburgerButton && hamburgerButton.contains(e.target);

      if (!isClickInsideMenu && !isClickOnHamburger) {
        if (hamburgerButton) {
          hamburgerButton.click();
        }
      }
    });
  </script>

  <!-- ===== SCROLL-BASED STYLES (desktop only) ===== -->
  <script>
    function applyHeaderScrollStyles() {
      const header = document.getElementById('main-header');
      const logoImg = document.getElementById('site-logo-img');
      if (!header) return;

      const isDesktop = window.innerWidth > 1024;
      if (isDesktop) {
        const scrolled = window.scrollY > 40;
        if (scrolled) {
          header.classList.add('is-scrolled');
          header.classList.add('h-18', 'bg-white', 'shadow-md');
          header.classList.remove('h-20', 'bg-transparent');
          header.classList.remove('border-transparent');
          header.classList.add('border-primary');
          header.style.boxShadow = '0 0 15px 2px rgba(33, 33, 33, 0.1)';
          // Swap logo to secondary on scroll (desktop only)
          const logoSecondarySrc = '<?php echo esc_js($logo_secondary); ?>';
          if (logoImg && logoImg.getAttribute('src') !== logoSecondarySrc) {
            logoImg.setAttribute('src', logoSecondarySrc);
          }
        } else {
          header.classList.remove('is-scrolled');
          header.classList.remove('h-18', 'bg-white', 'shadow-md');
          header.classList.add('h-20', 'bg-transparent');
          header.classList.remove('border-primary');
          header.classList.add('border-transparent');
          header.style.boxShadow = 'none';
          // Revert logo to primary at top
          const logoPrimarySrc = '<?php echo esc_js($logo_primary); ?>';
          if (logoImg && logoImg.getAttribute('src') !== logoPrimarySrc) {
            logoImg.setAttribute('src', logoPrimarySrc);
          }
        }
      } else {
        header.classList.remove('is-scrolled');
        // Mobile/tablet: đổi nền trắng khi scroll giống header home
        const scrolled = window.scrollY > 100;

        if (scrolled) {
          // Chiều cao khi scroll: h-18
          header.classList.remove('h-20');
          header.classList.add('h-18');
          header.classList.remove('bg-transparent', 'border-transparent');
          header.classList.add('bg-white', 'shadow-md', 'border-primary');
          header.style.boxShadow = '0 0 15px 2px rgba(33, 33, 33, 0.1)';
          const logoSecondarySrc = '<?php echo esc_js($logo_secondary); ?>';
          if (logoImg && logoImg.getAttribute('src') !== logoSecondarySrc) {
            logoImg.setAttribute('src', logoSecondarySrc);
          }
        } else {
          // Chiều cao mặc định trên mobile: h-20
          header.classList.remove('h-18');
          header.classList.add('h-20');
          header.classList.remove('bg-white', 'shadow-md', 'border-primary');
          header.classList.add('bg-transparent', 'border-transparent');
          header.style.boxShadow = 'none';
          const logoPrimarySrc = '<?php echo esc_js($logo_primary); ?>';
          if (logoImg && logoImg.getAttribute('src') !== logoPrimarySrc) {
            logoImg.setAttribute('src', logoPrimarySrc);
          }
        }
      }
    }

    document.addEventListener('scroll', applyHeaderScrollStyles);
    window.addEventListener('resize', applyHeaderScrollStyles);
    applyHeaderScrollStyles();
  </script>