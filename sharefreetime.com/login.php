<?php require './includes/connections.php'; ?>
<?php 
    if(isset($_POST['login_btn'])) {
        $username = $mysqli->real_escape_string($_POST['username']);
        $password = $mysqli->real_escape_string($_POST['password']);
        
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db, $sql);
            
        if (mysqli_num_rows($result) == 1) {
            
            $row = $result->fetch_array(MYSQLI_BOTH);
            session_start();
            $_SESSION["user_id"] = $row['user_id'];
                        
            $_SESSION['message'] = "You are now logged in";
            $_SESSION['username'] = $username;
            header("location: main.php"); // redirect to main page
        } else {
            $_SESSION['message'] = "Username/Password combination incorrect";
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
                    $("#login-page").addClass("active");
                });
            </script>
            <?php include_once "./includes/logged_out_user_tabs.php"?>
            <!-- Top navigation -->
            <?php include_once "./includes/navigation.php"; ?>
            <?php include_once "./includes/title.php"; ?>
        </header>
        <section>
            <div class="container-fluid form">
                <form  class="form-horizontal" method="post" action="login.php">
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
                            <label class="sr-only" for="password">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" id="password" name="password" required="" placeholder="Password" tabindex="2">
                            </div>
                          </div>
                          <button type="submit" name="login_btn" class="btn btn-block button-yg login-button">Login</button>
                            <div class="login-register">
                                <a href="register.php">Register</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-3"></div>
                    </div>
                </form>
            </div>
        </section>

        <!-- To the top link -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up fa-5x" aria-hidden="true"></i></a>

    </body>
    <script type="text/javascript">
        $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');
    </script>
</html>