<?php
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
include 'navigation.php';
// Include config file
include 'config.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}

?>
<html>
<head><link rel='stylesheet' href = 'login.css'>
</head>
 <body>
     <h1 style="color:green">
       Log In
     </h1>
     <div>
     <form method="POST" action="login.php">
         <strong>Username:</strong>
         <input type="text" name="username" id="username" />
         <br><br>
         <strong>Password:</strong>
         <input type="password" name="password" id="password" />
         <br><br>
         <input type="checkbox" onclick="showPassword()">
           Show password
         <script>
             function showPassword() {
                 var x = document.getElementById("password");
                 if (x.type == "password") {
                     x.type = "text";
                 }
             }
         </script>
         <br><br>
         <input type="submit" name="submit" value="Log In"
                style="background-color:#4CAF50;
                       color:white;padding:10px 25px;
                       text-align:center;font-size:15px;
                       cursor:pointer;" />
         <br>
         <p>Forgot Password? <a href="reset-password.php">Reset Password</a>.</p>
         <p>Don't have an account? <a href="register.php">Register here</a>.</p>

     </form>
</div>
 </body>
  
 </html>