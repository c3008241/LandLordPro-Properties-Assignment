<?php 
include 'connect.php';
session_start();

$isLoggedin = false;

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $isLoggedin = true;
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="styling/headerAndFooter.css">
  <link rel="stylesheet" href="style.css"> 
  <link rel="stylesheet" href="contactUs.css">
  <link rel="icon" href="images/landlordProLogo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | LandlordPro Properties</title>
</head>
<body>
  

<header>
    <div class="logoWrapper">
      <a href="index.php" id="logo">
        <img src="images/landlordProLogo.png" alt="LandlordPro Logo" height="60" width="60">
      </a>
      <div class="logoText">
       <p>LandlordPro Properties</p>
       <p id="slogan">Your Comfort, Our Priority</p>
      </div>
    </div>
    <div>
      <input class="searchBar" placeholder="Search &#x1F50E;" aria-label="Search properties">
    </div>
</header>

<nav class="navBar">
  <ul>

  <?php 

if(!$isLoggedin){
echo '<li><a href="index.php">HOME</a></li>
      <li><a href="how-it-works.php">HOW IT WORKS</a></li>
      <li><a href="pricing.php">PRICING</a></li>
      <li><a href="reviews.php">REVIEWS</a></li>';
}
  else if($isLoggedin){
  echo'<li><a href="accountBalance.php">ACCOUNT BALANCE |</a></li>
    <li><a href="properties.php">PROPERTIES |</a></li>';
  }
  ?>
      
    <li><a href="faqGuidelines.php">FAQ SUMMARY |</a></li>
    <li><a href="contactUs.php">CONTACT US |</a></li>

    <?php 
    if($isLoggedin){
    echo'<li><a href="logOut.php">LOG OUT</a></li>';
  }
    ?>
    
  </ul>
</nav>

<div class="title">
  <h1>Contact Us</h1>
  <p>We're here to help with any questions about our properties or services</p>
</div>
    
<main class="contact-main">
  <section class="contact-section">
    <div class="contact-method">
      <h2><i class="icon">📧</i> Email Support</h2>
      <p>General inquiries: <a href="mailto:info@landlordpro.com">info@landlordpro.com</a></p>
      <p>Tenant support: <a href="mailto:tenants@landlordpro.com">tenants@landlordpro.com</a></p>
      <p>Response time: Within 24 hours</p>
    </div>
    
    <div class="contact-method">
      <h2><i class="icon">📞</i> Phone Support</h2>
      <p>Main office: <a href="tel:+44738399938">0738399938</a></p>
      <p>Emergency maintenance: <a href="tel:+44738399938">0738399938</a> (24/7)</p>
      <p>Office hours: Mon-Fri 9am-6pm EST</p>
    </div>
    
    <div class="contact-method">
      <h2><i class="icon">🏢</i> Visit Us</h2>
      <p>LandlordPro Properties HQ</p>
      <p>123 Property Lane, Suite 100</p>
      <p>Sheffield S1 2NU </p>
      <p>By appointment only</p>
    </div>
  </section>
  
  <section class="contact-form-section">
    <h2>Send Us a Message</h2>
    <form class="contact-form">
      <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" required>
      </div>
      <div class="form-group">
        <label for="subject">Subject</label>
        <select id="subject" required>
          <option value="">Select a topic</option>
          <option value="general">General Inquiry</option>
          <option value="property">Property Question</option>
          <option value="maintenance">Maintenance Request</option>
          <option value="application">Rental Application</option>
        </select>
      </div>
      <div class="form-group">
        <label for="message">Your Message</label>
        <textarea id="message" rows="5" required></textarea>
      </div>
      <button type="submit" class="submit-btn">Send Message</button>
    </form>
  </section>
</main>

<footer class="site-footer">
  <div class="footer-content">
    <p class="copyright">Copyright &copy; <span id="year">2024</span> LandlordPro</p>
    <div class="footer-links">
      <a href="mailto:landlordpro@gmail.com">landlordpro@gmail.com</a>
      <a href="mailto:contact@landlordpro.com">contact@landlordpro.com</a>
      <a href="/privacy">Privacy Policy</a>
      <a href="/terms">Terms of Service</a>
    </div>
  </div>
</footer>

<script>
  document.getElementById('year').textContent = new Date().getFullYear();
  
  document.querySelector('.contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Thank you for your message! We will respond within 24 hours.');
    this.reset();
  });
</script>

</body>
</html>