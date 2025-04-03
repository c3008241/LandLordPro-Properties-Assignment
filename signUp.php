<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="styling\headerAndFooter.css">
  <link rel="stylesheet" href="style.css">
  <link rel ="icon" href="images/landlordProLogo.png" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Sign Up | LandlordPro Properties</title>
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
    <li><a href="faqGuidlines.php">FAQ GUIDLINE|</a></li>
    <li><a href="contactUs.php">CONTACT US</a></li>
  </ul>
</nav>

<div class="title">
      <h1>Sign Up</h1>
</div>
    
<main>


<form action="register.php" method="post" >

<div class="signIn">


<div>
  <label for="fullName">Full Name:</label>
  <input type="text" name="fullName" placeholder="Zylith Wann">
</div>


<div>
  <label for="userType">Account Type:</label>
  <select class="input">
    <option value="landlord">Landlord</option>
    <option value="tenant">Tenant</option>

  </select>
</div>

<div>
  <label for="email">Email Address:</label>
  <input type="email" name="email" placeholder="zylithwann@gmail.com">
</div>

<div>
  <label for="password">Password:</label>
  <input type="password" name="password" placeholder="zylithwann34">
</div>

<input type="submit" name="signUp" value="Register" class="logIn">

</div>



</form>
</main>


<footer class="site-footer">
  <div class="footer-content">
    <p class="copyright">Copyright &copy; <span id="year">2024</span> LandLordPro</p>
    
    <div class="footer-links">
      <a href="mailto:landlordpro@gmail.com" class="footer-link">landlordpro@gmail.com</a>
      <a href="/privacy" class="footer-link">Privacy</a>
      <a href="/terms" class="footer-link">Terms</a>
    </div>
  </div>
</footer>

</body>

</html>