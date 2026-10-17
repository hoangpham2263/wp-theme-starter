<?php 
// ========== Polylang ==========
function qhw_get_flag_svg($lang_code)
{
  $flags = [
    'vi' => '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><circle cx="256" cy="256" r="256" fill="#d80027" opacity="1" data-original="#d80027" class=""></circle><path fill="#ffda44" d="m256 133.565 27.628 85.029h89.405l-72.331 52.55 27.628 85.03L256 303.623l-72.33 52.551 27.628-85.03-72.33-52.55h89.404z" opacity="1" data-original="#ffda44"></path></g></svg>',
    'en' => '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 1000 1000" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><clipPath id="a"><circle cx="500" cy="500" r="500" fill="#000000" opacity="1" data-original="#000000"></circle></clipPath><path fill="#ffffff" d="M-550.649 0h2744.442v1000H-550.649z" clip-path="url(#a)" opacity="1" data-original="#ffffff" class=""></path><path fill="#b22234" d="M-550.649 0h2744.442v111.111H-550.649zM-550.649 222.222h2744.442v111.112H-550.649zM-550.649 444.444h2744.442v111.113H-550.649zM-550.649 666.667h2744.442v111.111H-550.649zM-550.649 888.889h2744.442V1000H-550.649z" clip-path="url(#a)" opacity="1" data-original="#b22234" class=""></path><path fill="#3c3b6e" d="M-550.649 0H547.126v555.557H-550.649z" clip-path="url(#a)" opacity="1" data-original="#3c3b6e" class=""></path><g fill="#fff"><path d="m362.243 44.172-9.989 30.754h-32.331l26.153 18.998-9.984 30.74 26.151-18.998 26.15 18.998-9.986-30.743 26.141-18.995h-32.317zM271.236 122.178l-9.986 30.741h-32.322l26.152 18.999-9.994 30.741 26.154-19 26.147 19-9.987-30.741 26.153-18.999h-32.33zM453.233 122.178l-9.986 30.741h-32.319l26.15 18.998-9.995 30.742 26.155-19 26.146 19-9.986-30.739 26.155-19.001h-32.324zM-365.758 244.668l-.003-.002.002-.003.002.005zM-183.76 244.668h-.001l.003-.005v.003zM180.243 200.173l-9.987 30.741h-32.33l26.155 19-9.988 30.75 26.146-18.999 26.153 18.999-9.996-30.75 26.154-19h-32.322zm-.006 44.495h-.001l.003-.005.001.003zM362.243 200.173l-9.987 30.741h-32.333l26.157 19.001-9.988 30.749 26.15-18.997 26.15 18.997-9.99-30.752 26.145-18.998h-32.318zm0 44.495-.003-.002.002-.003.003.005zM89.236 278.181l-9.985 30.738h-32.32l26.143 18.997-9.988 30.743 26.15-18.999 26.15 18.999-9.986-30.739 26.155-19.001H99.223zM271.236 278.181l-9.986 30.738h-32.322l26.153 18.999-9.995 30.741 26.154-19.001 26.147 19.001-9.987-30.741 26.153-18.999h-32.33zM453.233 278.181l-9.986 30.738h-32.319l26.15 18.997-9.995 30.743 26.155-19.001 26.146 19.001-9.987-30.739 26.156-19.001h-32.324zM190.229 386.915l-9.986-30.739-9.987 30.739h-32.33l26.153 19-9.987 30.737 26.147-18.999 26.153 18.999-9.993-30.738 26.151-18.999zM372.229 386.915l-9.986-30.739-9.987 30.739h-32.333l26.156 19.002-9.987 30.735 26.151-18.996 26.15 18.996-9.987-30.74 26.142-18.997zM99.223 464.92l-9.987-30.738-9.986 30.738H46.931l26.142 18.999-9.987 30.741 26.15-18.999 26.15 18.999-9.986-30.737 26.155-19.003zM281.223 464.92l-9.987-30.738-9.986 30.738h-32.322l26.153 19.001-9.995 30.739 26.154-19.001 26.147 19.001-9.987-30.739 26.153-19.001zM463.229 464.92l-9.996-30.738-9.986 30.738h-32.319l26.15 18.999-9.995 30.741 26.155-19.001 26.146 19.001-9.987-30.737 26.156-19.003z" clip-path="url(#a)" fill="#ffffff" opacity="1" data-original="#ffffff" class=""></path></g></g></svg>',
  ];
  return isset($flags[$lang_code]) ? $flags[$lang_code] : $flags['vi'];
}

