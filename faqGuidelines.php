
<?php
include 'connect.php';
session_start();

$isLoggedIn = false;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $isLoggedIn = true;
} 


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="styling/headerAndFooter.css">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="images/landlordProLogo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ Summary | LandlordPro Properties</title>
  <style>
   
    .faq-section {
      padding: 20px;
      max-width: 800px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .faq-item {
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 15px;
      background-color: #f9f9f9;
      transition: all 0.3s ease;
    }

    .faq-item:hover {
      border-color: #1abc9c;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .faq-item summary {
      font-weight: bold;
      cursor: pointer;
      color: #2c3e50;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .faq-item summary::after {
      content: "▼";
      font-size: 0.8em;
      color: #1abc9c;
      transition: transform 0.3s ease;
    }

    .faq-item[open] summary::after {
      transform: rotate(180deg);
    }

    .faq-item p {
      margin-top: 10px;
      color: #555;
      line-height: 1.6;
    }

    .faq-item ul {
      margin-left: 20px;
      color: #555;
      padding-left: 15px;
    }

    .faq-item ul li {
      margin-bottom: 5px;
    }
  </style>
</head>
<body>
  
<header>
    <div class="logoWrapper">

      <a href="index.php" id="logo">
        <img src="images/landlordProLogo.png"  height="60" width="60">
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
  <?php 
  if(!$isLoggedIn) {
      echo '
      <li><a href="index.php">HOME</a></li>
      <li><a href="how-it-works.php">HOW IT WORKS</a></li>
      <li><a href="pricing.php">PRICING</a></li>
      <li><a href="reviews.php">REVIEWS</a></li>
    
  ';
    } 
  else if($isLoggedIn) {
      echo '<li><a href="accountBalance.php">ACCOUNT BALANCE |</a></li>';
    echo'<li><a href="properties.php">PROPERTIES |</a></li>
    ';

  }
  ?> 
  <li><a href="faqGuidelines.php">FAQ SUMMARY |</a></li>
    <li><a href="contactUs.php">CONTACT US</a></li>
    <?php 
  if($isLoggedIn) {
      echo '<li><a href="logOut.php">LOG OUT</a></li>';
    } 
  ?>
  </ul>
</nav>

<div class="title">
      <h1>FAQ SUMMARY</h1>
</div>
  
  <main>
    <div class="title">
      <h1>FAQ Guidelines</h1>
    </div>

    
    <section class="faq-section">
      <h2>Renting and Leasing Guidelines</h2>
      <p>This document is designed to help you understand the process of renting and leasing before you sign an agreement. Knowing your rights and responsibilities can help you avoid issues and ensure a smooth experience.</p>

      <div class="faq-container">
        
        <details class="faq-item">
          <summary>1. What is the difference between renting and leasing?</summary>
          <p><strong>Renting</strong> – A short-term agreement (month-to-month or up to six months) with more flexibility.<br>
          <strong>Leasing</strong> – A fixed-term contract (typically 6 to 12 months) with set terms and penalties for early termination.</p>
        </details>

        
        <details class="faq-item">
          <summary>2. What documents are required to apply?</summary>
          <p>You’ll usually need:
            <ul>
              <li>Proof of income (pay stubs, tax returns, or bank statements)</li>
              <li>Photo ID (driver’s license or passport)</li>
              <li>Rental history and landlord references</li>
              <li>Authorization for a credit check</li>
            </ul>
          </p>
        </details>

       
        <details class="faq-item">
          <summary>3. How does the credit check process work?</summary>
          <p>The landlord will assess your credit score and history to evaluate your ability to pay rent. A strong credit score may help you secure better terms.</p>
        </details>

       
      </div>
    </section>
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

