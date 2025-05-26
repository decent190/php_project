<?php

require('connect.php');

$message='';

if(isset($_POST['register'])){
 $full_name =$_POST['full_name'];
 $phone_number =$_POST['phone_number'];
 $email =$_POST['email'];
 $password =$_POST['password'];

if (empty($full_name) || empty($email) || empty($phone_number) || empty($password)){
    $message = 'please fill all fields';
   
}elseif(strlen($password)<8){
    $message='password must not be less than 8 characters';
}
else{
   

    if ($connect){
        $checkQuery="SELECT * FROM users_table WHERE email='$email' OR phone_number='$phone_number'";
        $results = mysqli_query($connect,$checkQuery);
         if(mysqli_num_rows($results)>0){
            $message="user already exists";
         }else{
            
             $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
             $query="INSERT INTO`users_table`(full_name,email,phone_number, password,profile_picture)VALUES('$full_name','$email','$phone_number','$hashedpassword','avater.jpg')";
            $saveToDb= mysqli_query($connect,$query);
            
                   if($saveToDb){
                    header('location:signin.php');
                   }else{
                    echo"error occured,please try  again later";
                    echo mysqli_error($connect);
                    die();
                   }
                   
                }
         };

   }

  
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    
<div class='shadow-lg p-5 w-50 mx-auto mt-4'>
    <div class="mb-3 ">
        <form action="form.php" method="post">
            <?php
                 echo"<p class='text-danger text-center fs-5'>".$message."</p>" ;
            ?> <br>
             <!-- <h2 class='text-success text-center fs-3 text-decoration-underline'>SignUp Here</h2> -->
  <label for="exampleFormControlInput1" class="form-label fs-5">Full Name</label>
  <input type="text" class="form-control " id="exampleFormControlInput1" name='full_name' ></input>

  <label for="exampleFormControlInput1" class="form-label fs-5 mt-2">Phone number</label>
  <input type="number" class="form-control" id="exampleFormControlInput1" name='phone_number' ></input>

  <label for="exampleFormControlInput1" class="form-label mt-2 fs-5">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name='email' ></input>
  <label for="exampleFormControlInput1" class="form-label mt-2 fs-5">Password</label>
  <input type="password" class="form-control" id="exampleFormControlInput1" name='password'></input>
  <div class='mt-3 text-center'>
  <button  class="btn btn-success fs-5 px-5" name="register"  type="submit">Register</button>
  </div>
</div>
    </div>
</form>
</body>
</html>