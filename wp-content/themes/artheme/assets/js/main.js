(function () {
  "use strict";

  /**
   * Inicjalizacja wszystkich skryptów po załadowaniu DOM.
   */
  document.addEventListener("DOMContentLoaded", () => {
    initScrollSpy();
    initParallax();
    initjQueryScripts();
    initScrollerAnimation();
    initCounterAnimation();
    initScrollAnimation();
    initTestimonials();
    initEmbedWrapper();
    initHamburger();
  });

  /**
   * Inicjalizacja hamburgera w nagłówku - animacja przełączająca ikonę w "X".
   */
  function initHamburger() {
    const hamburger = document.getElementById("hamburger");
    const menu = document.getElementById("navbarNav");

    if (hamburger && menu) {
      hamburger.addEventListener("click", function () {
        this.classList.toggle("active");
        menu.classList.toggle("show");
      });

      // Zamykanie menu po kliknięciu w link
      const menuLinks = menu.getElementsByTagName("a");
      Array.from(menuLinks).forEach((link) => {
        link.addEventListener("click", () => {
          hamburger.classList.remove("active");
          menu.classList.remove("show");
        });
      });
    }
  }

  /**
   * Inicjalizacja Bootstrap ScrollSpy.
   */
  function initScrollSpy() {
    const scrollSpyOptions = {
      target: "#navbarNav",
      offset: 0,
    };
    new bootstrap.ScrollSpy(document.body, scrollSpyOptions);
  }

  /**
   * Inicjalizacja efektu parallax dla elementu z klasą .parallax-image.
   */
  function initParallax() {
    const parallaxImage = document.querySelector(".parallax-image");
    if (!parallaxImage) return;

    const handleParallax = () => {
      const scrollPosition = window.pageYOffset;
      parallaxImage.style.transform = `translateY(${scrollPosition * 0.5}px)`;
    };

    // Uruchomienie efektu przy załadowaniu strony i podczas scrollowania
    handleParallax();
    window.addEventListener("scroll", handleParallax);
  }

  /**
   * Inicjalizacja skryptów opartych o jQuery (jeśli jQuery jest załadowane).
   */
  function initjQueryScripts() {
    if (window.jQuery) {
      (function ($) {
        const scripts = {
          init: function () {
            this.sticky();
            this.scrollTo();
          },
          consts: {
            containers: $(".container"),
          },
          sticky: function () {
            $(window).on("scroll", function () {
              // Przykładowy kod do dodania/usuń klasy przy scrollowaniu
              // if ($(window).scrollTop() >= someValue) {
              //   // np. dodaj klasę 'fixed-tabs'
              // } else {
              //   // usuń klasę 'fixed-tabs'
              // }
            });
          },
          scrollTo: function () {
            $(document).on("click", "", function () {
              // Przykładowa animacja przewijania:
              // $("html, body").animate({ scrollTop: targetPosition }, 350);
            });
          },
        };

        $(function () {
          scripts.init();
        });
      })(jQuery);
    }
  }

  /**
   * Dodanie animacji dla elementów z klasą .scroller,
   * o ile użytkownik nie wybrał opcji zredukowanego ruchu.
   */
  function initScrollerAnimation() {
    const scrollers = document.querySelectorAll(".scroller");
    if (!scrollers.length) return;
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

    scrollers.forEach((scroller) => {
      scroller.setAttribute("data-animated", "true");

      const scrollerInner = scroller.querySelector(".scroller_inner");
      if (!scrollerInner) return;

      // Duplikujemy każde dziecko w celu stworzenia efektu nieskończonego scrollowania
      Array.from(scrollerInner.children).forEach((item) => {
        const duplicate = item.cloneNode(true);
        duplicate.setAttribute("aria-hidden", "true");
        scrollerInner.appendChild(duplicate);
      });
    });
  }

  /**
   * Animowany licznik, który zwiększa wartość od 0 do docelowej,
   * gdy element staje się widoczny.
   */
  function initCounterAnimation() {
    const countElem = document.querySelector("[data-count]");
    if (!countElem) return;

    const targetCount = parseInt(countElem.getAttribute("data-count"), 10);
    const duration = 800; // czas trwania animacji w ms
    let animationStarted = false;
    const visibilityThreshold = 0.4;

    const animateCounter = (timestamp, startTime) => {
      const elapsed = timestamp - startTime;
      const progress = Math.min(elapsed / duration, 1);
      countElem.innerText = Math.floor(progress * targetCount);
      if (progress < 1) {
        requestAnimationFrame((ts) => animateCounter(ts, startTime));
      } else {
        countElem.innerText = targetCount;
      }
    };

    const observer = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (
            entry.intersectionRatio >= visibilityThreshold &&
            !animationStarted
          ) {
            animationStarted = true;
            requestAnimationFrame((ts) => animateCounter(ts, ts));
            observer.unobserve(countElem);
          }
        });
      },
      { threshold: visibilityThreshold }
    );

    observer.observe(countElem);
  }

  /**
   * Dodaje klasę 'animate' do elementów z klasą .animate-on-scroll,
   * gdy osiągną zadany próg widoczności.
   */
  function initScrollAnimation() {
    const visibilityThreshold = 0.3;
    const animElements = document.querySelectorAll(".animate-on-scroll");
    if (!animElements.length) return;

    const observer = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.intersectionRatio >= visibilityThreshold) {
            entry.target.classList.add("animate");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: visibilityThreshold }
    );

    animElements.forEach((el) => observer.observe(el));
  }

  /**
   * Prosty slider dla testimoniali, zmieniający aktywny element co 5 sekund.
   */
  function initTestimonials() {
    const testimonials = document.querySelectorAll(".testimonial-item");
    if (!testimonials.length) return;

    let currentIndex = 0;
    const total = testimonials.length;
    const intervalTime = 5000;

    const showNextTestimonial = () => {
      const current = testimonials[currentIndex];
      current.classList.remove("active");
      current.classList.add("slide-out-left");

      // Usunięcie klasy animacyjnej po zakończeniu przejścia (0.5s)
      setTimeout(() => {
        current.classList.remove("slide-out-left");
      }, 500);

      currentIndex = (currentIndex + 1) % total;
      testimonials[currentIndex].classList.add("active");
    };

    setInterval(showNextTestimonial, intervalTime);
  }

  /**
   * Funkcja opakowująca figure z embedem w link umożliwiający odpalanie autoplay.
   */
  function initEmbedWrapper() {
    /**
     * Opakowuje każdy element pasujący do selektora figure w link,
     * dodając do URL parametr autoplay=1.
     *
     * @param {string} selector - selektor elementów figure
     * @param {string} linkClass - klasa dodawana do linku
     */
    function wrapEmbedWithLink(selector, linkClass) {
      const embedFigures = document.querySelectorAll(selector);
      embedFigures.forEach((figure) => {
        const iframe = figure.querySelector("iframe");
        if (!iframe) return;

        let videoUrl = iframe.src;
        videoUrl += videoUrl.includes("?") ? "&autoplay=1" : "?autoplay=1";

        if (figure.parentElement.tagName.toLowerCase() !== "a") {
          const link = document.createElement("a");
          link.href = videoUrl;
          link.classList.add(linkClass);
          figure.parentNode.insertBefore(link, figure);
          link.appendChild(figure);
        }
      });
    }

    // Opakowanie embedów YouTube i Vimeo
    wrapEmbedWithLink("figure.wp-block-embed-youtube", "fancybox-youtube");
    wrapEmbedWithLink("figure.wp-block-embed-vimeo", "fancybox-vimeo");
  }
})();
