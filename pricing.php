<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styling/headerAndFooter.css">
  <link rel="stylesheet" href="pricing.css">
  <link rel="icon" href="images/landlordProLogo.png">
  <script src="pricing.js" defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pricing | LandlordPro Properties</title>
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

  <main class="pricing-main">
    <section class="pricing-hero">
      <h1>Fair, Competitive Pricing</h1>
      <p class="hero-subtext">Trusted by landlords across the region for our transparent and value-driven approach</p>
    </section>

    <section class="trust-section">
      <div class="trust-content">
        <h2>Why Landlords Choose Us</h2>
        <div class="trust-grid">
          <div class="trust-card">
            <div class="trust-icon">💲</div>
            <h3>Fair Pricing</h3>
            <p>We work directly with you to ensure you get the best value for your specific needs</p>
          </div>
          <div class="trust-card">
            <div class="trust-icon">📊</div>
            <h3>Market Knowledge</h3>
            <p>Our local expertise helps optimize your rental income potential</p>
          </div>
          <div class="trust-card">
            <div class="trust-icon">🤝</div>
            <h3>Trusted Service</h3>
            <p>Rated 4.9/5 by landlords for our reliable and professional service</p>
          </div>
        </div>
      </div>
    </section>

    <section class="value-section">
      <h2>Transparent Pricing Structure</h2>
      <div class="value-grid">
        <div class="value-card">
          <div class="value-icon">📝</div>
          <h3>Simple Fee Structure</h3>
          <p>One straightforward percentage of collected rent with no hidden fees</p>
        </div>
        <div class="value-card">
          <div class="value-icon">🔍</div>
          <h3>No Long-Term Contracts</h3>
          <p>Month-to-month service that you can cancel anytime</p>
        </div>
        <div class="value-card">
          <div class="value-icon">💳</div>
          <h3>Flexible Payment</h3>
          <p>Multiple payment options to suit your preferences</p>
        </div>
        <div class="value-card">
          <div class="value-icon">📈</div>
          <h3>Performance-Based</h3>
          <p>We succeed when you succeed - our fees align with your rental income</p>
        </div>
      </div>
    </section>

    <section class="cta-section">
      <h2>Ready to Discuss Your Needs?</h2>
      <p>Contact us for a personalized quote tailored to your property</p>
      <button id="quoteBtn" class="cta-button">Get Your Quote</button>
    </section>
  </main>

  <footer class="site-footer">
    <div class="footer-content">
      <p class="copyright">Copyright &copy; <span id="year">2025</span> LandlordPro</p>
      <div class="footer-links">
        <a href="mailto:landlordpro@gmail.com" class="footer-link">landlordpro@gmail.com</a>
        <a href="/privacy" class="footer-link">Privacy</a>
        <a href="/terms" class="footer-link">Terms</a>
      </div>
    </div>
  </footer>
</body>
</html>