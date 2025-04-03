
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La Esmeralda Country Club - Member Dashboard</title>
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
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
          <li><a href="../index.php" data-i18n="dashboard">Inicio</a></li>
          <li><a href="../navbar/tips.html" data-i18n="tips">Tips</a></li>
          <li><a href="../navbar/equipment.html" data-i18n="equipment">Equipment</a></li>
          <li><a href="../Usuario/servicios.html" data-i18n="services">Services</a></li>
          <li><a href="../Usuario/reservations.html" data-i18n="reservations">Reservations</a></li>
          <li><a href="../Usuario/contacto.html" data-i18n="suggestions">Suggestions</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-i18n="more">More</a>
            <div class="dropdown-content">
              <a href="http://alsona.great-site.net/" data-i18n="nava_team">Nava's team</a>
              <a href="#" id="language-selector" data-i18n="language" class="open-language-modal">Language</a>
            </div>
          </li>
        </ul>
        <div class="user-menu">
        <button class="user-btn" id="user-menu-toggle" onclick="window.location.href='../db/logout.php';">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
          <span id="username">Log Out</span>
        </button>

        </div>
      </div>
    </div>
  </nav>
 
  <section class="dashboard-welcome">
    <div class="welcome-container">
      <h1>Welcome, <span id="member-name">Member</span>!</h1>
      <p>Your membership is active until: <span id="membership-date">December 31, 2025</span></p>
    </div>
  </section>

  <section class="dashboard-cards">
    <div class="dashboard-card">
      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#1a472a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
        <line x1="16" y1="2" x2="16" y2="6"></line>
        <line x1="8" y1="2" x2="8" y2="6"></line>
        <line x1="3" y1="10" x2="21" y2="10"></line>
      </svg>
      <h3>Book a Tee Time</h3>
      <p>Reserve your spot on our championship course</p>
      <a href="#" class="card-btn">Book Now</a>
    </div>
    
    <div class="dashboard-card">
      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#1a472a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
        <polyline points="14 2 14 8 20 8"></polyline>
        <line x1="16" y1="13" x2="8" y2="13"></line>
        <line x1="16" y1="17" x2="8" y2="17"></line>
        <polyline points="10 9 9 9 8 9"></polyline>
      </svg>
      <h3>View Events</h3>
      <p>Upcoming tournaments and social gatherings</p>
      <a href="#" class="card-btn">See Events</a>
    </div>
    
    <div class="dashboard-card">
      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#1a472a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"></circle>
        <polyline points="12 6 12 12 16 14"></polyline>
      </svg>
      <h3>Book Lessons</h3>
      <p>Schedule instruction with our golf professionals</p>
      <a href="#" class="card-btn">Book Lesson</a>
    </div>
  </section>
  
  <section class="recent-activity">
    <h2>Recent Activity</h2>
    <div class="activity-list">
      <div class="activity-item">
        <div class="activity-date">Mar 29, 2025</div>
        <div class="activity-details">
          <h4>Tee Time Confirmation</h4>
          <p>Your tee time for April 5th at 10:30 AM has been confirmed.</p>
        </div>
      </div>
      <div class="activity-item">
        <div class="activity-date">Mar 15, 2025</div>
        <div class="activity-details">
          <h4>Spring Tournament Registration</h4>
          <p>You've successfully registered for the Spring Member Tournament.</p>
        </div>
      </div>
      <div class="activity-item">
        <div class="activity-date">Mar 10, 2025</div>
        <div class="activity-details">
          <h4>Lesson Completed</h4>
          <p>60-minute lesson with Pro John Wilson completed.</p>
        </div>
      </div>
    </div>
  </section>
  
  <section class="weather-forecast">
    <h2>Course Weather Forecast</h2>
    <div class="weather-container">
      <div class="weather-day">
        <h3>Today</h3>
        <div class="weather-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"></circle>
            <line x1="12" y1="1" x2="12" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="23"></line>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
            <line x1="1" y1="12" x2="3" y2="12"></line>
            <line x1="21" y1="12" x2="23" y2="12"></line>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
          </svg>
        </div>
        <div class="weather-temp">72°F</div>
        <div class="weather-desc">Sunny</div>
      </div>
      <div class="weather-day">
        <h3>Tomorrow</h3>
        <div class="weather-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path>
          </svg>
        </div>
        <div class="weather-temp">68°F</div>
        <div class="weather-desc">Partly Cloudy</div>
      </div>
      <div class="weather-day">
        <h3>Wednesday</h3>
        <div class="weather-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 16.58A5 5 0 0 0 18 7h-1.26A8 8 0 1 0 4 15.25"></path>
            <line x1="8" y1="16" x2="8.01" y2="16"></line>
            <line x1="8" y1="20" x2="8.01" y2="20"></line>
            <line x1="12" y1="18" x2="12.01" y2="18"></line>
            <line x1="12" y1="22" x2="12.01" y2="22"></line>
            <line x1="16" y1="16" x2="16.01" y2="16"></line>
            <line x1="16" y1="20" x2="16.01" y2="20"></line>
          </svg>
        </div>
        <div class="weather-temp">65°F</div>
        <div class="weather-desc">Light Rain</div>
      </div>
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

  <script src="../js/lenguaje.js"></script>
</body>
</html> 