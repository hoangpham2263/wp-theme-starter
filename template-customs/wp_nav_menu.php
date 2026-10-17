<?php echo wp_nav_menu(
  array(
    'theme_location' => 'primary',
    'depth' => 2,
    'container_id' => 'id-nav-container',
    'container' => 'nav',
    'container_class' => 'js-wp-nav-menu',
    'menu_id' => 'menu-primary',
    'menu_class' => '',
    'walker'         => new Custom_Walker_Nav_Menu()
  )
);
?>
<!-- ===== MOBILE MENU STYLES ===== -->
<style>
  /* Hamburger concentric rings using utility classes on .hb-ring */
  .hb-ring {
    position: absolute !important;
    inset: auto !important;
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) scale(0.6);
    border-radius: 9999px;
    border-width: 1px;
    border-color: rgba(255,255,255,0.1) !important;
    opacity: 0;
    transition: none;
    z-index: 1;
  }
  .hb-ring-1 { width: 50px; height: 50px; }
  .hb-ring-2 { width: 130px; height: 130px; }
  .hb-ring-3 { width: 330px; height: 330px; }
  .hb-ring-4 { width: 600px; height: 600px; }
  .hb-ring-5 { width: 1030px; height: 1030px; }

  /* Activate rings when background gets .sun-open */
  #bg-hamburger-menu.sun-open ~ .hb-ring {
    opacity: .95;
    transform: translate(-50%, -50%) scale(1);
    transition: opacity .6s ease, transform .8s ease;
  }

  @media (max-width: 1024px) {
    /* Hamburger line màu theo nền header trên mobile (giống header home) */
    #main-header.bg-white .hamburger-line {
      background-color: var(--color-primary);
    }

    #main-header:not(.bg-white) .hamburger-line {
      background-color: #fff;
    }

    #id-nav-container {
      color: #fff;
      width: fit-content;

      #menu-primary {
        display: flex;
        flex-direction: column;
        z-index: 99;
        position: relative;
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.4s ease 0.1s, transform 0.4s ease 0.1s;

        >div:not(.menu-item-has-children) {
          position: relative;
          display: flex;
          align-items: center;
          justify-content: center;
          width: fit-content;
          height: 100%;

          >a {
            display: block;
            margin-bottom: 6px;
            font-size: 26px;
            font-weight: 700;
            text-decoration: none;
            transition: .4s ease all;
            position: relative;

            &:after {
              content: '';
              position: absolute;
              bottom: 0;
              left: 0;
              height: 0.5px;
              width: 0%;
              background: #ffffff;
              transition: .4s ease all;
            }

            &:hover::after {
              width: 100%;
            }
          }
        }

        >div.menu-item-has-children {
          position: relative;
          display: flex;
          align-items: center;
          justify-content: center;
          width: fit-content;
          height: 100%;

          &:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 100%;
            height: 100%;
            width: 20px;
            z-index: -1;
          }

          >a {
            display: flex;
            align-items: center;
            gap: 4px;
            margin-bottom: 6px;
            font-size: 26px;
            font-weight: 700;
            text-decoration: none;
            position: relative;
          }
        }
      }

      .opacity-0 #menu-primary {
        opacity: 0;
        transform: translateY(20px);
      }

      .opacity-100 #menu-primary {
        opacity: 1;
        transform: translateY(0);
      }

      /* ===== MOBILE SUBMENU STYLES ===== */
      /* Xử lý submenu cho mobile - hiển thị khi click vào arrow */
      .menu-item-has-children {
        position: relative;
        cursor: pointer;
        transition: transform 0.4s ease, opacity 0.4s ease;
        /* Chỉ transition cho transform và opacity, không cho màu chữ */

        &:hover {
          .sub-menu {
            opacity: 1;
            visibility: visible;
            transform: translateX(0);

            >.menu-item {
              opacity: 1;
              transform: translateX(0);
            }
          }

          >a::after {
            transform: rotate(180deg);
            transition: transform 0.4s ease;
            /* Chỉ transition cho transform */
          }
        }
      }

      .sub-menu {
        opacity: 0;
        visibility: hidden;
        transform: translateX(-20px);
        padding: 5px 0 5px 50px;
        margin-left: 20px;
        position: absolute;
        top: -10px;
        left: 100%;
        width: fit-content;
        border: none;
        white-space: nowrap;
        transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s ease;

        &::before {
          content: '';
          position: absolute;
          top: 26px;
          left: 0;
          height: 1px;
          width: 30px;
          background-color: #fff;
        }

        >.menu-item {
          cursor: pointer !important;
          border: 2px solid transparent;
          padding: 6px 0;
          opacity: 0;
          transform: translateX(-10px);
          transition: opacity 0.3s ease, transform 0.3s ease;
        }

        >.menu-item:nth-child(1) {
          transition-delay: 0.05s;
        }

        >.menu-item:nth-child(2) {
          transition-delay: 0.1s;
        }

        >.menu-item:nth-child(3) {
          transition-delay: 0.15s;
        }

        >.menu-item:nth-child(4) {
          transition-delay: 0.2s;
        }

        >.menu-item:nth-child(5) {
          transition-delay: 0.25s;
        }

        >.menu-item:nth-child(6) {
          transition-delay: 0.3s;
        }

        >.menu-item:nth-child(7) {
          transition-delay: 0.35s;
        }

        >.menu-item:nth-child(8) {
          transition-delay: 0.4s;
        }

        >.menu-item:nth-child(9) {
          transition-delay: 0.45s;
        }

        >.menu-item:nth-child(10) {
          transition-delay: 0.5s;
        }

        >.menu-item>a {
          display: block;
          color: #fff;
          width: fit-content;
          text-decoration: none;
          font-size: 16px;
          border: none;
          position: relative;
          transition: .4s ease all;

          &:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            height: 0.5px;
            width: 0%;
            background: #ffffff;
            transition: .4s ease all;
          }

          &:hover::after {
            width: 100%;
          }
        }
      }
    }
  }
