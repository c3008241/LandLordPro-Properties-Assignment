<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styling/headerAndFooter.css">
  <link rel="stylesheet" href="how-it-works.css">
  <link rel="icon" href="images/landlordProLogo.png">
  <script src="how-it-works.js" defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>How It Works | LandlordPro Properties</title>
</head>
<body>
  <header>
    <div class="logoWrapper">
      <a href="index.php" id="logo">
        <img src="images/landlordProLogo.png" height="60" width="60">
      </a>
      <div class="logoText">
        <p>LandlordPro Properties</p>
        <p id="slogan">Your Comfort, Our Priority</p>
      </div>
    </div>
    <div>
      <input class="searchBar" placeholder="Search &#x1F50E;">
    </div>
  </header>

  <nav class="navBar">
    <ul>
      <li><a href="how-it-works.php">HOW IT WORKS</a></li>
      <li><a href="pricing.php">PRICING</a></li>
      <li><a href="reviews.php">REVIEWS</a></li>
    </ul>
  </nav>

  <div class="title">
    <h1>How does LandLordPro work?</h1>
  </div>
    
  <main>
    <div class="tab-container">
      <div class="tab-buttons">
        <button class="tab-button active" data-tab="tenant">For Tenants</button>
        <button class="tab-button" data-tab="landlord">For Landlords</button>
      </div>
      
      <div class="tab-content">
        <div id="tenant" class="tab-pane active">
          <div class="feature-card">
            <h3>Easy Property Search</h3>
            <p>Browse available properties with detailed filters and virtual tours.</p>
          </div>
          <div class="feature-card">
            <h3>Online Applications</h3>
            <p>Submit rental applications digitally with instant notifications.</p>
          </div>
          <div class="feature-card">
            <h3>Rent Payments</h3>
            <p>Pay rent securely online with automatic receipts.</p>
          </div>
          <div class="feature-card">
            <h3>Maintenance Requests</h3>
            <p>Submit and track maintenance issues with photo uploads.</p>
          </div>
          <a href="signUp.php" class="cta-button">Get Started as Tenant</a>
        </div>
        
        <div id="landlord" class="tab-pane">
          <div class="feature-card">
            <h3>Property Management</h3>
            <p>Manage all your properties from one dashboard.</p>
          </div>
          <div class="feature-card">
            <h3>Tenant Screening</h3>
            <p>Run credit and background checks on applicants.</p>
          </div>
          <div class="feature-card">
            <h3>Rent Collection</h3>
            <p>Automated rent collection with late fee calculations.</p>
          </div>
          <div class="feature-card">
            <h3>Maintenance Coordination</h3>
            <p>Dispatch and track maintenance requests to vendors.</p>
          </div>
          <a href="signUp.php" class="cta-button">Get Started as Landlord</a>
        </div>
      </div>
    </div>
  </main>

  <footer class="site-footer">
  <div class="footer-content">
    <p class="copyright">Copyright &copy; <span id="year">2024</span> LandlordPro</p>
    
    <div class="footer-links">
      <a href="mailto:landlordpro@gmail.com" class="footer-link">landlordpro@gmail.com</a>
      <a href="/privacy" class="footer-link">Privacy</a>
      <a href="/terms" class="footer-link">Terms</a>
    </div>
  </div>
</footer>
</body>
</html>

