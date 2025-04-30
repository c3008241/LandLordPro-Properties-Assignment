<?php 
include 'connect.php';
include 'encryption.php';
session_start();
// $conn = connectDB();



if(isset($_POST['signUp'])){

  
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $userType = $_POST['user_type'];
  $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password !== $confirmPassword) {
        echo "<script>
            alert('Passwords do not match.');
            window.location.href = 'signUp.php';
        </script>";
        exit();
    }

    $encryptedPassword = encrypt($password, "cat");


  $check = "SELECT * FROM userInfo WHERE email = '$email'";
  $result = $conn->query($check);
  if($result->num_rows > 0){
    echo "<script>
        alert('Email already exists!');
        window.location.href = 'signUp.php';
      </script>";
    exit();
  }
  else{

  $sql = "INSERT INTO userInfo (fullName, user_type, email, password) 
      VALUES ('$fullName', '$userType','$email', '$password')";

  if($conn->query($sql) === TRUE){
    $user_id = $conn->insert_id; 
    $_SESSION['user_id'] = $user_id;
    $initialBalance = 1000; 
    
    $accountQuery = "INSERT INTO accounts ( user_id, balance) VALUES( '$user_id' , '$initialBalance')";
    if($conn->query($accountQuery) === TRUE){
      echo "<script>
      alert('Registered successful!');
      window.location.href = 'logIn.php';
    </script>";
    }
  }else{
    echo "Error: " . $conn->error;
    
  }
}
}



 if(isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $encryptedPassword = encrypt($password, "cat");


$query = mysqli_query($conn, "SELECT * FROM userInfo WHERE email = '$email' AND password = '$password'");

if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_assoc($query);
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['email'] = $row['email'];

    header("Location: properties.php");
    exit();
} else {
  echo "<script>
  alert('Invalid Email or Password.');
  window.location.href = 'logIn.php';
</script>";
}

}


?>





