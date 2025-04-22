


<?php
session_start();
include 'connect.php';

// Redirect if property_id not provided
if (!isset($_GET['property_id'])) {
    header("Location: properties.php?error=no_property");
    exit();
}

$property_id = (int)$_GET['property_id'];

// Get property details using prepared statement - only selecting existing columns
$stmt = $conn->prepare("SELECT 
    property_id,
    location, 
    price,
    bedroomQuantity,
    status,
    landlord_id
    FROM properties 
    WHERE property_id = ?");
$stmt->bind_param("i", $property_id);
$stmt->execute();
$property = $stmt->get_result()->fetch_assoc();

if (!$property) {
    header("Location: properties.php?error=invalid_property");
    exit();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=apply&property_id=".$property_id);
    exit();
}

// Initialize variables
$success = null;
$error = null;
$message_value = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message']);
    $message_value = htmlspecialchars($message);
    $tenant_id = (int)$_SESSION['user_id'];
    $landlord_id = (int)$property['landlord_id'];
    
    // Validate message
    if (empty($message)) {
        $error = "Please enter an application message";
    } elseif (strlen($message) < 20) {
        $error = "Your message should be at least 20 characters long";
    } else {
        // Verify landlord exists
        $stmt = $conn->prepare("SELECT user_id FROM userinfo WHERE user_id = ?");
        $stmt->bind_param("i", $landlord_id);
        $stmt->execute();
        
        if ($stmt->get_result()->num_rows === 0) {
            $error = "Invalid property owner";
        } else {
            // Submit application
            $stmt = $conn->prepare("INSERT INTO applications (property_id, tenant_id, landlord_id, message, status, application_date) 
                                  VALUES (?, ?, ?, ?, 'pending', NOW())");
            $stmt->bind_param("iiis", $property_id, $tenant_id, $landlord_id, $message);
            
            if ($stmt->execute()) {
                $success = "Application submitted successfully!";
            } else {
                $error = "Error submitting application. Please try again.";
            }
        }
    }
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
  <title>Apply for <?= htmlspecialchars($property['location']) ?> | LandlordPro</title>
  
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
    <?php if(isset($_SESSION['user_id'])): ?>
    <div>
      <a href="logout.php" class="logout-btn">Log Out</a>
    </div>
    <?php endif; ?>
</header>

<nav class="navBar">
  <ul>
    <li><a href="properties.php">PROPERTIES</a></li>
    <li><a href="faqGuidlines.php">FAQ</a></li>
    <li><a href="contactUs.php">CONTACT US</a></li>
    <?php if(!isset($_SESSION['user_id'])): ?>
      <li><a href="logIn.php">LOG IN</a></li>
      <li><a href="signUp.php">SIGN UP</a></li>
    <?php endif; ?>
  </ul>
</nav>

<div class="title">
  <h1>Apply for <?= htmlspecialchars($property['location']) ?></h1>
  <div class="property-meta">
    <span>£<?= number_format($property['price'], 2) ?> per month</span>
    <span><?= $property['bedroomQuantity'] ?> bedrooms</span>
    <span><?= ucfirst($property['status']) ?></span>
  </div>
</div>

<main class="contact-main">
  <?php if ($success): ?>
    <div class="alert alert-success">
      <h3><?= $success ?></h3>
      <p>We've received your application for <?= htmlspecialchars($property['location']) ?>.</p>
      <p>You'll be contacted by the property owner soon.</p>
      <a href="properties.php" class="btn">Back to Properties</a>
    </div>
  <?php else: ?>
    <?php if ($error): ?>
      <div class="alert alert-error">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <section class="contact-form-section">
      <form method="POST" class="contact-form" id="applicationForm">
        <div class="form-group">
          <label for="message">Your Application Message *</label>
          <textarea name="message" id="message" rows="8" placeholder="Tell us about yourself, why you're interested in this property, and any other relevant information..." required><?= $message_value ?></textarea>
          <small>Minimum 20 characters</small>
        </div>
        <div class="form-actions">
          <button type="submit" class="submit-btn">Submit Application</button>
          <a href="properties.php" class="cancel-btn">Cancel</a>
        </div>
      </form>
    </section>
  <?php endif; ?>
</main>

<footer class="site-footer">
  <div class="footer-content">
    <p class="copyright">Copyright &copy; <span id="year">2024</span> LandlordPro</p>
    <div class="footer-links">
      <a href="mailto:landlordpro@gmail.com">Email Us</a>
      <a href="/privacy">Privacy Policy</a>
      <a href="/terms">Terms of Service</a>
    </div>
  </div>
</footer>

<script>
  // Update copyright year
  document.getElementById('year').textContent = new Date().getFullYear();

  // Form validation
  document.getElementById('applicationForm').addEventListener('submit', function(e) {
    const message = document.getElementById('message').value.trim();
    if (message.length < 20) {
      alert('Please write a more detailed application (at least 20 characters)');
      e.preventDefault();
    }
  });
</script>

</body>
</html>