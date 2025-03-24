<?php
include 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="styling/headerAndFooter.css">
  <link rel="stylesheet" href="styling/style.css">
  <link rel="stylesheet" href="styling/properties.css">
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
      <li><a href="invest.php">INVEST |</a></li>
      <li><a href="contactUs.php">CONTACT US</a></li>
    </ul>
  </nav>

  <div class="title">
    <h1>Properties</h1>
  </div>

  <main>
    <div class="filters">
      <form method="GET" action="properties.php">
        <label for="location">Location:</label>
        <select id="location" name="location">
          <option value="">Any</option>
          <option value="Sheffield">Sheffield</option>
          <option value="Manchester">Manchester</option>
          <option value="Leeds">Leeds</option>
          <option value="London">London</option>
        </select>

        <label for="price">Price Range:</label>
        <select id="price" name="price">
          <option value="">Any</option>
          <option value="0-500">£0 - £500</option>
          <option value="500-1000">£500 - £1000</option>
          <option value="1000-2000">£1000 - £2000</option>
        </select>

        <label for="bedrooms">Bedrooms:</label>
        <select id="bedrooms" name="bedrooms">
          <option value="">Any</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3+</option>
        </select>

        <button type="submit">Apply Filters</button>
      </form>
    </div>

    <div class="properties-container">
      <?php
      $location = isset($_GET['location']) ? $_GET['location'] : '';
      $price = isset($_GET['price']) ? $_GET['price'] : '';
      $bedrooms = isset($_GET['bedrooms']) ? $_GET['bedrooms'] : '';

      $query = "SELECT * FROM properties WHERE 1=1";
      if (!empty($location)) {
        $query .= " AND location = '$location'";
      }
      if (!empty($price)) {
        list($minPrice, $maxPrice) = explode('-', $price);
        $query .= " AND price BETWEEN $minPrice AND $maxPrice";
      }
      if (!empty($bedrooms)) {
        $query .= " AND bedrooms >= $bedrooms";
      }

      $result = mysqli_query($conn, $query);

      if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
          <div class="property-card">
            <img src="' . $row['image_url'] . '" alt="' . $row['title'] . '">
            <h3>' . $row['title'] . '</h3>
            <p><strong>Location:</strong> ' . $row['location'] . '</p>
            <p><strong>Price:</strong> £' . $row['price'] . '</p>
            <p><strong>Bedrooms:</strong> ' . $row['bedrooms'] . '</p>
          </div>';
        }
      } else {
        echo '<p>No properties found.</p>';
      }
      ?>
    </div>
  </main>

  <footer>
    <div class="footerItems">
      <div id="copyRight">
        Copyright &#169; <span id="currentYear"></span> LandlordPro Properties
      </div>
      <div class="emails">
        <a href="mailto:info@smartpay.com">info@smartpay.com</a>
        <a href="mailto:contact@smartpay.com">contact@smartpay.com</a>
      </div>
    </div>
  </footer>

  <script>
    document.getElementById("currentYear").textContent = new Date().getFullYear();
  </script>

</body>
</html>

jalalah aljalal