<?php


include 'connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    session_unset();
    session_destroy();
    header("Location: logIn.php");
    exit();
}

$user_id = (int)$_SESSION['user_id'];


$stmt = $conn->prepare("SELECT user_type FROM userinfo WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

if (!$result) {
    header("Location: logIn.php");
    exit();
}

$userType = $result['user_type'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="styling/headerAndFooter.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="addProperties.css">
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

    <?php if($user_id): ?>
    <div>
      <a href="logOut.php">LogOut</a>
    </div>
    <?php endif; ?>
  </header>

  <nav class="navBar">
    <ul>
    <?php if($userType === 'landlord'): ?>
            <li><a href="landlord_applications.php" style="color:#4CAF50;font-weight:bold;">VIEW APPLICATIONS |</a></li>
        <?php endif; ?>
      <li><a href="logIn.php">LOG IN |</a></li>
      <li><a href="signUp.php">SIGN UP |</a></li>
      <li><a href="properties.php">PROPERTIES |</a></li>
      <li><a href="contactUs.php">CONTACT US</a></li>
      <li><a href="faqGuidlines.php">FAQ GUIDLINE</a></li>
      
    </ul>
    
  </nav>

  <div class="findProperties">
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
        <?php 
        $properties = mysqli_query($conn, "SELECT * FROM properties");
        while($property = mysqli_fetch_assoc($properties)) {
            echo '<div class="property-card">';
            echo '<h3>'.htmlspecialchars($property['title'] ?? $property['location']).'</h3>';
            echo '<p>Location: '.htmlspecialchars($property['location']).'</p>';
            echo '<p>Price: £'.htmlspecialchars($property['price']).'</p>';
            echo '<p>Bedrooms: '.htmlspecialchars($property['bedroomQuantity']).'</p>';
            
            if ($userType === 'tenant') {
              echo '<form action="apply.php" method="GET" style="display:inline;">
                    <input type="hidden" name="property_id" value="'.$property['property_id'].'">
                    <button type="submit" style="background:#4CAF50;color:white;padding:5px 10px;border:none;border-radius:3px;cursor:pointer;">
                      Apply Now
                    </button>
                    </form>';
          }
            
            echo '</div>';
        }
        ?>
      </div>
    </main>

    <?php if ($userType == 'landlord'): ?>
    <div class="addProperties">
      <div class="title">
        <h1>Add Properties</h1>
      </div>
      <main class="main-content">
        <div class="container">
          <div class="property-form-container">
            <form action="addProperties.php" method="POST" class="property-form">
              <div class="form-grid">
                <div class="form-group">
                  <label for="property-name">Property Name</label>
                  <input type="text" id="property-name" name="propertyName" required>
                </div>
                <div class="form-group">
                  <label for="property-address">Address</label>
                  <input type="text" id="property-address" name="propertyAddress" required>
                </div>
                <div class="form-group">
                  <label for="property-type">Property Type</label>
                  <select id="property-type" name="propertyType" required>
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
                  <input type="number" id="rent-amount" name="rentAmount" min="0" step="0.01" required>
                </div>
                <div class="form-group full-width">
                  <label for="property-description">Description</label>
                  <textarea id="property-description" name="propertyDescription" rows="4"></textarea>
                </div>
                <div class="form-group full-width">
                  <label for="property-image">Upload Images</label>
                  <input type="file" id="property-image" name="propertyImg" multiple accept="image/*">
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-primary" name="addProperty">Save Property</button>
                <button type="reset" class="btn btn-secondary">Reset Form</button>
              </div>
            </form>
          </div>
        </div>
      </main>
    </div>
    <?php endif; ?>
  </div>

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

  <script>
    document.getElementById('propertyFilters').addEventListener('submit', function(e) {
    e.preventDefault();
    

    const formData = new FormData(this);
    const params = new URLSearchParams(formData);
    
  
    fetch('filter-properties.php?' + params.toString())
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
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
  </script>
</body>
</html>