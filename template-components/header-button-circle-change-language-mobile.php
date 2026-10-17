<!-- ========== Language flags container ========== -->
<div id="js-language-flags-mobile" class="lg:hidden cs-language-flags-mobile">
  <!-- ========== Vietnamese ========== -->
  <button id="js-button-circle-change-language-vn-mobile" class="cs-button-circle-change-language-mobile">
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 1000 1000" style="enable-background:new 0 0 512 512" xml:space="preserve">
      <g>
        <clipPath id="a">
          <circle cx="500" cy="500" r="500" fill="#000000" opacity="1" data-original="#000000"></circle>
        </clipPath>
        <path fill="#da251d" d="M-250 0h1500v1000H-250z" clip-path="url(#a)" opacity="1" data-original="#da251d" class=""></path>
        <path fill="#ffff00" d="m608.984 535.41 176.335-128.118H567.354L500 200l-67.355 207.292H214.681L391.016 535.41l-67.351 207.298L500 614.585l176.335 128.123z" clip-path="url(#a)" opacity="1" data-original="#ffff00" class=""></path>
      </g>
    </svg>
  </button>

  <!-- ========== English ========== -->
  <button id="js-button-circle-change-language-en-mobile" class="cs-button-circle-change-language-mobile">
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 1000 1000" style="enable-background:new 0 0 512 512" xml:space="preserve">
      <g>
        <clipPath id="b">
          <circle cx="500" cy="500" r="500" fill="#000000" opacity="1" data-original="#000000"></circle>
        </clipPath>
        <path fill="#00247d" d="M-255.826-62.524h1511.651v1123.81H-255.826z" clip-path="url(#b)" opacity="1" data-original="#00247d"></path>
        <path fill="#ffffff" d="m1086.599 1061.281-586.601-436.26-587.018 436.26h-168.806V935.338l586.818-435.957-586.818-436.55V-62.524h168.811l587.013 436.257 586.61-436.257h169.217V62.812L669.006 499.381l586.819 435.928v125.972z" clip-path="url(#b)" opacity="1" data-original="#ffffff" class=""></path>
        <path fill="#cf142b" d="M-143.354 1061.281h-112.472L444.08 537.812-255.826 21.241v-83.765l701.673 518.401L1143.15-62.524h112.675L553.984 456.022l701.841 521.495v83.764L558.491 539.652z" clip-path="url(#b)" opacity="1" data-original="#cf142b" class=""></path>
        <path fill="#ffffff" d="M637.207 1095H362.794V636.585h-686.033v-274.41h686.033V-85h274.413v447.175h686.035v274.41H637.207z" clip-path="url(#b)" opacity="1" data-original="#ffffff" class=""></path>
        <path fill="#cf142b" d="M582.325 1095h-164.65V581.706h-740.914V417.058h740.914V-85h164.65v502.058h740.917v164.648H582.325z" clip-path="url(#b)" opacity="1" data-original="#cf142b" class=""></path>
      </g>
    </svg>
  </button>
</div>

<!-- ========== Language flags styles ========== -->
<style data-name="language-flags-mobile">
  .cs-language-flags-mobile {
    display: flex;
    gap: 8px;
    margin: 16px 0;
  }

  .cs-button-circle-change-language-mobile {
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

  .cs-button-circle-change-language-mobile svg {
    width: 100%;
    height: 100%;
    transition: transform .2s ease-in-out;
  }

  .cs-button-circle-change-language-mobile:hover {
    box-shadow: 0 0 20px 0 rgba(39, 59, 226, 0.3);
    transform: scale(1.1);
  }

  .cs-button-circle-change-language-mobile:active {
    transform: scale(0.95);
  }

  /* Active state for selected language */
  .cs-button-circle-change-language-mobile.active {
    box-shadow: 0 0 15px 0 rgba(39, 59, 226, 0.5);
    transform: scale(1.05);
  }

</style>

<!-- ========== Language flags script ========== -->
<script data-name="language-flags-mobile">
  jQuery(document).ready(function($) {
    // Vietnamese button click
    $('#js-button-circle-change-language-vn-mobile').click(function() {
      const $button = $(this);
      const $container = $button.closest('.cs-language-flags-mobile');
      
      // Remove active class from all buttons
      $container.find('.cs-button-circle-change-language-mobile').removeClass('active');
      
      // Add active class to clicked button
      $button.addClass('active');
      
      // Add your language switching logic here
      console.log('Switching to Vietnamese');
    });
    
    // English button click
    $('#js-button-circle-change-language-en-mobile').click(function() {
      const $button = $(this);
      const $container = $button.closest('.cs-language-flags-mobile');
      
      // Remove active class from all buttons
      $container.find('.cs-button-circle-change-language-mobile').removeClass('active');
      
      // Add active class to clicked button
      $button.addClass('active');
      
      // Add your language switching logic here
      console.log('Switching to English');
    });
  });
</script>