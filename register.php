<?php 
include 'connect.php';
include 'encryption.php';
session_start();


if(isset($_POST['signUp'])){

  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $userType = $_POST['userType'];
  $password = encrypt($_POST['password'], "cat");


  $check = "SELECT * FROM userInfo WHERE email = '$email'";
  $result = $conn->query($check);
  if($result->num_rows > 0){
    echo "Email already exists";
    exit();
  }
  else{

  $sql = "INSERT INTO userInfo (fullName, email, password) 
      VALUES ('$fullName', '$email', '$password' , '$userType')";
  if($conn->query($sql) === TRUE){
    header("Location: logIn.php");
    echo "<script>alert('New record created successfully');</script>";

  }else{
    echo "Error: " . $conn->error;
    
  }
}
}



 if(isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


$password = encrypt($_POST['password'], "cat");

$query = mysqli_query($conn, "SELECT * FROM userInfo WHERE email = '$email' AND password = '$password'");

if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_assoc($query);
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['email'] = $row['email'];

    header("Location: properties.php");
    exit();
} else {
    echo "Invalid email or password.";
}

}


?>





