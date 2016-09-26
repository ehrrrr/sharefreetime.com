<?php require './includes/connections.php'; ?>
<?php
    session_start();
    $user = $_SESSION["user_id"];

    $sql = $db->query("SELECT * FROM users WHERE user_id = '$user'");
    $result = $sql->fetch_array(MYSQLI_BOTH);

    $_SESSION["HomeCountry"] = $result['country'];
    $_SESSION["HomeCity"] = $result['city'];
    $user_location = "";

    if($_SESSION["HomeCountry"]){
        $currCountry = '<p class="text-center"><i>Your current country is <b>'.$_SESSION["HomeCountry"].'</b></i></p>';
        $user_location = $_SESSION["HomeCountry"]; 
    } else {
        $currCountry = '<p class="text-center"><i>No previous data for country.</i></p>';
    }
    if($_SESSION["HomeCity"]){
        $currCity = '<p class="text-center"><i>Your current city is <b>' . $_SESSION["HomeCity"] . '</b></i></p>';
        $user_location = $user_location . ', ' . $_SESSION["HomeCity"]; 
    } else {
        $currCity = '<p class="text-center"><i>No previous data for city.</i></p>';
    }
?>
<?php 
    if(isset($_POST['update_btn'])){
        
        $updateCountry = $mysqli->real_escape_string($_POST['country']);
        $updateCity = $mysqli->real_escape_string($_POST['city']);

        $sqlUser = $db->query("UPDATE `users` SET `country`='{$updateCountry}', `city`='{$updateCity}' WHERE  `user_id`='{$user}'");

        header('Location: myprofile.php');

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
            <?php include_once "./includes/logged_in_user_tabs.php"; ?>
            <!-- Top navigation -->
            <?php include_once "./includes/navigation.php"; ?>
            <?php include_once "./includes/title.php"; ?>
            
        </header>

        <section>
            <div class="container-fluid form">
                <form  class="form-horizontal" method="post" action="edit_location.php">
                    <div class="row">
                        <?php include "./includes/sidebar.php"?>
                        <div class="col-md-4 col-sm-6 main-form">
                           <div class="row">
                               <div class="col-sm-12 text-center"><h3>Edit Location Data</h3></div>
                           </div>
                            <?php echo $currCountry?>
                            <?php echo $currCity?>
                            <div id="" class=""><?php include "./includes/countries.php"; ?></div>

                          <button type="submit" name="update_btn" class="btn btn-block button-yg login-button">Update</button>
                          <div class="login-register">
                              <a href="./myprofile.php">Back to my profile</a>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-3">                    
                          <div class="gmap-small google-maps-canvas">
                              <?php include "./includes/google_map.php"?>
                          </div>
                        </div>
                    </div>
                    <div class="row well">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <div class="google-maps-canvas">
                                <?php include "./includes/google_map.php"?>
                            </div>  
                        </div>
                        <div class="col-sm-2"></div>
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