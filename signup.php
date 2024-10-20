<?php 
$showError = false;
$showAlert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'partials/_dbconnect.php';
  $fname = $_POST["fname"];
  $date = $_POST["date"];
  $address = $_POST["address"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  //$exists = false;

  //check whether this username Exists
  
  $existSql ="SELECT * FROM `users` WHERE username = '$username'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows > 0){
    //$exists = true;
    $showError = " Username Already exists.";
  }
  else{
    //$exists = false;
      if($password == $cpassword){
        $sql ="INSERT INTO `users` (`fname`, `username`, `password`, `date`, `address`) VALUES ('$fname', '$username', '$password', '$date', '$address')";
        //$sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
          $showAlert = true;
        }    
      }
      else{
        $showError = " Password do not match.";
      }
  } 

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
      <?php require 'partials/_nav.php' ?>

      <?php 
      if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
      if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>' . $showError .'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
      ?>
      <div class="container my-4">
        <h1 class="text-center">SignUp to our website</h1>

        <form action="/Login-Registration-Form/signup.php" method="post">
            <div class="mb-3">
                <label for="fname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp" required>                
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp" required>                
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" required>
                
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">                
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Create Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm passowrd</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>
            <div id="emailHelp" class="form-text">Make sure to type the same password.</div>            
            <button type="submit" class="btn btn-primary">SingUp</button>
        </form>

      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>