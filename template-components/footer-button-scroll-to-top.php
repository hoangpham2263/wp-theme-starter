<!-- ========== Scroll to top button ========== -->
<button class="scroll-to-top-button fixed bottom-40 right-0 z-40 transition-all duration-300 bg-red-500 shadow-lg rounded-l-full flex items-center justify-center hover:bg-red-600 cursor-pointer opacity-100 translate-x-0 p-2" 
        onclick="scrollToTop()"
        aria-label="Cuộn lên đầu trang"
        title="Cuộn lên đầu trang">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 lg:size-8 text-white" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
  </svg>
  <span class="scroll-tooltip">Lên đầu</span>
</button>

<!-- ========== Scroll to top button styles ========== -->
<style data-name="scroll-to-top-button">
  .scroll-tooltip {
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

  .scroll-tooltip::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 100%;
    transform: translateY(-50%);
    border-width: 6px 0 6px 6px;
    border-style: solid;
    border-color: transparent transparent transparent rgba(255, 255, 255, 0.95);
  }

  .scroll-to-top-button:hover .scroll-tooltip {
    opacity: 1;
    visibility: visible;
    transform: translateY(50%) translateX(0);
  }
</style>

<!-- ========== Scroll to top button script ========== -->
<script data-name="scroll-to-top-button">
  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }
  
  let lastScrollY = window.scrollY;
  
  window.addEventListener('scroll', function() {
    let currentScrollY = window.scrollY;
    const scrollTop = document.querySelector('.scroll-to-top-button');
    if (currentScrollY > 100) {
      scrollTop.classList.remove('opacity-0', 'translate-x-10');
      scrollTop.classList.add('opacity-100', 'translate-x-0');
    } else {
      scrollTop.classList.remove('opacity-100', 'translate-x-0');
      scrollTop.classList.add('opacity-0', 'translate-x-10');
    }
    lastScrollY = currentScrollY;
  });

  document.addEventListener('DOMContentLoaded', function() {
    const scrollTop = document.querySelector('.scroll-to-top-button');
    if (window.scrollY <= 100) {
      scrollTop.classList.remove('opacity-100', 'translate-x-0');
      scrollTop.classList.add('opacity-0', 'translate-x-10');
    }
  });
</script>
