<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <?php    
    session_start();
    $servername = "localhost";
  	$username = "root";
  	$password = "root";
  	$dbname = "pm_huey";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if($conn === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
            // removes backslashes
      $username = stripslashes($_REQUEST['username']);
            //escapes special characters in a string
      $username = mysqli_real_escape_string($conn,$username); 
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($conn,$password);      
      
      $query = "SELECT * FROM admin WHERE username='$username'
and password='".md5($password)."'";
      $result = mysqli_query($conn,$query)  or die(mysqli_error());
      $rows = mysqli_num_rows($result);
            if($rows == 1){
              $_SESSION["sessionvariable"] = "set";
              $_SESSION["usermobile"] = $username;

              header('location: admindashboard.php');
            }else{
                echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";

            }
    }else{?>

      
    <div class="container">
      <div class="row">
        <div class="col-sm">
          
        </div>
        <div class="col-sm">
          <form name="registration" action="" method="post">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" aria-describedby="user" placeholder="Enter username">
            </div>
            
            <div class="form-group">
              <label for="InputPassword1">Password</label>
              <input type="password" class="form-control" id="InputPassword1" name="password" placeholder="Password">
            </div>
            
            <input type="submit" class="btn btn-primary" name="submit" value="Login">
          </form>
          <p>Not registered yet? <a href='registration.php'>Register Here</a></p>
        </div>
        <div class="col-sm">
          
        </div>
      </div>
    </div>
<?php 
}    
?>   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </body>
</html>