function qhw_get_language_name($lang_code, $current_lang_code)
{
  $language_names = [
    'vi' => ['vi' => 'Tiếng Việt', 'en' => 'Tiếng Anh'],
    'en' => ['vi' => 'Vietnamese', 'en' => 'English'],
  ];
  return isset($language_names[$current_lang_code][$lang_code])
    ? $language_names[$current_lang_code][$lang_code]
    : $lang_code;
}

function qhw_custom_polylang_langswitcher()
{
  if (!function_exists('pll_the_languages')) {
    return '';
  }

  $languages = pll_the_languages([
    'raw' => 1,
    'hide_if_empty' => 0
  ]);

  if (empty($languages)) {
    return '';
  }

  $current_lang = null;
  $other_langs = [];

  foreach ($languages as $lang) {
    if ($lang['current_lang']) {
      $current_lang = $lang;
    } else {
      $other_langs[] = $lang;
    }
  }

  if (count($languages) !== 2) {
    return '';
  }

  $other_lang = $other_langs[0];

  ob_start();
?>
  <!-- ========== Button circle change language button ========== -->
  <button id="js-polylang-circle-change-language" class="cs-polylang-circle-change-language" data-current-lang="<?php echo esc_attr($current_lang['slug']); ?>" data-target-lang="<?php echo esc_attr($other_lang['slug']); ?>" data-target-url="<?php echo esc_url($other_lang['url']); ?>">
    <span id="js-polylang-circle-current-flag" class="lang-flag-current">
          <?php echo qhw_get_flag_svg($current_lang['slug']); ?>
        </span>

    <span id="js-polylang-circle-target-flag" class="lang-flag-target">
      <?php echo qhw_get_flag_svg($other_lang['slug']); ?>
              </span>
  </button>

  <!-- ========== Button circle change language script ========== -->
  <script>
    jQuery(document).ready(function($) {
      $('#js-polylang-circle-change-language').click(function() {
        const $button = $(this);
        
        if ($button.hasClass('flipping')) return;

        $button.addClass('flipping');
        
        setTimeout(function() {
          $button.toggleClass('flipped');
          
          $button.removeClass('flipping');
          
          setTimeout(function() {
            const targetUrl = $button.data('target-url');
            if (targetUrl) {
              window.location.href = targetUrl;
            }
          }, 100);
        }, 100);
      });
    });
  </script>

  <!-- ========== Button circle change language styles ========== -->
  <style>
    .cs-polylang-circle-change-language {
      position: relative;
      overflow: hidden;
      border-radius: 50%;
      width: 35px;
      height: 35px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all .3s cubic-bezier(.4, 0, .2, 1);
      background-color: var(--color-primary-bg);
      border: none;
    }

    .cs-polylang-circle-change-language .lang-flag-current,
    .cs-polylang-circle-change-language .lang-flag-target {
      position: absolute;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: transform .2s ease-in-out;
      backface-visibility: hidden;
    }

    .cs-polylang-circle-change-language .lang-flag-current svg,
    .cs-polylang-circle-change-language .lang-flag-target svg {
      width: 100%;
      height: 100%;
    }

    .cs-polylang-circle-change-language:hover {
      box-shadow: 0 0 20px 0 rgba(39, 59, 226, 0.3);
    }

    /* Initial state - Current flag visible, Target flag hidden */
    .cs-polylang-circle-change-language:not(.flipped) .lang-flag-current {
      transform: rotateY(0deg);
    }

    .cs-polylang-circle-change-language:not(.flipped) .lang-flag-target {
      transform: rotateY(180deg);
    }

    /* Animation states - both icons rotate to 90deg during flip */
    .cs-polylang-circle-change-language.flipping .lang-flag-current {
      transform: rotateY(90deg);
    }

    .cs-polylang-circle-change-language.flipping .lang-flag-target {
      transform: rotateY(90deg);
    }

    /* After flip - Current flag hidden, Target flag visible */
    .cs-polylang-circle-change-language.flipped .lang-flag-current {
      transform: rotateY(180deg);
    }

    .cs-polylang-circle-change-language.flipped .lang-flag-target {
      transform: rotateY(0deg);
    }
  </style>
<?php
  return ob_get_clean();
}

