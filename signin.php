
<?php
require('connect.php');
session_start();

$_SESSION['message']='this is a session message';

if(!isset ($_SESSION['login_time'])){
  
  $message='session has expired.please login again';
}
$message='';

if(isset($_POST['signin'])){
 $email =$_POST['email'];
 $password =$_POST['password'];

 $query="SELECT * FROM users_table WHERE email='$email'";
  $result=mysqli_query($connect,$query);
  

  if (mysqli_num_rows($result)>0){
    $foundUser = mysqli_fetch_assoc($result);
    if(password_verify($password,$foundUser['password'])){
      $_SESSION['user']=$foundUser;
      $login_time =time();
      
      $_SESSION['login_time'] =$login_time;
      header('Location:dashboard.php');
    }
  else{
    echo "password is incorrect or invalid email";
  }
  }
  // else{
  //   echo "user not found";
  // }

// if (empty($email)  || empty($password)){
//     $message = 'please fill all fields';
   
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
        <form action="signin.php" method="post">
            <?php
                 echo"<p class='text-danger text-center fs-5'>".$message."</p>" ;
            ?> <br>
             <!-- <h2 class='text-success text-center fs-3 text-decoration-underline'>SignUp Here</h2> -->
 
  <label for="exampleFormControlInput1" class="form-label mt-2 fs-5">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name='email' ></input>
  <label for="exampleFormControlInput1" class="form-label mt-2 fs-5">Password</label>
  <input type="password" class="form-control" id="exampleFormControlInput1" name='password'></input>
  <div class='mt-3 text-center'>
  <button  class="btn btn-success fs-5 px-5" name="signin"  type="submit">Signin</button>
  </div>
</div>
    </div>
</form>
</body>
</html>