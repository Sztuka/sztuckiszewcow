document.addEventListener("DOMContentLoaded", function () {
  var scrollSpyElement = document.body;
  var scrollSpyOptions = {
    target: "#navbarNav",
    offset: 70,
  };

  var scrollSpyInstance = new bootstrap.ScrollSpy(
    scrollSpyElement,
    scrollSpyOptions
  );
});

// Function to handle parallax scrolling
function handleParallax() {
  var parallaxImage = document.querySelector(".parallax-image");
  if (parallaxImage) {
    var scrollPosition = window.pageYOffset;
    parallaxImage.style.transform =
      "translateY(" + scrollPosition * 0.5 + "px)";
  }
}

// Initialize parallax on page load
document.addEventListener("DOMContentLoaded", function () {
  handleParallax();
});

// Update parallax on scroll
document.addEventListener("scroll", function () {
  handleParallax();
});

(function ($) {
  // Umożliwienie używania $ zamiast pisania jQuery
  $(document).ready(function () {
    // Inicjalizowanie skryptów po załadowaniu się całkowicie strony
    scripts.init();
  });

  const scripts = {
    // BEGIN EDIT HERE
    init: function () {
      this.sticky();
    },

    consts: {
      containers: $(".container"),
    },

    sticky: function () {
      $(window).scroll(function () {
        // Przykładowy kod do ewentualnego dodania klasy przy scrollowaniu
        // if ($(window).scrollTop() >= someValue) {
        //     scripts.consts.fixes.addClass('fixed-tabs');
        // } else {
        //     scripts.consts.fixes.removeClass('fixed-tabs');
        // }
      });
    },

    scrollTo: function () {
      $(document).on("click", "", function () {
        // Przykładowa animacja przewijania:
        // $("html, body").animate({
        //     scrollTop: scripts.consts.buttons.position,
        // }, 350, function () {
        //     scripts.consts.fixes.addClass('fixed-tabs');
        // });
      });
    },
    // END EDIT HERE
  };
})(jQuery);

const scrollers = document.querySelectorAll(".scroller");

// Jeśli użytkownik nie wybrał opcji zredukowanego ruchu, dodajemy animację
if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
  addAnimation();
}

function addAnimation() {
  scrollers.forEach((scroller) => {
    // Dodaj atrybut data-animated="true" do każdego elementu .scroller
    scroller.setAttribute("data-animated", true);

    // Utwórz tablicę z elementów znajdujących się wewnątrz .scroller-inner
    const scrollerInner = scroller.querySelector(".scroller_inner");
    const scrollerContent = Array.from(scrollerInner.children);

    // Dla każdego elementu w tablicy, sklonuj go,
    // dodaj atrybut aria-hidden i wstaw do .scroller-inner
    scrollerContent.forEach((item) => {
      const duplicatedItem = item.cloneNode(true);
      duplicatedItem.setAttribute("aria-hidden", true);
      scrollerInner.appendChild(duplicatedItem);
    });
  });
}

// -----------------------------
// Licznik lat doświadczenia - animacja od 0 do wartości z data-count (800ms)
// Rozpoczyna animację, gdy element jest widoczny w określonym procencie
// -----------------------------
document.addEventListener("DOMContentLoaded", function () {
  const countElem = document.querySelector("[data-count]");
  if (!countElem) return; // Jeśli element nie istnieje, zakończ działanie

  const targetCount = parseInt(countElem.getAttribute("data-count"), 10);
  const duration = 800; // Czas trwania animacji w milisekundach (800 ms)
  let animationStarted = false; // Flaga, aby animacja uruchomiła się tylko raz

  // Ustawienie progu widoczności (zmień wartość na 0.5 lub 0.8 w zależności od potrzeb)
  const visibilityThreshold = 0.8; // 0.5 = 50% widoczności, 0.8 = 80% widoczności itd.

  // Funkcja animująca licznik
  function animateCounter(timestamp, startTime) {
    const elapsedTime = timestamp - startTime;
    const progress = Math.min(elapsedTime / duration, 1); // Postęp animacji od 0 do 1
    countElem.innerText = Math.floor(progress * targetCount);
    if (progress < 1) {
      requestAnimationFrame((ts) => animateCounter(ts, startTime));
    } else {
      countElem.innerText = targetCount; // Upewnij się, że końcowa wartość jest dokładna
    }
  }

  // Używamy IntersectionObserver, aby wykryć, kiedy element osiąga określony próg widoczności
  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        // entry.intersectionRatio zwraca procent widoczności elementu (np. 0.5 oznacza 50%)
        if (
          entry.intersectionRatio >= visibilityThreshold &&
          !animationStarted
        ) {
          animationStarted = true;
          requestAnimationFrame(function (timestamp) {
            animateCounter(timestamp, timestamp);
          });
          observer.unobserve(countElem); // Przestajemy obserwować element
        }
      });
    },
    {
      threshold: visibilityThreshold, // Ustaw próg widoczności, np. 0.5 lub 0.8
    }
  );

  observer.observe(countElem);
});

// Testimonials
document.addEventListener("DOMContentLoaded", function () {
  const testimonials = document.querySelectorAll(".testimonial-item");
  if (testimonials.length === 0) return;

  let currentIndex = 0;
  const total = testimonials.length;
  const intervalTime = 5000; // 5000 ms = 5 sekund

  function showNextTestimonial() {
    const current = testimonials[currentIndex];
    // Rozpoczynamy animację wychodzenia - dodajemy klasę slide-out-left
    current.classList.remove("active");
    current.classList.add("slide-out-left");

    // Po zakończeniu animacji (500ms), usuń klasę slide-out-left z aktualnego elementu
    setTimeout(() => {
      current.classList.remove("slide-out-left");
    }, 500); // dopasuj do czasu transition (0.5s)

    // Obliczamy indeks następnego testimonial
    currentIndex = (currentIndex + 1) % total;
    const next = testimonials[currentIndex];
    // Ustawiamy następny testimonial jako aktywny
    next.classList.add("active");
  }

  setInterval(showNextTestimonial, intervalTime);
});

document.addEventListener("DOMContentLoaded", function () {
  // Funkcja opakowująca element figure z embedem w link
  function wrapEmbedWithLink(selector, linkClass) {
    var embedFigures = document.querySelectorAll(selector);
    embedFigures.forEach(function (figure) {
      var iframe = figure.querySelector("iframe");
      if (!iframe) return;

      // Pobieramy URL z atrybutu src iframe
      var videoUrl = iframe.src;

      // Dodajemy parametr autoplay=1 (możesz dostosować według potrzeb)
      if (videoUrl.indexOf("?") !== -1) {
        videoUrl += "&autoplay=1";
      } else {
        videoUrl += "?autoplay=1";
      }

      // Sprawdzamy, czy figure nie jest już opakowane
      if (figure.parentNode.tagName.toLowerCase() !== "a") {
        var link = document.createElement("a");
        link.href = videoUrl;
        link.classList.add(linkClass);
        // Wstaw link przed figure i przenieś figure do linka
        figure.parentNode.insertBefore(link, figure);
        link.appendChild(figure);
      }
    });
  }

  // Opakowujemy embedy YouTube i Vimeo
  wrapEmbedWithLink("figure.wp-block-embed-youtube", "fancybox-youtube");
  wrapEmbedWithLink("figure.wp-block-embed-vimeo", "fancybox-vimeo");
});
