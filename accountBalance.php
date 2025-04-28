




<?php
include 'connect.php';
session_start();

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    session_unset();
    session_destroy();
    header("Location: logIn.php");
    exit();
}



$query = "SELECT *
                    FROM userinfo AS u
                    INNER JOIN accounts AS a ON u.user_ID = a.user_id 
                    WHERE u.user_id = $user_id";

$result = $conn->query($query);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $balance = $row['balance'];
  $user_type = $row['user_type'];
  $fullName = $row['fullName'];
  $email = $row['email'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="styling/headerAndFooter.css">
  <link rel="stylesheet" href="style.css">
  <script src = "app.js"></script>
  <link rel="icon" href="images/landlordProLogo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Balance | LandlordPro Properties</title>
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
    <?php 
if(!$user_id){
    echo '<li><a href="logIn.php">LOG IN |</a></li>
    <li><a href="signUp.php">SIGN UP |</a></li>';
}
else if($user_id){
    echo '
    <li><a href="accountBalance.php">ACCOUNT BALANCE |</a></li>
    <li><a href="properties.php">PROPERTIES |</a></li>
';
}
?>   
    <li><a href="faqGuidelines.php">FAQ SUMMARY |</a></li>
    <li><a href="contactUs.php">CONTACT US |</a></li>

  <?php 

  if($user_id){
    echo '<li><a href="logOut.php">LOG OUT</a></li>';
  }
  
  ?>



  </ul>
</nav>


<main>

<div class="accountBalance">
<div class="title">
  <h1>Account Balance</h1>
</div>
    

<h1>
<?php 

echo '£'. $balance;

?>
</h1>

<div class="row">
<p class= "logIn" onclick="showAccountDetails()"  id="accountInfo" >Account Details</p>
<p class= "logIn" onclick="showSendMoney()"  >Send Money</p>
</div>

</div>



<div class="sendMoney">
  <div class="title">
    <h1>Make A Payment</h1>
  </div>

  <form action="sendToLandlord.php" method="post" >
    
  <label for="email">Reciever Email:</label>
  <input type="email" name="email">


  <label for="amount">Amount:</label>
  <input type="number" name= "amount" value="amount">

  <input  type="submit" class= "logIn" name="sendMoney" value="Send">

  </form>

  <button class= "logIn"  onclick="backToAccount()"  id="back" >Back</button>
  
</div>






<div class="accountDetails">
  <h2>
  <?php 

  echo $fullName . '<br>';
  echo '<br>';
  echo $user_type . '<br>';
  echo '<br>';
  echo $email;
  echo '<br>';
  echo '<br>';

  echo '<button class= "logIn"  onclick="backToAccount()"  id="back" >Back</button>'
    ?>
  </h2>

</div>



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