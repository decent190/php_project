<?php
require('connect.php');
$email = "samuelsammy@gmail.com";
$query = "SELECT * FROM  users_table WHERE email= ? ";

$stmt = $connect->prepare($query);
$stmt->bind_param('s',$email);
 $stmt->execute(); 

$foundUser= mysqli_stmt_get_result($stmt);

$user = mysqli_fetch_assoc($foundUser); 
print_r($user);
?>