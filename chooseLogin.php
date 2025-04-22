<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styling/headerAndFooter.css">
  <link rel="stylesheet" href="chooseLogin.css?v=1.0">
  <link rel="icon" href="images/landlordProLogo.png">
  <script src="chooseLogin.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Choose Account Type | LandlordPro Properties</title>
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
   
    <li><a href="how-it-works.html">✨ HOW IT WORKS</a></li> 
    <li><a href="pricing.html">💲 PRICING</a></li>
    
  
    <li><a href="testimonials.html">⭐ REVIEWS</a></li>  
</nav>

  <div class="title">
    <h1>Select your account type...</h1>
  </div>
    
  <main>
    <div class="account-type-container">
      <div class="account-options">
        <div class="option-card" onclick="window.location.href='login-tenant.php'">
          <div class="option-icon">🏠</div>
          <h2>Tenant</h2>
          <p>Log in to view and manage your rented properties</p>
          <button class="select-btn">Log In/Sign up as Tenant</button>
        </div>
        
        <div class="option-card" onclick="window.location.href='login-landlord.php'">
          <div class="option-icon">👔</div>
          <h2>Landlord</h2>
          <p>Log in to manage your properties and tenants</p>
          <button class="select-btn">Log In/Sign up as Landlord</button>
        </div>
      </div>

  </main>

  <footer class="site-footer">
  <div class="footer-content">
    <p class="copyright">Copyright &copy; <span id="year">2024</span> SmartPay</p>
    
    <div class="footer-links">
      <a href="mailto:landlordpro@gmail.com" class="footer-link">landlordpro@gmail.com</a>
      <a href="/privacy" class="footer-link">Privacy</a>
      <a href="/terms" class="footer-link">Terms</a>
    </div>
  </div>
</footer>
</body>
</html>