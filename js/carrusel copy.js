document.addEventListener("DOMContentLoaded", function () {
    const track = document.querySelector(".carousel-track");
    const slides = Array.from(track.children);
    const nextButton = document.querySelector(".carousel-button.next");
    const prevButton = document.querySelector(".carousel-button.prev");
    const indicators = document.querySelectorAll(".carousel-indicator");
    let currentIndex = 0;
    const slideWidth = slides[0].getBoundingClientRect().width;
    let autoSlideInterval;

    // Función para cambiar de slide
    function goToSlide(index) {
      track.style.transform = `translateX(-${index * slideWidth}px)`;
      slides.forEach((slide) => slide.classList.remove("current-slide"));
      slides[index].classList.add("current-slide");

      // Actualizar indicadores
      indicators.forEach((indicator) => indicator.classList.remove("active"));
      indicators[index].classList.add("active");

      currentIndex = index;
    }

    // Función para avanzar automáticamente
    function startAutoSlide() {
      autoSlideInterval = setInterval(() => {
        let nextIndex = (currentIndex + 1) % slides.length;
        goToSlide(nextIndex);
      }, 3000); // Cambia cada 3 segundos
    }

    // Función para detener el auto-slide al interactuar
    function stopAutoSlide() {
      clearInterval(autoSlideInterval);
    }

    // Avanzar al siguiente slide manualmente
    nextButton.addEventListener("click", () => {
      let nextIndex = (currentIndex + 1) % slides.length;
      goToSlide(nextIndex);
      stopAutoSlide();
      startAutoSlide();
    });

    // Volver al slide anterior manualmente
    prevButton.addEventListener("click", () => {
      let prevIndex = (currentIndex - 1 + slides.length) % slides.length;
      goToSlide(prevIndex);
      stopAutoSlide();
      startAutoSlide();
    });

    // Controlar los indicadores
    indicators.forEach((indicator, index) => {
      indicator.addEventListener("click", () => {
        goToSlide(index);
        stopAutoSlide();
        startAutoSlide();
      });
    });

    // Iniciar auto-slide
    startAutoSlide();
});