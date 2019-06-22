<?php
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $fullname = $email = $address = $phone = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            $param_fullname = trim($_POST["fullname"]);
            $param_email = trim($_POST["email"]);
            $param_address = trim($_POST["address"]);
            $param_phone = trim($_POST["phone"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        $fullname = $_POST['fullname'];
        $email = trim($_POST["email"]);
        $address = trim($_POST["address"]);
        $phone = trim($_POST["phone"]);
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, fullname, email, address, phone) VALUES (?, ?, '$fullname', '$email', '$address', '$phone')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $fullname = $param_fullname;
            $email = $param_email;
            $phone = $param_phone;
            $address = $param_address;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: /login/");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
}

    get_header();
?>











    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 page-content">
                    <div class="inner-box category-content">
                        <h2 class="title-2"><i class="icon-user-add"></i> Create your account, Its free </h2>

                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" action="/register/" method="post">
                                    <fieldset>
                                        <!-- Text input-->
                                        <div class="form-group  row required <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                            <label class="col-md-4 control-label">Username<sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="username" placeholder="Username" class="form-control input-md"
                                                       required="" value="<?php echo $username; ?>" type="text">
                                                <span class="help-block"><?php echo $username_err; ?></span>
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="form-group  row required">
                                            <label class="col-md-4 control-label">Full Name <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="fullname" name="textinput" placeholder="Full Name"
                                                       class="form-control input-md" type="text" required="" value="<?php if(isset($_POST['fullname'])){echo $_POST['fullname']; } ?>">
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group  row required">
                                            <label class="col-md-4 control-label">Phone Number <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="phone" placeholder="Phone Number"
                                                       class="form-control input-md" type="number" value="<?php if(isset($_POST['phone'])){echo $_POST['phone']; } ?>">
                                            </div>
                                        </div>


                                        <!-- Textarea -->
                                        <div class="form-group row">
                                            <label class="col-md-4 control-label" for="textarea">Address</label>

                                            <div class="col-md-6">
                                                <textarea class="form-control" id="textarea" name="address"><?php if(isset($_POST['address'])){echo $_POST['address']; } ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group  row required">
                                            <label for="inputEmail3" class="col-md-4 control-label">Email
                                                <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="email" type="email" class="form-control" id="inputEmail3"
                                                       placeholder="Email" value="<?php if(isset($_POST['email'])){echo $_POST['email']; } ?>">
                                            </div>
                                        </div>
                                        <div class="form-group  row required <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                            <label for="inputPassword3" class="col-md-4 control-label">Password <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="password" type="password" class="form-control" id="inputPassword3"
                                                       placeholder="Password" value="<?php echo $password; ?>" required>
                                                        <span class="help-block"><?php echo $password_err; ?></span>
                                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                                    At least 5 characters
                                                        </small>
                                            </div>
                                        </div>
                                        <div class="form-group  row required <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                            <label for="inputPassword3" class="col-md-4 control-label">Confirm Password <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="confirm_password" type="password" class="form-control" id="inputPassword3"
                                                       placeholder="Confirm Password" value="<?php echo  $confirm_password; ?>" required>
                                                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 control-label"></label>

                                            <div class="col-md-8">
                                                <div style="clear:both"></div>
                                                
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                                <input type="reset" class="btn btn-default" value="Reset">
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.page-content -->

                <div class="col-md-4 reg-sidebar">
                    <div class="reg-sidebar-inner text-center">
                        <div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>

                            <h3><strong>Post a Free Classified</strong></h3>

                            <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. </p>
                        </div>
                        <div class="promo-text-box"><i class=" icon-pencil-circled fa fa-4x icon-color-2"></i>

                            <h3><strong>Create and Manage Items</strong></h3>

                            <p> Nam sit amet dui vel orci venenatis ullamcorper eget in lacus.
                                Praesent tristique elit pharetra magna efficitur laoreet.</p>
                        </div>
                        <div class="promo-text-box"><i class="  icon-heart-2 fa fa-4x icon-color-3"></i>

                            <h3><strong>Create your Favorite ads list.</strong></h3>

                            <p> PostNullam quis orci ut ipsum mollis malesuada varius eget metus.
                                Nulla aliquet dui sed quam iaculis, ut finibus massa tincidunt.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-container -->








<?php get_footer(); ?>