<!-- ========== Button link to contact button ========== -->
<?php
$header_contact = get_field('header_contact', 'option');
$link_to_contact = is_array($header_contact) && !empty($header_contact['link']) ? $header_contact['link'] : home_url('/lien-he');
$button_text    = is_array($header_contact) && !empty($header_contact['label']) ? $header_contact['label'] : 'Liên hệ';
$title          = 'Liên hệ QUOCHOANGIT - Thiết kế website WordPress chuyên nghiệp';
?>
<a href="<?php echo esc_url($link_to_contact); ?>" 
   class="cs-button-link-to-contact" 
 aria-label="<?php echo esc_attr($title); ?>"
   title="<?php echo esc_attr($title); ?>">
  <span class="button-text"><?php echo esc_html($button_text); ?></span>
</a>

<!-- ========== Button link to contact styles ========== -->
<style data-name="button-link-to-contact">
  .cs-button-link-to-contact {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    z-index: 0;
    background-color: var(--color-primary-bg);
    color: #ffffff;
    padding: 5.5px 20px;
    border-radius: 9999px;
    text-transform: uppercase;
    font-weight: 600;
    cursor: pointer;
    transition: all .3s cubic-bezier(.4, 0, .2, 1);
    text-decoration: none;
  }

  .cs-button-link-to-contact::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    z-index: 0;
    transition: all .3s cubic-bezier(.4, 0, .2, 1);
    background: radial-gradient(100.99% 141.42% at 100% 0, var(--color-primary) 0, var(--color-secondary) 100%);
    width: 100%;
    height: 100%;
    border-radius: inherit;
  }

  @keyframes pulse-primary {
    0% {
      transform: scale(0.95);
      box-shadow: 0 0 0 0 rgba(39, 59, 226, 0.7);
    }
    70% {
      transform: scale(1);
      box-shadow: 0 0 0 14px rgba(39, 59, 226, 0);
    }
    100% {
      transform: scale(0.95);
      box-shadow: 0 0 0 0 rgba(39, 59, 226, 0);
    }
  }

  .cs-button-link-to-contact::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: inherit;
    animation: pulse-primary 2s infinite;
    pointer-events: none;
    z-index: -1;
  }

  .cs-button-link-to-contact .button-text {
    position: relative;
    z-index: 1;
    font-weight: 600;
  }

  .cs-button-link-to-contact:hover {
    box-shadow: 0 0 20px 0 rgba(39, 59, 226, 0.3);
  }
  
  .cs-button-link-to-contact:hover::before {
    opacity: 1;
  }

  /* Responsive design */
  @media (max-width: 768px) {
    .cs-button-link-to-contact {
      padding: 4px 16px;
      font-size: 14px;
    }
  }

  @media (max-width: 480px) {
    .cs-button-link-to-contact {
      padding: 3px 12px;
      font-size: 12px;
    }
  }
</style>