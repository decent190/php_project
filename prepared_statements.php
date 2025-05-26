<?php
require('connect.php');
$full_name ="samuel";
$email="samuelsammy@gmail.com";
$phone_number="07086700446";
$password = "decent01";

$query = "INSERT INTO `users_table`  (full_name,email,phone_number,password) VALUES(?,?,?,?)";
//step 1 - prepare the query
$stmt = $connect->prepare($query);

// step 2 - bind the parameters
  $stmt->bind_param('ssss',$full_name,$email,$phone_number,$password);

  // step 3 - execute
  $saveToDB = $stmt->execute();


  if ($saveToDB){

      echo "data saved successfully";
  }
  else{
    echo "error occured".mysqli_error($connect);
  }
  
?>