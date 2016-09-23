<?php require './includes/connections.php'; ?>
<?php
    session_start();
    $user = $_SESSION["user_id"];

    $sqlUser = $db->query("SELECT * FROM users WHERE user_id = '$user'");

    $resultUserRow = $sqlUser->fetch_array(MYSQLI_BOTH);
    $_SESSION["UserName"] = $resultUserRow['username'];
    $_SESSION["UserEmail"] = $resultUserRow['email'];
    $_SESSION["UserPass"] = $resultUserRow['password'];

?>
<?php 
    if(isset($_POST['update_btn'])){
        $updateUserName = $mysqli->real_escape_string($_POST['username']);
        $updateEmail = $mysqli->real_escape_string($_POST['email']);
        $updatePass = $mysqli->real_escape_string($_POST['password']);
        $updatePass2 = $mysqli->real_escape_string($_POST['password2']);

        if($updatePass == $updatePass2) {
            // update user
            $updatePass = md5($updatePass);
            $sqlUser = $db->query("UPDATE `users` SET `username`='{$updateUserName}',`email`='{$updateEmail}',`password`='{$updatePass}' WHERE  `user_id`='{$user}'");
         } else {
            //failed
            $_SESSION['message'] = "The two passwords do not match";
        }

        header('Location: editProfile.php');

    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php require_once './includes/head.php'; ?>
    <body>
        <header>
            <script>
                $(document).ready(function(){
                    $("#my-profile-page").addClass("active");
                });
            </script>
            <?php
                
                include_once "./includes/logged_in_user_tabs.php";
            ?>
            <!-- Top navigation -->
            <?php include_once "./includes/navigation.php"; ?>
            <?php include_once "./includes/title.php"; ?>
            
        </header>

        <section>
            <div class="container-fluid form">
                <form  class="form-horizontal" method="post" action="editProfile.php">
                        <div class="row">
                            <div class="col-md-4 col-sm-3"></div>
                            <div class="col-md-4 col-sm-6 main-form">
                               <div class="row">
                                   <div class="col-sm-12 text-center"><h3>Edit User Info</h3></div>
                               </div>
                                <div class="form-group">
                                    <label class="sr-only" for="username">Userame</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input class="form-control" id="username" name="username" placeholder="Username" value="<?php echo  $_SESSION["UserName"]?>" type="text" tabindex="1">
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="email">Email address</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input class="form-control" id="email" name="email" placeholder="Email" value="<?php echo  $_SESSION["UserEmail"]?>" type="email" tabindex="2">
                                    </div> 
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="password">New Password</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" value="<?php echo  $_SESSION["UserPass"]?>" tabindex="3">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="password2">Repeat New Password</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat new password" tabindex="4">
                                    </div>
                                  </div>
                                  <button type="submit" name="update_btn" class="btn btn-block button-yg login-button">Update Info</button>
                                  <div class="login-register">
                                      <a href="./myprofile.php">Back to my profile</a>
                                  </div>
                            </div>
                            <div class="col-md-4 col-sm-3"></div>
                        </div>
                </form>
            
            </div>    
        </section>

        <!-- To the top link -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up fa-5x" aria-hidden="true"></i></a>
        <?php include_once "./includes/footer.php"; ?>

    </body>
    <script type="text/javascript">
        $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');
    </script>
</html>