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
  <link rel="stylesheet" href="addProperties.css">
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
    <h1>Add Properties</h1>
  </div>

  <main class="main-content">
    <div class="container">
      <div class="property-form-container">
        <form action="process_property.php" method="POST" class="property-form">
          <div class="form-grid">
            <div class="form-group">
              <label for="property-name">Property Name</label>
              <input type="text" id="property-name" name="property_name" required>
            </div>
            
            <div class="form-group">
              <label for="property-address">Address</label>
              <input type="text" id="property-address" name="property_address" required>
            </div>
            
            <div class="form-group">
              <label for="property-type">Property Type</label>
              <select id="property-type" name="property_type" required>
                <option value="">Select Type</option>
                <option value="Apartment">Apartment</option>
                <option value="House">House</option>
                <option value="Condo">Condo</option>
                <option value="Townhouse">Townhouse</option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="bedrooms">Bedrooms</label>
              <input type="number" id="bedrooms" name="bedrooms" min="1" required>
            </div>
            
            <div class="form-group">
              <label for="bathrooms">Bathrooms</label>
              <input type="number" id="bathrooms" name="bathrooms" min="1" step="0.5" required>
            </div>
            
            <div class="form-group">
              <label for="rent-amount">Monthly Rent ($)</label>
              <input type="number" id="rent-amount" name="rent_amount" min="0" step="0.01" required>
            </div>
            
            <div class="form-group full-width">
              <label for="property-description">Description</label>
              <textarea id="property-description" name="property_description" rows="4"></textarea>
            </div>
            
            <div class="form-group full-width">
              <label for="property-image">Upload Images</label>
              <input type="file" id="property-image" name="property_images[]" multiple accept="image/*">
            </div>
          </div>
          
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Property</button>
            <button type="reset" class="btn btn-secondary">Reset Form</button>
          </div>
        </form>
      </div>
    </div>
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

</body>
</html>