<?php
include 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="styling/headerAndFooter.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="properties.css">
  <link rel="icon" href="images/landlordProLogo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Properties | LandlordPro Properties</title>
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
      <input class="searchBar" placeholder="Search &#x1F50E;">
    </div>
  </header>

  <nav class="navBar">
    <ul>
      <li><a href="logIn.php">LOG IN |</a></li>
      <li><a href="signUp.php">SIGN UP |</a></li>
      <li><a href="properties.php">PROPERTIES |</a></li>
      <li><a href="contactUs.php">CONTACT US</a></li>
      <li><a href="faqGuidlines.php">FAQ GUIDLINE</a></li>
    </ul>
  </nav>

  <div class="title">
    <h1>Properties</h1>
  </div>

  <main>
  <form id="propertyFilters" action="filterProperties.php" method="GET">

    <select name="location">
        <option value="Any">Any Location</option>
        <option value="Sheffield">Sheffield</option>
        <option value="Leeds">Leeds</option>
        <option value="London">London</option>
        <option value="Manchester">Manchester</option>
    </select>

    <select name="price">
        <option value="Any">Any Price</option>
        <option value="0-500">£0 - £500</option>
        <option value="500-1000">£500 - £1000</option>
        <option value="1000-2000">£1000 - £2000</option>
    </select>

    <select name="bedrooms">
        <option value="Any">Any Bedrooms</option>
        <option value="1">1 Bedroom</option>
        <option value="2">2 Bedrooms</option>
        <option value="3">3+ Bedrooms</option>
    </select>

    <button type="submit">Search Properties</button>
</form>

<div id="propertyResults">
</div>
    </div>

    <div class="properties-container">
      
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

  <script>
    document.getElementById("currentYear").textContent = new Date().getFullYear();
  </script>

<script>
  
document.getElementById('propertyFilters').addEventListener('submit', function(e) {
    e.preventDefault(); 
    
    const location = this.querySelector('[name="location"]').value;
    const price = this.querySelector('[name="price"]').value;
    const bedrooms = this.querySelector('[name="bedrooms"]').value;
    
    fetch(`filter-properties.php?location=${location}&price=${price}&bedrooms=${bedrooms}`)
        .then(response => {
            if (!response.ok) throw new Error("Network error");
            return response.text();
        })
        .then(data => {
            document.getElementById('propertyResults').innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('propertyResults').innerHTML = 
                '<p class="error">Error loading properties. Please try again.</p>';
        });
});

window.addEventListener('DOMContentLoaded', function() {
    fetch('filter-properties.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('propertyResults').innerHTML = data;
        });
});
</script>
</body>
</html>
