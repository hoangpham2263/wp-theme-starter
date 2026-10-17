<!-- ========== Button link to contact mobile button ========== -->
<?php
$header_contact = get_field('header_contact', 'option');
$link_to_contact = is_array($header_contact) && !empty($header_contact['link']) ? $header_contact['link'] : home_url('/lien-he');
$button_label   = is_array($header_contact) && !empty($header_contact['label']) ? $header_contact['label'] : 'Liên hệ';
$title_contact  = 'Liên hệ QUOCHOANGIT - Thiết kế website WordPress chuyên nghiệp';
?>
<a href="<?php echo esc_url($link_to_contact); ?>" 
   class="button-link-to-contact-mobile"
   title="<?php echo esc_attr($title_contact); ?>"
   aria-label="<?php echo esc_attr($title_contact); ?>"
   rel="nofollow">
  <?php echo esc_html($button_label); ?>
</a>

<!-- ========== Button link to contact mobile styles ========== -->
<style data-name="button-link-to-contact-mobile">
  .button-link-to-contact-mobile {
    position: relative;
    text-decoration: none;
    transition: .4s ease all;
    color: #ffffff;
    font-weight: 200;
    font-size: 20px;
    cursor: pointer;
  }

  .button-link-to-contact-mobile::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    height: 0.5px;
    width: 0%;
    background: #ffffff;
    transition: .4s ease all;
  }

  .button-link-to-contact-mobile:hover::after {
    width: 100%;
  }
</style>