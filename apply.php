<?php
session_start();
include 'connect.php';

if (!isset($_GET['property_id'])) {
    header("Location: properties.php");
    exit();
}

$property_id = (int)$_GET['property_id'];
$property = $conn->query("SELECT * FROM properties WHERE property_id = $property_id")->fetch_assoc();

if (!$property) {
    header("Location: properties.php");
    exit();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message']);
    $tenant_id = (int)$_SESSION['user_id'];
    $landlord_id = (int)$property['landlord_id'];
    
    $landlord_check = $conn->query("SELECT user_id FROM userinfo WHERE user_id = $landlord_id");
    if ($landlord_check->num_rows === 0) {
        die("Invalid property owner");
    }
    
    $stmt = $conn->prepare("INSERT INTO applications (property_id, tenant_id, landlord_id, message, status, application_date) VALUES (?, ?, ?, ?, 'pending', NOW())");
    $stmt->bind_param("iiis", $property_id, $tenant_id, $landlord_id, $message);
    
    if ($stmt->execute()) {
        echo "<script>
            alert('Application submitted successfully!');
            window.location.href = 'properties.php';
        </script>";
    } else {
        echo "<script>
            alert('Error submitting application. Please try again.');
            window.location.href = 'properties.php';
        </script>";
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="styling/headerAndFooter.css">
  <link rel="stylesheet" href="style.css"> 
  <link rel="stylesheet" href="apply.css">
  <link rel="icon" href="images/landlordProLogo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apply for Property | LandlordPro Properties</title>
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
    <li><a href="logIn.php">LOG IN |</a></li>
    <li><a href="signUp.php">SIGN UP |</a></li>
    <li><a href="properties.php">PROPERTIES |</a></li>
    <li><a href="faqGuidlines.php">FAQ GUIDELINES</a></li>
    <li><a href="contactUs.php">CONTACT US</a></li>
  </ul>
</nav>

<div class="title">
  <h1>Apply for <?= htmlspecialchars($property['location']) ?></h1>
  <p>Submit your application for this property</p>
</div>
    
<main class="contact-main">
  <section class="contact-form-section">
    <form method="POST" class="contact-form">
      <div class="form-group">
        <label for="message">Your Application Message</label>
        <textarea name="message" id="message" rows="5" placeholder="Tell us why you'd be a great tenant..." required></textarea>
      </div>
      <button type="submit" class="submit-btn">Submit Application</button>
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
</script>

</body>
</html>