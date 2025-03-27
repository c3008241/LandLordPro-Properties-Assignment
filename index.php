<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="styling/headerAndFooter.css">
  <link rel="stylesheet" href="style.css">
  <link rel ="icon" href="images/landlordProLogo.png" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page | LandlordPro Properties</title>
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
    <li><a href="logIn.php">LOG IN |</a></li>
    <li><a href="signUp.php">SIGN UP |</a></li>
    <li><a href="properties.php">PROPERTIES |</a></li>
    <li><a href="faqGuidlines.php">FAQ GUIDLINE</a></li>
    <li><a href="contactUs.php">CONTACT US</a></li>
  </ul>
</nav>

<main>

<div class="title">
      <h1>Welcome To LandlordPro Properties</h1>
</div>
    
<div>
<p id="landlordOrTenant" >What type of service are you looking for?</p>
</div>

<div class="mainContent">

<a href="logIn.php">
<p>LandLord</p>
</a>

<a href="logIn.php">
<p>Tenant</p>
</a>
</div>

<div class="dontHaveAnAccount">
<a>Dont have an account?</a>
<a href="signUp.php" id="createAccountTxt" > Create an account</a>
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