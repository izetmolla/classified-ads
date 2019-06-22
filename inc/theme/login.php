<?php 

get_header();


// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: /account/");
    exit;
}

 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
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
                            header("location: /account/");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
    }
}





 ?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 login-box">
                <div class="panel panel-default">
                    <div class="panel-intro text-center">
                        <h2 class="logo-title"><span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> <?php echo getPageOpt('header_title'); ?><span> </span> </h2>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo get_full_url(); ?>" method="post">
                            <div class="form-group  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label for="sender-email" class="control-label">E-Mail:</label>
                                <div class="input-icon"> <i class="icon-user fa"></i>
                                    <input id="sender-email" type="text" placeholder="Username" class="form-control email" value="<?php echo $username; ?>" name="username">
                                    <span class="help-block"><?php echo $username_err; ?></span>
                                </div>
                            </div>
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label for="user-pass" class="control-label">Password:</label>
                                <div class="input-icon"> <i class="icon-lock fa"></i>
                                    <input type="password" name="password" class="form-control" placeholder="Password" id="user-pass">
                                    <span class="help-block"><?php echo $password_err; ?></span>
                                </div>
                            </div>
                                <div class="form-group">
                                    <input id="buttonin" class="btn btn-primary  btn-block" type="submit" value="Login">
                                </div>
                        </form>
                    </div>
                </div>
                <div class="login-box-btm text-center">
                    <p> <a href="/register/"><strong>Register !</strong> </a> </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>