<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styling/headerAndFooter.css">
  <link rel="stylesheet" href="index.css">
  <link rel="icon" href="images/landlordProLogo.png">
  <script src="index.js"></script>
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
      <li><a href="how-it-works.php">HOW IT WORKS</a></li>
      <li><a href="pricing.php">PRICING</a></li>
      <li><a href="reviews.php">REVIEWS</a></li>
    </ul>
  </nav>

  <div class="title">
    <h1>Please select your account type...</h1>
  </div>
    
  <main>
  <div class="account-type-container">
    <div class="account-options">
      <div class="option-card">
        <div class="option-icon">🏠</div>
        <h2>Tenant</h2>
        <p>Log in to view and manage your rented properties</p>
        <a href="signUp.php" class="select-btn">Log In/Sign up as Tenant</a>
      </div>
      
      <div class="option-card">
        <div class="option-icon">👔</div>
        <h2>Landlord</h2>
        <p>Log in to manage your properties and tenants</p>
        <a href="signUp.php" class="select-btn">Log In/Sign up as Landlord</a>
      </div>
    </div>
  </div>
</main>

  <footer class="site-footer">
    <div class="footer-content">
      <p class="copyright">Copyright &copy; <span id="year">2024</span> LandLordpro</p>
      <div class="footer-links">
        <a href="mailto:landlordpro@gmail.com" class="footer-link">landlordpro@gmail.com</a>
        <a href="/privacy" class="footer-link">Privacy</a>
        <a href="/terms" class="footer-link">Terms</a>
      </div>
    </div>
  </footer>
</body>
</html>