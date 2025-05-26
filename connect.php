<?php
 $host ='localhost';
 $username='root';
 $db_password='';
 $database='january_php';
 $connect=mysqli_connect($host,$username,$db_password,$database);

 if (!$connect){
    
    echo "Database connection failed".mysqli_connect_error();
 }
?>