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

  // Translations object expanded to include footer and features section
  const translations = {
    en: {
      // Navigation
      home: "Home",
      tips: "Tips",
      material: "Material",
      psychology: "Psychology",
      competition: "Competition",
      more: "More",
      services: "Services",
      memberships: "Memberships",
      language: "Language",
      login: "Login",
      
      // Carousel section
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
      team: "Nava's team",
      
      // Features section
      championship_course: "Championship Course",
      championship_course_desc: "Our 18-hole championship course offers a challenging yet enjoyable experience for golfers of all skill levels.",
      expert_instruction_title: "Expert Instruction",
      expert_instruction_text: "Learn from our PGA-certified professionals and improve your game with personalized coaching sessions.",
      premium_facilities: "Premium Facilities",
      premium_facilities_desc: "Enjoy our clubhouse, pro shop, fine dining restaurant, and practice facilities with state-of-the-art amenities.",
      
      // Footer
      country_club: "La Esmeralda Country Club",
      address: "123 Fairway Drive",
      city: "Green Valley, CA 12345",
      phone: "Phone: (123) 456-7890",
      email: "Email: info@laesmeralda.com",
      quick_links: "Quick Links",
      course_info: "Course Information",
      events: "Events",
      pro_shop: "Pro Shop",
      dining: "Dining",
      hours: "Hours",
      golf_course_hours: "Golf Course: 7am - 7pm",
      pro_shop_hours: "Pro Shop: 6:30am - 7:30pm",
      restaurant_hours: "Restaurant: 7am - 10pm",
      driving_range: "Driving Range: 6:30am - 9pm",
      follow_us: "Follow Us",
      copyright: "© 2025 La Esmeralda Country Club. All rights reserved.",
      
      // Language modal
      select_language: "Select Language",
      close: "Close"
    },
    es: {
      // Navigation
      home: "Inicio",
      tips: "Consejos",
      material: "Material",
      psychology: "Psicología",
      competition: "Competencia",
      more: "Más",
      services: "Servicios",
      memberships: "Membresías",
      language: "Idioma",
      login: "Iniciar Sesión",
      
      // Carousel section
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
      team: "Equipo de Nava",
      
      // Features section
      championship_course: "Campo de Campeonato",
      championship_course_desc: "Nuestro campo de 18 hoyos ofrece una experiencia desafiante pero agradable para golfistas de todos los niveles.",
      expert_instruction_title: "Instrucción Experta",
      expert_instruction_text: "Aprende de nuestros profesionales certificados por PGA y mejora tu juego con sesiones de entrenamiento personalizadas.",
      premium_facilities: "Instalaciones Premium",
      premium_facilities_desc: "Disfruta de nuestra casa club, tienda profesional, restaurante de alta cocina e instalaciones de práctica con amenidades de última generación.",
      
      // Footer
      country_club: "Club de Campo La Esmeralda",
      address: "123 Fairway Drive",
      city: "Green Valley, CA 12345",
      phone: "Teléfono: (123) 456-7890",
      email: "Correo: info@laesmeralda.com",
      quick_links: "Enlaces Rápidos",
      course_info: "Información del Campo",
      events: "Eventos",
      pro_shop: "Tienda Pro",
      dining: "Restaurante",
      hours: "Horarios",
      golf_course_hours: "Campo de Golf: 7am - 7pm",
      pro_shop_hours: "Tienda Pro: 6:30am - 7:30pm",
      restaurant_hours: "Restaurante: 7am - 10pm",
      driving_range: "Campo de Práctica: 6:30am - 9pm",
      follow_us: "Síguenos",
      copyright: "© 2025 Club de Campo La Esmeralda. Todos los derechos reservados.",
      
      // Language modal
      select_language: "Seleccionar Idioma",
      close: "Cerrar"
    },
  };

  // Cambiar idioma - Función expandida para incluir footer y features
  function changeLanguage(lang) {
    localStorage.setItem("lang", lang);
    
    // Navigation
    document.querySelector(".nav-links li:nth-child(1) a").textContent = translations[lang].home;
    document.querySelector(".nav-links li:nth-child(2) a").textContent = translations[lang].tips;
    document.querySelector(".nav-links li:nth-child(3) a").textContent = translations[lang].material;
    document.querySelector(".nav-links li:nth-child(4) a").textContent = translations[lang].psychology;
    document.querySelector(".nav-links li:nth-child(5) a").textContent = translations[lang].competition;
    document.querySelector(".dropdown-toggle").textContent = translations[lang].more;
    document.querySelector(".dropdown-content a:nth-child(1)").textContent = translations[lang].services;
    document.querySelector(".dropdown-content a:nth-child(2)").textContent = translations[lang].memberships;
    document.querySelector(".dropdown-content a:nth-child(3)").textContent = translations[lang].language;
    
    // Login button text
    const loginBtnText = document.querySelector(".login-btn").childNodes;
    loginBtnText[loginBtnText.length - 1].nodeValue = translations[lang].login;

    // Carousel section
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
    document.querySelector("#navas-team-link").textContent = translations[lang].team;
    
    // Features section
    const featureCards = document.querySelectorAll(".feature-card");
    featureCards[0].querySelector("h3").textContent = translations[lang].championship_course;
    featureCards[0].querySelector("p").textContent = translations[lang].championship_course_desc;
    featureCards[1].querySelector("h3").textContent = translations[lang].expert_instruction_title;
    featureCards[1].querySelector("p").textContent = translations[lang].expert_instruction_text;
    featureCards[2].querySelector("h3").textContent = translations[lang].premium_facilities;
    featureCards[2].querySelector("p").textContent = translations[lang].premium_facilities_desc;
    
    // Footer
    const footerColumns = document.querySelectorAll(".footer-column");
    footerColumns[0].querySelector("h3").textContent = translations[lang].country_club;
    const addressLines = footerColumns[0].querySelectorAll("p");
    addressLines[0].textContent = translations[lang].address;
    addressLines[1].textContent = translations[lang].city;
    addressLines[2].textContent = translations[lang].phone;
    addressLines[3].textContent = translations[lang].email;
    
    footerColumns[1].querySelector("h3").textContent = translations[lang].quick_links;
    const quickLinks = footerColumns[1].querySelectorAll("a");
    quickLinks[0].textContent = translations[lang].course_info;
    quickLinks[1].textContent = translations[lang].events;
    quickLinks[2].textContent = translations[lang].pro_shop;
    quickLinks[3].textContent = translations[lang].dining;
    
    footerColumns[2].querySelector("h3").textContent = translations[lang].hours;
    const hoursLines = footerColumns[2].querySelectorAll("p");
    hoursLines[0].textContent = translations[lang].golf_course_hours;
    hoursLines[1].textContent = translations[lang].pro_shop_hours;
    hoursLines[2].textContent = translations[lang].restaurant_hours;
    hoursLines[3].textContent = translations[lang].driving_range;
    
    footerColumns[3].querySelector("h3").textContent = translations[lang].follow_us;
    
    document.querySelector(".copyright p").textContent = translations[lang].copyright;
    
    // Language modal
    document.querySelector("#language-modal h2").textContent = translations[lang].select_language;
    document.querySelector("#close-modal").textContent = translations[lang].close;
  }

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