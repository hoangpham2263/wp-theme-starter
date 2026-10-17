<!-- ========== Button circle facebook button ========== -->
<a href="https://www.facebook.com/quochoangidx" 
   target="_blank" 
   rel="noopener noreferrer" 
   title="Trang Facebook QUOCHOANGWEB - Thiết kế website WordPress chuyên nghiệp"
   aria-label="Mở trang Facebook QUOCHOANGWEB trong tab mới"
   class="cs-button-circle-facebook">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 155.139 155.139" class="size-5">
    <path d="M89.584 155.139V84.378h23.742l3.562-27.585H89.584V39.184c0-7.984 2.208-13.425 13.67-13.425l14.595-.006V1.08C115.325.752 106.661 0 96.577 0 75.52 0 61.104 12.853 61.104 36.452v20.341H37.29v27.585h23.814v70.761h28.48z" fill="#ffffff"></path>
  </svg>
</a>

<!-- ========== Button circle facebook styles ========== -->
<style data-name="button-circle-facebook">
  .cs-button-circle-facebook {
    position: relative;
    z-index: 2;
    transition: all .3s cubic-bezier(.4, 0, .2, 1);
    background-color: var(--color-primary-bg);
    overflow: hidden;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    cursor: pointer;
  }

  .cs-button-circle-facebook svg {
    height: 20px;
  }

  .cs-button-circle-facebook::before {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    z-index: -1;
    transition: all .3s cubic-bezier(.4, 0, .2, 1);
    background: radial-gradient(100.99% 141.42% at 100% 0, var(--color-primary) 0, var(--color-secondary) 100%);
    width: 100%;
    height: 100%;
    content: "";
  }

  .cs-button-circle-facebook:hover {
    box-shadow: 0 0 20px 0 rgba(39, 59, 226, 0.3);
  }

  .cs-button-circle-facebook:hover::before {
    opacity: 1;
  }
</style>