<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La Esmeralda Country Club</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php
session_start();
?>

<nav class="navbar">
  <div class="nav-container">
    <div class="logo">La Esmeralda</div>
    <input type="checkbox" id="menu-toggle" class="menu-toggle">
    <label for="menu-toggle" class="menu-icon">
      <span></span>
      <span></span>
      <span></span>
    </label>
    <div class="nav-wrapper">
      <ul class="nav-links">
        <li><a href="" data-i18n="home">Home</a></li>
        <li><a href="navbar/tips.html" data-i18n="tips">Tips</a></li>
        <li><a href="navbar/equipment.html" data-i18n="equipment">Equipment</a></li>
        <li><a href="Usuario/servicios.html" data-i18n="services">Services</a></li>
        <li><a href="Usuario/membresia.html" data-i18n="memberships">Memberships</a></li>
        <li><a href="Usuario/contacto.html" data-i18n="suggestions">Suggestions</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-i18n="more">More</a>
          <div class="dropdown-content">
            <a href="http://alsona.great-site.net/" data-i18n="nava_team">Nava's team</a>
            <a href="#" id="language-selector" data-i18n="language" class="open-language-modal">Language</a>
          </div>
        </li>
      </ul>
      <button class="login-btn" 
              <?php if (isset($_SESSION['user'])): ?>
                  onclick="window.location.href='Usuario/dashboard.php';">
                  <span>Welcome<?php echo $_SESSION['user_name']; ?></span>
              <?php else: ?>
                  onclick="window.location.href='Usuario/login.html';">
                  <span data-i18n="login">Login</span>
              <?php endif; ?>
      </button>
    </div>
  </div>
