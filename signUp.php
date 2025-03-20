<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="styling\headerAndFooter.css">
  <link rel="stylesheet" href="styling\style.css">
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
    <li><a href="invest.php">INVEST |</a></li>
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


<footer>
    <div class="footerItems">
      <div id="copyRight">
      Copyright &#169; 
      </div>


      <div class="emails">
       <a href="">info@smartpay.com</a>
       <a href="">contact@smartpay.com</a>
      </div>
    </div>
  </footer>

</body>

</html>