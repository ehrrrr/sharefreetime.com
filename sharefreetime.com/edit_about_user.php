<?php require './includes/connections.php'; ?>
<?php
    session_start();
    $user = $_SESSION["user_id"];

    $sql = $db->query("SELECT * FROM users WHERE user_id = '$user'");
    $result = $sql->fetch_array(MYSQLI_BOTH);

    $_SESSION["UserInterests"] = $result['interests'];
    $_SESSION["UserAbout"] = $result['about_me'];


    if($_SESSION["UserInterests"]){
        $currIntr = '<p class="text-center"><i>Your current interes is <b>'.$_SESSION["UserInterests"].'</b></i></p>';
    } else {
        $currIntr= '<p class="text-center"><i>No previous data for interests.</i></p>';
    }

?>
<?php 
    if(isset($_POST['update_btn'])){
        
        $updateInterests = $mysqli->real_escape_string($_POST['category']);
        $updateAboutMe = $mysqli->real_escape_string($_POST['about_me']);
        
        if($updateInterests) {
            $sqlUser = $db->query("UPDATE `users` SET `interests`='{$updateInterests}' WHERE  `user_id`='{$user}'");
        }
        
        if($updateAboutMe) {
            $sqlUser = $db->query("UPDATE `users` SET `about_me`='{$updateAboutMe}' WHERE  `user_id`='{$user}'");    
        }
        

        header('Location: myprofile.php');

    }
?>
<!DOCTYPE html>
<html lang="en">
          <?php $customAdds = '<script src="//cdn.ckeditor.com/4.5.11/basic/ckeditor.js"></script>'
    ?>
    <?php require_once './includes/head.php'; ?>
    <body>
        <header>
            <script>
                $(document).ready(function(){
                    $("#my-profile-page").addClass("active");
                });
            </script>
            <?php include_once "./includes/logged_in_user_tabs.php"; ?>
            <!-- Top navigation -->
            <?php include_once "./includes/navigation.php"; ?>
            <?php include_once "./includes/title.php"; ?>
            
        </header>

        <section>
            <div class="container-fluid form">
                <form  class="form-horizontal" method="post" action="edit_about_user.php">
                        <div class="row">
                            <?php include "./includes/sidebar.php"?>
                            <div class="col-md-5 col-sm-8 main-form">
                               <div class="row">
                                   <div class="col-sm-12 text-center"><h3>Edit About Me</h3></div>
                               </div>
                            <?php echo $currIntr; ?>
                             <div id="" class=""><?php include "./includes/categories.php"; ?></div>
                             <div class="form-group">
                                <label class="sr-only" for="about_me">About me</label>
                                <textarea class="form-control" id="about_me" name="about_me" placeholder="About me... <?php echo $_SESSION["UserAbout"]?> " rows="5"></textarea>

                                <script>
                                    CKEDITOR.replace( 'about_me' );
                                </script>
                            </div>
                                
                              <button type="submit" name="update_btn" class="btn btn-block button-yg login-button">Update</button>
                              <div class="login-register">
                                  <a href="./myprofile.php">Back to my profile</a>
                              </div>
                            </div>
                            <div class="col-md-3 col-sm-1"></div>
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