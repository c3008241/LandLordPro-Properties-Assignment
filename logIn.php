<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="styling/headerAndFooter.css">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="images/landlordProLogo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In | LandlordPro Properties</title>
  <style>

    .login-options {
      margin-top: 20px;
      text-align: center;
      padding: 15px;
      border-top: 1px solid #ddd;
    }
    
    .login-options p {
      margin-bottom: 10px;
      color: #555;
    }
    
    .option-buttons {
      display: flex;
      justify-content: center;
      gap: 15px;
    }
    
    .option-btn {
      padding: 8px 20px;
      border: 1px solid #ccc;
      background: #f8f8f8;
      border-radius: 4px;
      cursor: pointer;
      transition: all 0.3s;
    }
    
    .option-btn:hover {
      background: #e8e8e8;
    }
    
    .option-btn.active {
      background: #007bff;
      color: white;
      border-color: #007bff;
    }
    
    .hidden-field {
      display: none;
    }
  </style>
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
    <li><a href="logIn.php">LOG IN |</a></li>
    <li><a href="signUp.php">SIGN UP |</a></li>
    <li><a href="properties.php">PROPERTIES |</a></li>
    <li><a href="faqGuidlines.php">FAQ GUIDLINE</a></li>
    <li><a href="contactUs.php">CONTACT US</a></li>
  </ul>
</nav>

<div class="title">
  <h1>Log in</h1>
</div>
    
<main>
  <form action="register.php" method="post">
    <div class="signIn">
      <div>
        <label for="email">Email Address:</label>
        <input type="email" name="email" placeholder="example@gmail.com" required>
      </div>

      <div>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter your password" required>
      </div>

      <input type="submit" value="Log In" name="signIn" class="logIn">
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


