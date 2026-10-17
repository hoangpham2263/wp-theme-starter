<!-- ========== Typewriter button ========== -->
<div class="typewriter">
  <span class="typewriter-text" id="typewriter-text"></span>
  <span class="cursor">|</span>
</div>

<!-- ========== Typewriter styles ========== -->
<style data-name="typewriter">
  .typewriter {
    display: flex;
    align-items: center;
    position: relative;
    max-height: 42px;
  }

  .typewriter-text {
    display: inline-block;
    min-height: 42px;
    max-height: 42px;
    overflow: hidden;
  }

  .cursor {
    display: inline-block;
    animation: blink 0.5s infinite;
  }

  .cursor.typing {
    animation: none;
  }

  @keyframes blink {

    0%,
    50% {
      opacity: 1;
    }

    51%,
    100% {
      opacity: 0;
    }
  }
</style>

<!-- ========== Typewriter script ========== -->
<script data-name="typewriter">
  class TypewriterEffect {
    constructor(element, options = {}) {
      this.element = element;
      this.sentences = options.sentences || [];
      this.typeSpeed = options.typeSpeed || 100;
      this.deleteSpeed = options.deleteSpeed || 50;
      this.delayBetweenSentences = options.delayBetweenSentences || 2000;
      this.currentSentenceIndex = 0;
      this.isDeleting = false;
      this.currentText = '';
      this.cursor = document.querySelector('.cursor');

      this.init();
    }

    init() {
      if (this.sentences.length > 0) {
        this.type();
      }
    }

    type() {
      const currentSentence = this.sentences[this.currentSentenceIndex];

      if (!this.isDeleting) {
        this.currentText = currentSentence.substring(0, this.currentText.length + 1);
        this.cursor.classList.add('typing');
      } else {
        this.currentText = currentSentence.substring(0, this.currentText.length - 1);
      }

      this.element.textContent = this.currentText;

      let timeout = this.isDeleting ? this.deleteSpeed : this.typeSpeed;

      if (!this.isDeleting && this.currentText === currentSentence) {
        timeout = this.delayBetweenSentences;
        this.isDeleting = true;
        this.cursor.classList.remove('typing');
      } else if (this.isDeleting && this.currentText === '') {
        this.isDeleting = false;
        this.currentSentenceIndex = (this.currentSentenceIndex + 1) % this.sentences.length;
        timeout = 500;
      }

      setTimeout(() => this.type(), timeout);
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    const typewriterElement = document.getElementById('typewriter-text');

    const sentences = [
      'của bạn với Website Chuyên Nghiệp.',
      'của bạn với Giao Diện Hiện Đại.',
      'của bạn với Tối Ưu Chuyển Đổi.',
      'của bạn với Chuẩn SEO Vượt Trội.',
      'của bạn với Thương Hiệu Dẫn Đầu.'
    ];

    new TypewriterEffect(typewriterElement, {
      sentences: sentences,
      typeSpeed: 80,
      deleteSpeed: 40,
      delayBetweenSentences: 2000
    });
  });
</script>