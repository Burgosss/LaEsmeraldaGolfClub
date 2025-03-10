document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("language-modal");
  const languageSelector = document.getElementById("language-selector");
  const closeModal = document.getElementById("close-modal"); // Updated to match the ID
  const langButtons = document.querySelectorAll(".lang-btn");

  // Show modal when clicking "Language"
  languageSelector.addEventListener("click", function (event) {
    event.preventDefault();
    modal.classList.add("show"); // Use the show class from your CSS
  });

  // Close modal
  closeModal.addEventListener("click", () => {
    modal.classList.remove("show"); // Remove the show class instead
  });

  // Rest of your code remains the same...
  const translations = {
    en: {
      home: "Home",
      tips: "Tips",
      material: "Material",
      psychology: "Psychology",
      competition: "Competition",
      more: "More",
      services: "Services",
      memberships: "Memberships",
      language: "Language",
      explore: "Explore Our Stunning Facilities",
      golf_course: "Championship Golf Course",
      golf_course_desc: "Experience our award-winning 18-hole course",
      clubhouse: "Luxurious Clubhouse",
      clubhouse_desc: "Relax in our newly renovated facilities",
      fine_dining: "Fine Dining",
      fine_dining_desc: "Savor exceptional cuisine with panoramic views",
      expert_instruction: "Expert Instruction",
      expert_instruction_desc: "Improve your game with our PGA professionals",
      book: "Book a Tee Time",
    },
    es: {
      home: "Inicio",
      tips: "Consejos",
      material: "Material",
      psychology: "Psicología",
      competition: "Competencia",
      more: "Más",
      services: "Servicios",
      memberships: "Membresías",
      language: "Idioma",
      explore: "Explora Nuestras Impresionantes Instalaciones",
      golf_course: "Campo de Golf de Campeonato",
      golf_course_desc: "Disfruta de nuestro galardonado campo de 18 hoyos",
      clubhouse: "Casa Club de Lujo",
      clubhouse_desc: "Relájate en nuestras renovadas instalaciones",
      fine_dining: "Alta Cocina",
      fine_dining_desc: "Disfruta de una gastronomía excepcional con vistas panorámicas",
      expert_instruction: "Instrucción Experta",
      expert_instruction_desc: "Mejora tu juego con nuestros profesionales PGA",
      book: "Reserva tu Hora de Juego",
    },
  };

  // Cambiar idioma
  function changeLanguage(lang) {
    localStorage.setItem("lang", lang);
    document.querySelector(".nav-links li:nth-child(1) a").textContent = translations[lang].home;
    document.querySelector(".nav-links li:nth-child(2) a").textContent = translations[lang].tips;
    document.querySelector(".nav-links li:nth-child(3) a").textContent = translations[lang].material;
    document.querySelector(".nav-links li:nth-child(4) a").textContent = translations[lang].psychology;
    document.querySelector(".nav-links li:nth-child(5) a").textContent = translations[lang].competition;
    document.querySelector(".dropdown-toggle").textContent = translations[lang].more;
    document.querySelector(".dropdown-content a:nth-child(1)").textContent = translations[lang].services;
    document.querySelector(".dropdown-content a:nth-child(2)").textContent = translations[lang].memberships;
    document.querySelector(".dropdown-content a:nth-child(3)").textContent = translations[lang].language;

    document.querySelector(".section-header h2").textContent = translations[lang].explore;
    document.querySelector(".carousel-slide:nth-child(1) h2").textContent = translations[lang].golf_course;
    document.querySelector(".carousel-slide:nth-child(1) p").textContent = translations[lang].golf_course_desc;
    document.querySelector(".carousel-slide:nth-child(2) h2").textContent = translations[lang].clubhouse;
    document.querySelector(".carousel-slide:nth-child(2) p").textContent = translations[lang].clubhouse_desc;
    document.querySelector(".carousel-slide:nth-child(3) h2").textContent = translations[lang].fine_dining;
    document.querySelector(".carousel-slide:nth-child(3) p").textContent = translations[lang].fine_dining_desc;
    document.querySelector(".carousel-slide:nth-child(4) h2").textContent = translations[lang].expert_instruction;
    document.querySelector(".carousel-slide:nth-child(4) p").textContent = translations[lang].expert_instruction_desc;

    document.querySelector(".cta-btn").textContent = translations[lang].book;
  }
  // Translations object and changeLanguage function

  // Event for language buttons
  langButtons.forEach((btn) => {
    btn.addEventListener("click", function () {
      changeLanguage(this.dataset.lang);
      modal.classList.remove("show"); // Use class toggle for consistency
    });
  });

  // Load saved language
  const savedLang = localStorage.getItem("lang") || "en";
  changeLanguage(savedLang);
});
  