</nav>

 
  <section class="carousel-section">
    <div class="section-header">
      <h2 data-i18n="explore_facilities">Explore Our Stunning Facilities</h2>
    </div>
  
    <div class="carousel-container">
      <button class="carousel-button prev" aria-label="Previous slide">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
      </button>
      
      <div class="carousel-track-container">
        <ul class="carousel-track">
          <!-- Slide 1 -->
          <li class="carousel-slide current-slide">
            <img src="img/robert-ruggiero-pI6IaynZQ_I-unsplash.jpg" alt="Golf course fairway with mountains in background" class="carousel-image">
            <div class="slide-content">
              <h2 data-i18n="championship_golf">Championship Golf Course</h2>
              <p data-i18n="golf_course_desc">Experience our award-winning 18-hole course</p>
            </div>
          </li>
          
          <!-- Slide 2 -->
          <li class="carousel-slide">
            <img src="img/frederico-ferreira-6BigkR3-N2A-unsplash.jpg" alt="Elegant clubhouse exterior" class="carousel-image">
            <div class="slide-content">
              <h2 data-i18n="luxurious_clubhouse">Luxurious Clubhouse</h2>
              <p data-i18n="clubhouse_desc">Relax in our newly renovated facilities</p>
            </div>
          </li>
          
          <!-- Slide 3 -->
          <li class="carousel-slide">
            <img src="img/jason-leung-poI7DelFiVA-unsplash.jpg" alt="Fine dining restaurant with golf course view" class="carousel-image">
            <div class="slide-content">
              <h2 data-i18n="fine_dining">Fine Dining</h2>
              <p data-i18n="dining_desc">Savor exceptional cuisine with panoramic views</p>
            </div>
          </li>
          
          <!-- Slide 4 -->
          <li class="carousel-slide">
            <img src="img/mick-haupt-m0iXio5FF7M-unsplash.jpg" alt="Professional golf instruction" class="carousel-image">
            <div class="slide-content">
              <h2 data-i18n="expert_instruction_slide">Expert Instruction</h2>
              <p data-i18n="instruction_desc">Improve your game with our PGA professionals</p>
            </div>
          </li>
        </ul>
      </div>
      
      <button class="carousel-button next" aria-label="Next slide">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
      </button>
    </div>
    
    <div class="carousel-nav">
      <button class="carousel-indicator active" data-slide="0" aria-label="Go to slide 1"></button>
      <button class="carousel-indicator" data-slide="1" aria-label="Go to slide 2"></button>
      <button class="carousel-indicator" data-slide="2" aria-label="Go to slide 3"></button>
      <button class="carousel-indicator" data-slide="3" aria-label="Go to slide 4"></button>
    </div>
    
    <div class="hero-cta">
      <a href="#" class="cta-btn" id="book-tee-time" data-i18n="book_tee_time">Book a Tee Time</a>
    </div>
    
  </section>
  
  <section class="features">
    <div class="feature-card">
      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#1a472a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
        <line x1="4" y1="22" x2="4" y2="15"></line>
      </svg>
      <h3 data-i18n="championship_course">Championship Course</h3>
      <p data-i18n="championship_course_desc">Our 18-hole championship course offers a challenging yet enjoyable experience for golfers of all skill levels.</p>
    </div>
    <div class="feature-card">
      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#1a472a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"></circle>
        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
        <line x1="12" y1="17" x2="12.01" y2="17"></line>
      </svg>
      <h3 data-i18n="expert_instruction">Expert Instruction</h3>
      <p data-i18n="expert_instruction_desc">Learn from our PGA-certified professionals and improve your game with personalized coaching sessions.</p>
    </div>
    <div class="feature-card">
      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#1a472a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"></circle>
        <polyline points="8 14 12 16 16 14"></polyline>
        <line x1="12" y1="16" x2="12" y2="12"></line>
        <path d="M9 10l.5-.5A2 2 0 0 1 12 8a2 2 0 0 1 2.5 1.5L15 10c0 .707-.707 1.5-2 2-1.293-.5-2-1.293-2-2z"></path>
      </svg>
      <h3 data-i18n="premium_facilities">Premium Facilities</h3>
      <p data-i18n="premium_facilities_desc">Enjoy our clubhouse, pro shop, fine dining restaurant, and practice facilities with state-of-the-art amenities.</p>
    </div>
  </section>
  
  <footer>
    <div class="footer-content">
      <div class="footer-column">
        <h3>La Esmeralda Country Club</h3>
        <p>123 Fairway Drive</p>
        <p>Green Valley, CA 12345</p>
        <p data-i18n="phone">Phone: (123) 456-7890</p>
        <p data-i18n="email">Email: info@laesmeralda.com</p>
      </div>
      <div class="footer-column">
        <h3 data-i18n="quick_links">Quick Links</h3>
        <a href="#" data-i18n="course_info">Course Information</a>
        <a href="#" data-i18n="events">Events</a>
        <a href="#" data-i18n="pro_shop">Pro Shop</a>
        <a href="#" data-i18n="dining">Dining</a>
      </div>
      <div class="footer-column">
        <h3 data-i18n="hours">Hours</h3>
        <p data-i18n="golf_hours">Golf Course: 7am - 7pm</p>
        <p data-i18n="pro_shop_hours">Pro Shop: 6:30am - 7:30pm</p>
        <p data-i18n="restaurant_hours">Restaurant: 7am - 10pm</p>
        <p data-i18n="range_hours">Driving Range: 6:30am - 9pm</p>
      </div>
      <div class="footer-column">
        <h3 data-i18n="follow_us">Follow Us</h3>
        <div class="social-icons">
          <a href="https://Facebook.com" aria-label="Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
            </svg>
          </a>
          <a href="https://x.com" aria-label="Twitter">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
            </svg>
          </a>
          <a href="https://instagram.com" aria-label="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
            </svg>
          </a>
        </div>
      </div>
    </div>
    <div class="copyright">
      <p data-i18n="footer_text">&copy; 2025 La Esmeralda Country Club. All rights reserved.</p>
    </div>
  </footer>

  <div id="language-modal" class="modal">
    <div class="modal-content">
      <h2 data-i18n="select_language">Select Language</h2>
      <button class="lang-btn" data-lang="en">English</button>
      <button class="lang-btn" data-lang="es">Español</button>
      <button id="close-modal" data-i18n="close">Close</button>
    </div>
  </div>

  <script src="js/lenguaje.js"></script>
  <script src="js/carrusel.js"></script>
  <script src="https://cdn.userway.org/widget.js"&quot; data-account="ktnkhEfZx0"></script>
</body>
</html>