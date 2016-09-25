<?php require './includes/connections.php'; ?>
<?php
    session_start();
    $user = $_SESSION["user_id"];

    $sql = $db->query("SELECT * FROM users WHERE user_id = '$user'");
    $result = $sql->fetch_array(MYSQLI_BOTH);

    $_SESSION["HomeCountry"] = $result['country'];
    $_SESSION["HomeCity"] = $result['city'];

    if($_SESSION["HomeCountry"]){
        $currCountry = '<p class="text-center"><i>Your current country is <b>'.$_SESSION["HomeCountry"].'</b></i></p>';
    } else {
        $currCountry = '<p class="text-center"><i>No previous data for country.</i></p>';
    }
    if($_SESSION["HomeCity"]){
        $currCity = '<p class="text-center"><i>Your current city is <b>' . $_SESSION["HomeCity"] . '</b></i></p>';
    } else {
        $currCity = '<p class="text-center"><i>No previous data for city.</i></p>';
    }
?>
<?php 
    if(isset($_POST['update_btn'])){
        
        $updateCountry = $mysqli->real_escape_string($_POST['country']);
        $updateCity = $mysqli->real_escape_string($_POST['city']);

        $sqlUser = $db->query("UPDATE `users` SET `country`='{$updateCountry}', `city`='{$updateCity}' WHERE  `user_id`='{$user}'");

        header('Location: edit_location.php');

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
                              <div style="width:180px;max-width:100%;overflow:hidden;height:260px;color:red;"><div id="gmap-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $_SESSION["HomeCity"] ?>&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="code-for-google-map" rel="nofollow" href="https://www.interserver-coupons.com" id="grab-maps-authorization">InterserverCoupons</a><style>#gmap-display img{max-width:none!important;background:none!important;font-size: inherit;}</style></div><script src="https://www.interserver-coupons.com/google-maps-authorization.js?id=5a90af71-f93d-9f47-27f2-319ace95cc94&c=code-for-google-map&u=1474763665" defer="defer" async="async"></script>
                            </div>
                        </div>
                </form>
            <div class="row well">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div style="width:100%;overflow:hidden;height:500px;color:red;"><div id="gmap-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $_SESSION["HomeCountry"] . ', ' . $_SESSION["HomeCity"] ?>&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="code-for-google-map" rel="nofollow" href="https://www.interserver-coupons.com" id="grab-maps-authorization">InterserverCoupons</a><style>#gmap-display img{max-width:none!important;background:none!important;font-size: inherit;}</style></div><script src="https://www.interserver-coupons.com/google-maps-authorization.js?id=5a90af71-f93d-9f47-27f2-319ace95cc94&c=code-for-google-map&u=1474763665" defer="defer" async="async"></script>
   
                </div>
                <div class="col-sm-2"></div>
            </div>
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