<?php 
session_start();
include 'connect.php';
include 'encryption.php';



if(isset($_POST['addProperty'])){

    $propertyName = $_POST['propertyName'];
    $propertyAddress = $_POST['propertyAddress'];
    $propertyType = $_POST['propertyType'];
    $bedrooms = $_POST['bedrooms'];
    $rentAmount = $_POST['rentAmount'];
    $propertyDescription = $_POST['propertyDescription'];
    $propertyImg = $_POST['propertyImg'];
  
  
    $check = "SELECT * FROM addProperties WHERE propertyName = '$propertyName'";
    $result = $conn->query($check);
    if($result->num_rows > 0){
      echo "That property already exists";
      exit();
    }
  }
    else{
  
    $sql = "INSERT INTO addProperties (propertyName, propertyAddress, propertyType, bedrooms, rentAmount, propertyDescription , propertyImg)
        VALUES ('$propertyName', '$propertyAddress', '$propertyType', '$bedrooms', '$rentAmount', '$propertyDescription' , '$propertyImg')"; 

    if($conn->query($sql) === TRUE){
      echo "Added property successfully";
    }else{
      echo "Error: " . $conn->error;
      
    }
  }



?>