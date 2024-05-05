<?php 

$success = 0; // Variable naming corrected: `$success` instead of `$succes`
$user = 0;

if($_SERVER['REQUEST_METHOD'] == "POST"){
   include 'connect.php';
   $username = $_POST['username'];
   $password = $_POST['password'];

   // Define the query string before executing
   $q = "SELECT * FROM `users` WHERE username='$username'";
   $result = mysqli_query($dbcon, $q);
   
   if($result){
    $num = mysqli_num_rows($result);
    if($num > 0){
      //echo "user already exist";
      $user = 1; // Set `$user` to 1 if the username already exists
    }else{
      $q = "INSERT INTO `users`(username,password) VALUES ('$username','$password')";
      $result = mysqli_query($dbcon, $q);
      try{
        if($result){
          //echo "You have Signed Up successfully";
          $success = 1; // Variable naming corrected: `$success` instead of `$sucess`
        header('location:login.php');
        }
      } catch(Error $e) {
          $e->getMessage();
          print "The server is busy, please try again later.";
      }
    }
  }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <?php 
  if($user){
    echo
    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <h3>Username is not available</h3>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  else if($success){
    echo
    '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <h3>User has created!</h3>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  ?>
    <div class= "container mt-5">
        <div class="text-center">
    <h1>User Form</h1>
</div>
    <form method="post" action="sign-up.php">
    <div class="mb-3" >
  <label class="form-label">Username</label>
  <input type="text" name="username"   class="form-control"  placeholder="Enter username">
</div>
<div class="mb-3">
  <label  class="form-label">Password</label>
  <input type="text" name="password"  class="form-control"  placeholder="Enter Password">
</div>

<input class="btn btn-primary w-100" type="submit" value="Sign Up">

</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