function qhw_custom_polylang_langswitcher_mobile()
{
  if (!function_exists('pll_the_languages')) {
    return '';
  }

  $languages = pll_the_languages([
    'raw' => 1,
    'hide_if_empty' => 0
  ]);

  if (empty($languages)) {
    return '';
  }

  $current_lang = null;
  $other_langs = [];

  foreach ($languages as $lang) {
    if ($lang['current_lang']) {
      $current_lang = $lang;
    } else {
      $other_langs[] = $lang;
    }
  }

  if (count($languages) !== 2) {
    return '';
  }

  $vi_url = '#';
  $en_url = '#';
  
  foreach ($languages as $lang) {
    if ($lang['slug'] === 'vi') {
      $vi_url = $lang['url'];
    } elseif ($lang['slug'] === 'en') {
      $en_url = $lang['url'];
    }
  }

  ob_start();
?>
  <!-- ========== Language flags container mobile ========== -->
  <div id="js-polylang-language-flags-mobile" class="lg:hidden cs-polylang-language-flags-mobile">
    <button id="js-polylang-button-circle-change-language-vn-mobile" 
            class="cs-polylang-button-circle-change-language-mobile <?php echo $current_lang['slug'] === 'vi' ? 'active' : ''; ?>"
            data-lang="vi" 
            data-url="<?php echo esc_url($current_lang['slug'] === 'vi' ? '#' : $vi_url); ?>">
      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 1000 1000" style="enable-background:new 0 0 512 512" xml:space="preserve">
        <g>
          <clipPath id="polylang-vn-mobile">
            <circle cx="500" cy="500" r="500" fill="#000000" opacity="1" data-original="#000000"></circle>
          </clipPath>
          <path fill="#da251d" d="M-250 0h1500v1000H-250z" clip-path="url(#polylang-vn-mobile)" opacity="1" data-original="#da251d"></path>
          <path fill="#ffff00" d="m608.984 535.41 176.335-128.118H567.354L500 200l-67.355 207.292H214.681L391.016 535.41l-67.351 207.298L500 614.585l176.335 128.123z" clip-path="url(#polylang-vn-mobile)" opacity="1" data-original="#ffff00"></path>
        </g>
      </svg>
    </button>

    <button id="js-polylang-button-circle-change-language-en-mobile" 
            class="cs-polylang-button-circle-change-language-mobile <?php echo $current_lang['slug'] === 'en' ? 'active' : ''; ?>"
            data-lang="en" 
            data-url="<?php echo esc_url($current_lang['slug'] === 'en' ? '#' : $en_url); ?>">
      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 1000 1000" style="enable-background:new 0 0 512 512" xml:space="preserve">
        <g>
          <clipPath id="polylang-en-mobile">
            <circle cx="500" cy="500" r="500" fill="#000000" opacity="1" data-original="#000000"></circle>
          </clipPath>
          <path fill="#00247d" d="M-255.826-62.524h1511.651v1123.81H-255.826z" clip-path="url(#polylang-en-mobile)" opacity="1" data-original="#00247d"></path>
          <path fill="#ffffff" d="m1086.599 1061.281-586.601-436.26-587.018 436.26h-168.806V935.338l586.818-435.957-586.818-436.55V-62.524h168.811l587.013 436.257 586.61-436.257h169.217V62.812L669.006 499.381l586.819 435.928v125.972z" clip-path="url(#polylang-en-mobile)" opacity="1" data-original="#ffffff"></path>
          <path fill="#cf142b" d="M-143.354 1061.281h-112.472L444.08 537.812-255.826 21.241v-83.765l701.673 518.401L1143.15-62.524h112.675L553.984 456.022l701.841 521.495v83.764L558.491 539.652z" clip-path="url(#polylang-en-mobile)" opacity="1" data-original="#cf142b"></path>
          <path fill="#ffffff" d="M637.207 1095H362.794V636.585h-686.033v-274.41h686.033V-85h274.413v447.175h686.035v274.41H637.207z" clip-path="url(#polylang-en-mobile)" opacity="1" data-original="#ffffff"></path>
          <path fill="#cf142b" d="M582.325 1095h-164.65V581.706h-740.914V417.058h740.914V-85h164.65v502.058h740.917v164.648H582.325z" clip-path="url(#polylang-en-mobile)" opacity="1" data-original="#cf142b"></path>
        </g>
      </svg>
    </button>
  </div>

  <!-- ========== Language flags script mobile ========== -->
  <script>
    jQuery(document).ready(function($) {
      $('#js-polylang-button-circle-change-language-vn-mobile').click(function(e) {
        e.preventDefault();
        const $button = $(this);
        const $container = $button.closest('.cs-polylang-language-flags-mobile');
        const targetUrl = $button.data('url');
        
        $container.find('.cs-polylang-button-circle-change-language-mobile').removeClass('active');
        
        $button.addClass('active');
        
        if (targetUrl && targetUrl !== '#') {
          window.location.href = targetUrl;
        }
      });
      
      $('#js-polylang-button-circle-change-language-en-mobile').click(function(e) {
        e.preventDefault();
        const $button = $(this);
        const $container = $button.closest('.cs-polylang-language-flags-mobile');
        const targetUrl = $button.data('url');
        
        $container.find('.cs-polylang-button-circle-change-language-mobile').removeClass('active');
        
        $button.addClass('active');
        
        if (targetUrl && targetUrl !== '#') {
          window.location.href = targetUrl;
        }
      });
    });
  </script>

  <!-- ========== Language flags styles mobile ========== -->
  <style>
    .cs-polylang-language-flags-mobile {
      display: none;
      gap: 8px;
      margin: 16px 0;
    }

    @media (max-width: 1023px) {
      .cs-polylang-language-flags-mobile {
        display: flex;
      }
    }

    .cs-polylang-button-circle-change-language-mobile {
      position: relative;
      border-radius: 50%;
      width: 35px;
      height: 35px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all .3s cubic-bezier(.4, 0, .2, 1);
      background-color: var(--color-primary-bg);
      border: none;
      padding: 0;
    }

    .cs-polylang-button-circle-change-language-mobile svg {
      width: 100%;
      height: 100%;
      transition: transform .2s ease-in-out;
    }

    .cs-polylang-button-circle-change-language-mobile:hover {
      box-shadow: 0 0 20px 0 rgba(39, 59, 226, 0.3);
      transform: scale(1.1);
    }

    .cs-polylang-button-circle-change-language-mobile:active {
      transform: scale(0.95);
    }

    .cs-polylang-button-circle-change-language-mobile.active {
      box-shadow: 0 0 15px 0 rgba(39, 59, 226, 0.5);
      transform: scale(1.05);
    }
  </style>
<?php
  return ob_get_clean();
}

add_shortcode('qhw_polylang_langswitcher', 'qhw_custom_polylang_langswitcher');
add_shortcode('qhw_polylang_langswitcher_mobile', 'qhw_custom_polylang_langswitcher_mobile');

add_action('init', function () {
  pll_register_string('qhw-see-details', 'Xem chi tiết', 'QUOCHOANGWEB');
  pll_register_string('qhw-copyright', 'Copyright', 'QUOCHOANGWEB');
  pll_register_string('qhw-brand-name', 'Brand name', 'QUOCHOANGWEB');
  pll_register_string('qhw-see-more', 'Xem thêm', 'QUOCHOANGWEB');
  pll_register_string('qhw-collapse', 'Thu gọn', 'QUOCHOANGWEB');
});

function qhw_get_multi_lang_option($field_name)
{
  if (!function_exists('pll_current_language') || pll_current_language() == 'vi') {
    return get_field($field_name, 'option');
  } else {
    return get_field($field_name . '_' . pll_current_language(), 'option');
  }
  // echo do_shortcode('[polylang_langswitcher]');
  // echo pll_e('Xem chi tiết'); 
  // echo pll_current_language() 
  // echo get_multi_lang_option('address'); 
}
?>