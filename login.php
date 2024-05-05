<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){
   include 'connect.php';
   $username = $_POST['username'];
   $password = $_POST['password'];

   $q = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
   $result = mysqli_query($dbcon, $q);
   
   if($result){
    $num = mysqli_num_rows($result);
    if($num > 0){
        echo '
        <div class="alert alert-success" role="alert">
        Login Successful
</div>';
 session_start();
 $_SESSION['username']=$username;
 header('location:home.php');
      
    }else{
        echo '
        <div class="alert alert-danger" role="alert">
        Invalid username or password
</div>';
    }
  }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <?php
  include 'nav.php';
  ?>
    <div class= "container mt-5">
        <div class="text-center">
    <h1>Login</h1>
</div>
    <form method="post" action="login.php">
    <div class="mb-3" >
  <label class="form-label">Username</label>
  <input type="text" name="username"   class="form-control"  placeholder="Enter username">
</div>
<div class="mb-3">
  <label  class="form-label">Password</label>
  <input type="text" name="password"  class="form-control"  placeholder="Enter Password">
</div>

<input class="btn btn-primary w-100" type="submit" value="Login">

</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
