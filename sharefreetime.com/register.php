<?php require './includes/connections.php'; ?>
<?php 
    if(isset($_POST['register_btn'])) {
        session_start();
        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string($_POST['password']);
        $password2 = $mysqli->real_escape_string($_POST['password2']);
        if($password == $password2) {
            // create user
            $password = md5($password); // hash password for security purposes
            $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
            mysqli_query($db, $sql);
            $_SESSION['message'] = "You are now logged in";
            $_SESSION['username'] = $username;
            header("location: login.php"); // redirect to main page
        } else {
            //failed
            $_SESSION['message'] = "The two passwords do not match";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once './includes/head.php'; ?>
    <body>
        <header>
           <script>
                $(document).ready(function(){
                    $("#register-page").addClass("active");
                });
            </script>
            <?php include_once "./includes/logged_out_user_tabs.php"?>
            <!-- Top navigation -->
            <?php include_once "./includes/navigation.php"; ?>
            <?php include_once "./includes/title.php"; ?>
        </header>
         <section>
            <div class="container-fluid form">
                <form  class="form-horizontal" method="post" action="register.php">
                    <div class="row">
                       <div class="col-md-4 col-sm-3"></div>
                        <div class="col-md-4 col-sm-6 main-login">
                            <div class="form-group">
                                <label class="sr-only" for="username">Userame</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input class="form-control" id="username" name="username" placeholder="Username" required="" type="text" tabindex="1">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">Email address</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input class="form-control" id="email" name="email" placeholder="Email address" required="" type="email" tabindex="2">
                                </div> 
                              </div>
                              <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" required="" placeholder="Password" tabindex="3">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="sr-only" for="password2">Repeat password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" id="password2" name="password2" required="" placeholder="Repeat password" tabindex="4">
                                </div>
                              </div>
                              <button type="submit" name="register_btn" class="btn btn-block button-yg login-button">Register</button>
                              <div class="login-register">
                                  <a href="login.php">Log in</a>
                              </div>
                        </div>
                        <div class="col-md-4 col-sm-3"></div>
                    </div>
                </form>
            </div>
        </section>

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up fa-5x" aria-hidden="true"></i></a>

    </body>
    <script type="text/javascript">
        $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');
    </script>
</html>