</style>

<!-- ===== DESKTOP MENU STYLES ===== -->
<style>
  @media (min-width: 1025px) {
    .js-wp-nav-menu {
      background: none !important;
      backdrop-filter: none !important;
      padding-top: 0 !important;
      position: static !important;

      display: block !important;
      opacity: 1 !important;
      visibility: visible !important;

    }

    /* Khi header đã scroll: trả màu text & underline về mặc định */
    #main-header.is-scrolled #id-nav-container #menu-primary>div:not(.menu-item-has-children)>a {
      color: var(--color-primary-text);
    }

    #main-header.is-scrolled #id-nav-container #menu-primary>div:not(.menu-item-has-children)>a::after {
      background: linear-gradient(94.05deg, var(--color-primary) -2.08%, #381ee5 106.23%);
    }

    #main-header.is-scrolled #id-nav-container #menu-primary>div.menu-item-has-children>a {
      color: var(--color-primary-text);
    }

    #id-nav-container {
      #menu-primary {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 70px;
        /* text-transform: uppercase; */
        font-weight: 500;

        >div:not(.menu-item-has-children) {
          position: relative;
          display: flex;
          align-items: center;
          justify-content: center;
          width: fit-content;
          padding: 0 16px;
          height: 100%;

          >a {
            display: block;
            padding: 8px 0;
            font-size: 16px;
            color: #fff;
            text-decoration: none;
            transition: none;
            /* Màu chữ thay đổi ngay lập tức */
            position: relative;

            &:after {
              content: '';
              position: absolute;
              bottom: 0;
              left: 0;
              height: 2px;
              width: 0%;
              background: #ffffff;
              transition: .4s ease all;
            }

            &:hover::after {
              width: 100%;
            }
          }
        }

        >div.menu-item-has-children {
          position: relative;
          display: flex;
          align-items: center;
          justify-content: center;
          width: fit-content;
          padding: 0 16px;
          height: 100%;

          &::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 10px;
          }

          >a {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 8px 0;
            font-size: 16px;
            color: #fff;
            text-decoration: none;
            position: relative;
            transition: none;
            /* Màu chữ thay đổi ngay lập tức */

            &::after {
              content: '';
              display: inline-block;
              width: 16px;
              height: 16px;
              background-color: currentColor;
              mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2.5' stroke='currentColor'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='m19.5 8.25-7.5 7.5-7.5-7.5' /%3E%3C/svg%3E") no-repeat center;
              mask-size: contain;
              -webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2.5' stroke='currentColor'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='m19.5 8.25-7.5 7.5-7.5-7.5' /%3E%3C/svg%3E") no-repeat center;
              -webkit-mask-size: contain;
            }
          }
        }
      }

      /* ===== DESKTOP SUBMENU STYLES ===== */
      /* Xử lý submenu cho desktop - hiển thị khi hover */
      .menu-item-has-children {
        position: relative;
        cursor: pointer;
        transition: transform 0.4s ease, opacity 0.4s ease;
        /* Chỉ transition cho transform và opacity, không cho màu chữ */

        &:hover {
          .sub-menu {
            display: block;
          }

          >a::after {
            transform: rotate(180deg);
            transition: transform 0.4s ease;
            /* Chỉ transition cho transform */
          }
        }
      }

      .sub-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 16px;
        width: fit-content;
        min-width: 200px;
        margin-top: 2px;
        padding: 4px 8px 4px 0px;
        background: #fff;
        border: none;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;
        overflow: hidden;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);

        >div {
          cursor: pointer !important;
          overflow: hidden;
          border: 2px solid transparent;
          border-left: 5px solid transparent;
          border-bottom: 1px solid transparent;
          transition: transform 0.4s ease, border-color 0.4s ease, background-color 0.4s ease;
          /* Chỉ transition cho transform và border, không cho màu chữ */

          &:hover {
            background: #fff;
            border: 2px solid #fff;
            border-left: 5px solid var(--color-primary);
            border-bottom: 1px solid var(--color-primary);
            background-color: #f3f4f6;
            transform: translateX(4px);

            >a {
              color: var(--color-primary) !important;
              /* Màu chữ thay đổi ngay lập tức */
            }
          }
        }

        >div>a {
          display: block;
          color: var(--color-primary-text);
          padding: 6px 14px;
          text-decoration: none;
          font-size: 14px;
          border: none;
          white-space: nowrap;
          transition: none;
          /* Màu chữ thay đổi ngay lập tức */
        }
      }
    }
  }
</style>