<?php 
include 'connect.php';
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="styling\headerAndFooter.css">
  <link rel="stylesheet" href="styling\style.css">
  <link rel ="icon" href="images/landlordProLogo.png" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Log In | LandlordPro Properties</title>
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
    <li><a href="contactUs.php">CONTACT US</a></li>
  </ul>
</nav>

<div class="title">
      <h1>Properties</h1>
</div>
    
<main>




<?php

// $query = mysqli_query($conn, "SELECT * FROM userInfo WHERE user_ID = '3'");


// if($query){
//     $row = mysqli_fetch_assoc($query);
//     echo "User Name: " . $row['fullName'];
// } else {
//     echo "Error: " . mysqli_error($conn);
// }





// if(isset($_SESSION['user_ID'])){
//   $user_ID = $_SESSION['user_ID'];
  
//   // Query the database for the user's information
//   $query = mysqli_query($conn, "SELECT fullName FROM userInfo WHERE user_ID = '$user_ID'");
  
//   if($query){
//     $row = mysqli_fetch_assoc($query);
//     echo "User Name: " . $row['fullName'];
//   } else {
//     echo "Error: " . mysqli_error($conn);
//   }
// } else {
//   echo "User is not logged in.";
// }


?>


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