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

  <!-- ===== HEADER 1 - Transparent Header (Luôn hiển thị trên mobile) ===== -->
  <header id="header-1" class="fixed top-0 left-0 right-0 z-50 h-18 transition-all duration-300 bg-transparent border-b-2 border-transparent opacity-100 visible transform translate-y-0">
    <section class="container px-4 mx-auto h-full flex justify-between items-center">
      <div class="relative h-full w-full flex justify-between lg:justify-start items-center">

        <!-- Logo & Hamburger -->
        <a href="<?php echo home_url(); ?>" title="<?php echo esc_attr($title); ?>" class="relative z-20">
          <img src="<?php echo esc_url($logo_primary); ?>" alt="<?php echo esc_attr($title); ?>" class="w-auto !h-7.5 transition-all duration-300">
          <div class="absolute -z-10 left-[9px] top-1/2 -translate-y-1/2 size-5 flex items-center justify-center pointer-events-none">
            <span id="bg-hamburger-menu" class="size-px bg-secondary rounded-full transition-all duration-300"></span>
            <div class="absolute top-0 left-0 right-0 bottom-0 rounded-full hb-ring hb-ring-1"></div>
            <div class="absolute top-0 left-0 right-0 bottom-0 rounded-full hb-ring hb-ring-2"></div>
            <div class="absolute top-0 left-0 right-0 bottom-0 rounded-full hb-ring hb-ring-3"></div>
            <div class="absolute top-0 left-0 right-0 bottom-0 rounded-full hb-ring hb-ring-4"></div>
            <div class="absolute top-0 left-0 right-0 bottom-0 rounded-full hb-ring hb-ring-5"></div>
          </div>
        </a>
        <div class="flex items-center gap-x-2">
          <div class="ml-12 relative">
            <div class="js-menu-toggle-close flex flex-col justify-end gap-y-1.5 h-full cursor-pointer relative z-[100]">
              <span class="block w-6 h-1 transition-all duration-300 transform origin-center hamburger-line"></span>
              <span class="block w-6 h-1 transition-all duration-300 transform origin-center hamburger-line"></span>
              <span class="block w-6 h-1 transition-all duration-300 transform origin-center hamburger-line"></span>
            </div>
          </div>
          <!-- Menu Container cho Header 1 (Luôn được sử dụng trên mobile) ===== -->
          <div class="absolute z-40 top-20 left-0 right-0 bottom-0 hidden opacity-0 invisible transition-opacity duration-500 ease-in-out">
            <?php echo do_shortcode('[qhw_polylang_langswitcher_mobile]'); ?>
            <div id="js-apply-menu-1" class="nav-mobile-style"></div>
            <div class="mt-4 flex flex-col items-start gap-y-4">
              <?php get_template_part('template-components/header-button-link-to-contact-mobile'); ?>
              <div class="flex items-center gap-x-4">
                <?php get_template_part('template-components/header-button-circle-facebook-mobile'); ?>
                <?php get_template_part('template-components/header-button-circle-youtube-mobile'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </header>

  <style>
    .js-menu-toggle-close.hamburger-white .hamburger-line {
      background-color: #fff !important;
    }
  </style>

  <!-- ===== HEADER 2 - White Header (Chỉ hiển thị trên desktop khi scroll) ===== -->
  <header id="header-2" class="fixed top-0 left-0 right-0 z-50 h-18 transition-all duration-300 bg-white shadow-md border-b-2 border-primary opacity-0 invisible transform -translate-y-full lg:block hidden" style="box-shadow: 0 0 15px 2px rgba(33, 33, 33, 0.1);">
    <section class="container px-4 mx-auto h-full flex justify-between items-center">
      <div class="h-full w-full flex justify-between items-center">
        <!-- Logo -->
        <a href="<?php echo home_url(); ?>" title="<?php echo esc_attr($title); ?>">
          <img src="<?php echo esc_url($logo_secondary); ?>" alt="<?php echo esc_attr($title); ?>" class="w-auto !h-7.5 transition-all duration-300">
        </a>

        <!-- Menu Container cho Header 2 (Chỉ desktop) ===== -->
        <div id="js-apply-menu-2" class="nav-desktop-style"></div>

        <!-- Phone Contact -->
        <div class="flex items-center gap-x-4">
          <?php get_template_part('template-components/header-button-link-to-contact'); ?>
          <?php get_template_part('template-components/header-button-circle-facebook'); ?>
          <?php get_template_part('template-components/header-button-circle-youtube'); ?>
          <?php echo do_shortcode('[qhw_polylang_langswitcher]'); ?>
        </div>
      </div>
    </section>
  </header>

  <!-- ===== HIDDEN MENU TEMPLATE ===== -->
  <div id="menu-template" style="display: none;">
    <?php get_template_part('template-customs/wp_nav_menu_home'); ?>
  </div>

  <!-- ===== HEADER SCROLL TOGGLE ===== -->
  <script>
    document.addEventListener('scroll', function() {
      const header1 = document.getElementById('header-1');
      const header2 = document.getElementById('header-2');
      const siteScroll = window.scrollY;
      const isDesktop = window.innerWidth >= 1024;

      if (isDesktop) {
        if (siteScroll <= 100) {
          header1.classList.remove('opacity-0', 'invisible', '-translate-y-full');
          header1.classList.add('opacity-100', 'visible', 'translate-y-0');
          header2.classList.remove('opacity-100', 'visible', 'translate-y-0');
          header2.classList.add('opacity-0', 'invisible', '-translate-y-full');
        } else {
          header1.classList.remove('opacity-100', 'visible', 'translate-y-0');
          header1.classList.add('opacity-0', 'invisible', '-translate-y-full');
          header2.classList.remove('opacity-0', 'invisible', '-translate-y-full');
          header2.classList.add('opacity-100', 'visible', 'translate-y-0');
        }
      } else {
        if (siteScroll <= 100) {
          header1.classList.remove('bg-white', 'shadow-md', 'border-primary');
          header1.classList.add('bg-transparent', 'border-transparent');
          header1.style.boxShadow = 'none';

          const logoImg = header1.querySelector('img');
          if (logoImg) {
            logoImg.src = '<?php echo esc_js($logo_primary); ?>';
          }

        } else {
          header1.classList.remove('bg-transparent', 'border-transparent');
          header1.classList.add('bg-white', 'shadow-md', 'border-primary');
          header1.style.boxShadow = '0 0 15px 2px rgba(33, 33, 33, 0.1)';

          const logoImg = header1.querySelector('img');
          if (logoImg) {
            logoImg.src = '<?php echo esc_js($logo_secondary); ?>';
          }

        }
      }
    });
  </script>

  <!-- ===== MOBILE MENU MANAGEMENT ===== -->
  <script>
    const menuMobile1 = document.getElementById('id-nav-container-home');
    const html = document.querySelector('html');

    window.addEventListener('resize', function() {
      if (window.innerWidth > 1024) {
        if (menuMobile1) menuMobile1.classList.remove('menu-mobile-active');
        html.style.overflow = 'auto';
        if (isMenuOpen && resetAllHamburgerButtonsGlobal) {
          resetAllHamburgerButtonsGlobal();
        }
        const menuToggle = document.querySelector('.js-menu-toggle-close');
        if (menuToggle) menuToggle.classList.remove('hamburger-white');
      }
    });
  </script>

  <!-- ===== MOBILE SUBMENU ===== -->
  <script>
    if (window.innerWidth <= 1024) {
      const menuItemHasChildren = document.querySelectorAll('.menu-item-has-children');
      let currentOpenItem = null;

      menuItemHasChildren.forEach(function(item) {
        const link = item.querySelector('a');
        link.addEventListener('click', function(e) {
          const rect = link.getBoundingClientRect();
          const isClickOnArrow = (e.clientX > rect.right - 50);

          if (isClickOnArrow) {
            e.preventDefault();
            if (currentOpenItem && currentOpenItem !== item) {
              currentOpenItem.classList.remove('active');
              const prevSubMenu = currentOpenItem.querySelector('.sub-menu');
              if (prevSubMenu) {
                prevSubMenu.classList.remove('active');
                prevSubMenu.style.maxHeight = '0';
              }
            }

            item.classList.toggle('active');
            const subMenu = item.querySelector('.sub-menu');

            if (subMenu) {
              subMenu.classList.toggle('active');
              if (subMenu.classList.contains('active')) {
                currentOpenItem = item;
                subMenu.style.transition = 'none';
                subMenu.style.maxHeight = 'none';
                const height = subMenu.scrollHeight;
                subMenu.style.maxHeight = '0';
                subMenu.offsetHeight;
                subMenu.style.transition = '.4s ease-in-out all';
                subMenu.style.maxHeight = height + 'px';
              } else {
                currentOpenItem = null;
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
      if (window.innerWidth <= 1024) {
        return document.querySelector('#js-apply-menu-1 .js-wp-nav-menu-home');
      }
      return document.querySelector('#js-apply-menu-1 .js-wp-nav-menu-home, #js-apply-menu-2 .js-wp-nav-menu-home');
    }

    function setupHamburgerToggle(toggleSelector) {
      const menuToggle = document.querySelector(toggleSelector);
      if (!menuToggle) return;

      const bgElement = document.getElementById('bg-hamburger-menu');

      menuToggle.addEventListener('click', function() {
        const spans = menuToggle.querySelectorAll('span');
        const currentMenu = getCurrentMenu();
        const containerApplyMenu1 = document.getElementById('js-apply-menu-1');
        const wrapperApplyMenu1 = containerApplyMenu1 ? containerApplyMenu1.parentElement : null;
        const isMenuInApply1 = currentMenu && containerApplyMenu1 && containerApplyMenu1.contains(currentMenu);
        const visibilityTarget = isMenuInApply1 ? wrapperApplyMenu1 : currentMenu;

        if (!isMenuOpen) {
          transformToX(spans);
          isMenuOpen = true;

          if (bgElement) {
            bgElement.style.transform = 'scale(1180)';
            bgElement.classList.add('sun-open');
          }

          if (visibilityTarget && isMenuOpen) {
            visibilityTarget.classList.remove('hidden', 'invisible');
            visibilityTarget.classList.add('block', 'visible');
            visibilityTarget.offsetHeight;
            visibilityTarget.classList.remove('opacity-0');
            visibilityTarget.classList.add('opacity-100');
          }

          if (window.innerWidth <= 1024) {
            if (menuMobile1) menuMobile1.classList.add('menu-mobile-active');
            html.style.overflow = 'hidden';

            const header1 = document.getElementById('header-1');
            const logoImg = header1.querySelector('img');
            if (logoImg) {
              logoImg.src = '<?php echo esc_js($logo_primary); ?>';
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
            setTimeout(() => {
              if (!isMenuOpen) {
                visibilityTarget.classList.remove('block', 'visible');
                visibilityTarget.classList.add('hidden', 'invisible');
              }
            }, 150);
          }

          setTimeout(() => {
            if (bgElement && !isMenuOpen) {
              bgElement.style.transform = 'scale(1)';
              bgElement.classList.remove('sun-open');
            }
          }, 100);

          if (window.innerWidth <= 1024) {
            if (menuMobile1) menuMobile1.classList.remove('menu-mobile-active');
            html.style.overflow = 'auto';

           
            const header1 = document.getElementById('header-1');
            const logoImg = header1.querySelector('img');
            if (logoImg) {
             
              const siteScroll = window.scrollY;
              if (siteScroll > 100) {
                
                logoImg.src = '<?php echo esc_js($logo_secondary); ?>';
              } else {
                
                logoImg.src = '<?php echo esc_js($logo_primary); ?>';
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
      const menuToggle = document.querySelector('.js-menu-toggle-close');
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
      const containerApplyMenu1 = document.getElementById('js-apply-menu-1');
      const wrapperApplyMenu1 = containerApplyMenu1 ? containerApplyMenu1.parentElement : null;
      const isMenuInApply1 = currentMenu && containerApplyMenu1 && containerApplyMenu1.contains(currentMenu);
      const visibilityTarget = isMenuInApply1 ? wrapperApplyMenu1 : currentMenu;

      if (visibilityTarget) {
        visibilityTarget.classList.remove('block', 'opacity-100', 'visible');
        visibilityTarget.classList.add('hidden', 'opacity-0', 'invisible');
      }

      setTimeout(() => {
        syncAllHamburgerButtons(false);
      }, 200);
    }
    
    resetAllHamburgerButtonsGlobal = resetAllHamburgerButtons;
    setupHamburgerToggle('.js-menu-toggle-close');
    
    document.addEventListener('click', function(e) {
      if (!isMenuOpen) return;

      const currentMenu = getCurrentMenu();
      const hamburgerButton = document.querySelector('.js-menu-toggle-close');

      const isClickInsideMenu = currentMenu && currentMenu.contains(e.target);
      const isClickOnHamburger = hamburgerButton && hamburgerButton.contains(e.target);

      if (!isClickInsideMenu && !isClickOnHamburger) {
        if (hamburgerButton) {
          hamburgerButton.click();
        }
      }
    });
  </script>

  <!-- ===== HANDLE DYNAMIC MENU SYSTEM ===== -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const menu1 = document.getElementById('js-apply-menu-1');
      const menu2 = document.getElementById('js-apply-menu-2');
      const header1 = document.getElementById('header-1');
      const header2 = document.getElementById('header-2');

      const menuTemplate = document.querySelector('#menu-template .js-wp-nav-menu-home');

      if (!menuTemplate) {
        const anyMenu = document.querySelector('.js-wp-nav-menu-home');
        return;
      }

      const masterMenu = menuTemplate.cloneNode(true);
      
      function applyMenuInsideElement(targetElementId, menu) {
        const targetElement = document.getElementById(targetElementId);
        if (targetElement) {
          targetElement.innerHTML = '';
          targetElement.appendChild(menu);
        }
      }

      function removeAllActiveMenus() {
        const activeMenus = document.querySelectorAll('.js-wp-nav-menu-home:not(#menu-template .js-wp-nav-menu-home)');
        activeMenus.forEach(menu => {
          menu.remove();
        });
      }

      let currentMenuLocation = null;
      
      function handleMenuScroll() {
        const scrollY = window.scrollY;
        const scrollThreshold = 100;
        const isMobile = window.innerWidth <= 1024;

        
        if (isMenuOpen) {
          
          const hamburgerButton = document.querySelector('.js-menu-toggle-close');
          if (hamburgerButton) {
            hamburgerButton.click();
          }
          return;
        }

        if (isMobile) {
          
          if (currentMenuLocation !== 'header-1') {
            removeAllActiveMenus();
            applyMenuInsideElement('js-apply-menu-1', masterMenu.cloneNode(true));
            currentMenuLocation = 'header-1';
          }
        } else {
          
          if (scrollY <= scrollThreshold) {
            if (currentMenuLocation !== 'header-1') {
              removeAllActiveMenus();
              applyMenuInsideElement('js-apply-menu-1', masterMenu.cloneNode(true));
              currentMenuLocation = 'header-1';
            }
          } else {
            if (currentMenuLocation !== 'header-2') {
              removeAllActiveMenus();
              applyMenuInsideElement('js-apply-menu-2', masterMenu.cloneNode(true));
              currentMenuLocation = 'header-2';
            }
          }
        }
      }
      
      document.addEventListener('scroll', handleMenuScroll);
      handleMenuScroll(); 

      if (window.innerWidth <= 1024) {
        applyMenuInsideElement('js-apply-menu-1', masterMenu.cloneNode(true));
        currentMenuLocation = 'header-1';
      }
    });
  </script>