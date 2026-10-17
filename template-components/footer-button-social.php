<?php
// ========== Social links configuration ==========
$facebook_username = 'quochoangidx';
$youtube_username = 'quochoangidx';
$zalo_phone_number = '0900000000';
$contact_phone_number = '0900000000';
?>

<div class="hidden lg:flex social-buttons-container fixed bottom-80 right-0 z-40 flex-col gap-3">
  <!-- Facebook link button -->
  <a href="https://www.facebook.com/<?php echo $facebook_username; ?>" 
     target="_blank" 
     rel="noopener noreferrer"
     class="cs-button-social cs-button-social-facebook" 
     aria-label="Trang Facebook QUOCHOANGWEB - Thiết kế website WordPress chuyên nghiệp"
     title="Trang Facebook QUOCHOANGWEB - Thiết kế website WordPress chuyên nghiệp">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="social-icon" aria-hidden="true">
      <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
    </svg>
    <span class="cs-tooltip">Facebook</span>
  </a>

  <!-- YouTube link button -->
  <a href="https://www.youtube.com/@<?php echo $youtube_username; ?>" 
     target="_blank" 
     rel="noopener noreferrer"
     class="cs-button-social cs-button-social-youtube" 
     aria-label="Kênh YouTube QUOCHOANGWEB - Thiết kế website WordPress chuyên nghiệp"
     title="Kênh YouTube QUOCHOANGWEB - Thiết kế website WordPress chuyên nghiệp">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="social-icon" aria-hidden="true">
      <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
    </svg>
    <span class="cs-tooltip">YouTube</span>
  </a>

  <!-- Zalo phone number button -->
  <a href="https://zalo.me/<?php echo $zalo_phone_number; ?>" 
     target="_blank" 
     rel="noopener noreferrer"
     class="cs-button-social cs-button-social-zalo" 
     aria-label="Liên hệ Zalo QUOCHOANGWEB - Thiết kế website WordPress chuyên nghiệp"
     title="Liên hệ Zalo QUOCHOANGWEB - Thiết kế website WordPress chuyên nghiệp">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="social-icon" aria-hidden="true">
      <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.64-.203-.658-.64.135-.954l11.566-4.458c.538-.196 1.006.128.832.941z"/>
    </svg>
    <span class="cs-tooltip">Zalo</span>
  </a>

  <!-- Contact phone number button -->
  <a href="tel:<?php echo $contact_phone_number; ?>" 
     class="cs-button-social cs-button-social-phone" 
     aria-label="Gọi điện thoại QUOCHOANGWEB - Thiết kế website WordPress chuyên nghiệp"
     title="Gọi điện thoại QUOCHOANGWEB - Thiết kế website WordPress chuyên nghiệp">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="social-icon" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
    </svg>
    <span class="cs-tooltip">Gọi ngay</span>
  </a>
</div>

<!-- ========== Social buttons styles ========== -->
<style data-name="social-buttons-styles">
  .cs-button-social {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    border: none;
    outline: none;
    cursor: pointer;
    transition: all .3s cubic-bezier(.4, 0, .2, 1);
    color: #ffffff;
    font-family: inherit;
    text-transform: uppercase;
    font-weight: 600;
    z-index: 0;
    text-decoration: none;
  }

  .cs-button-social-facebook { background-color: rgba(59, 130, 246, 0.8); }
  .cs-button-social-youtube { background-color: rgba(220, 38, 38, 0.8); }
  .cs-button-social-zalo { background-color: rgba(59, 130, 246, 0.8); }
  .cs-button-social-phone { background-color: rgba(22, 163, 74, 0.8); }

  .cs-button-social-facebook,
  .cs-button-social-youtube,
  .cs-button-social-zalo,
  .cs-button-social-phone {
    backdrop-filter: blur(8px) saturate(1.2);
  }

  .cs-button-social-facebook::before { background: radial-gradient(100.99% 141.42% at 100% 0, #1d4ed8 0, #1e40af 100%); }
  .cs-button-social-youtube::before { background: radial-gradient(100.99% 141.42% at 100% 0, #b91c1c 0, #991b1b 100%); }
  .cs-button-social-zalo::before { background: radial-gradient(100.99% 141.42% at 100% 0, #1d4ed8 0, #1e40af 100%); }
  .cs-button-social-phone::before { background: radial-gradient(100.99% 141.42% at 100% 0, #15803d 0, #166534 100%); }

  .cs-button-social::before,
  .cs-button-social::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 50%;
  }

  .cs-button-social::before {
    opacity: 0;
    z-index: 0;
    transition: all .3s cubic-bezier(.4, 0, .2, 1);
  }

  .cs-button-social::after {
    animation: pulse-red 2s infinite;
    pointer-events: none;
    z-index: -1;
  }

  .social-icon {
    width: 24px;
    height: 24px;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease;
  }

  .cs-button-social:hover {
    box-shadow: 0 0 20px 0 rgba(255, 82, 82, 0.3);
  }

  .cs-button-social:hover::before {
    opacity: 1;
  }

  .cs-button-social:hover .social-icon {
    transform: scale(1.1);
  }

  .cs-button-social:active {
    transform: scale(0.95);
  }

  .cs-tooltip {
    position: absolute;
    bottom: 50%;
    right: calc(100% + 8px);
    transform: translateY(50%) translateX(4px);
    padding: 6px 10px;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    color: var(--color-primary-text);
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: saturate(1.2) blur(4px);
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: opacity .2s ease, transform .2s ease;
    z-index: 2;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  }

  .cs-tooltip::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 100%;
    transform: translateY(-50%);
    border-width: 6px 0 6px 6px;
    border-style: solid;
    border-color: transparent transparent transparent rgba(255, 255, 255, 0.95);
  }

  .cs-button-social:hover .cs-tooltip {
    opacity: 1;
    visibility: visible;
    transform: translateY(50%) translateX(0);
  }

  @keyframes pulse-red {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 82, 82, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 14px rgba(255, 82, 82, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 82, 82, 0); }
  }
</style>