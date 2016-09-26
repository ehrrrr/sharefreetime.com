<?php require './includes/connections.php'; ?>
<?php
    session_start();
    $user = $_SESSION["user_id"];
    $sql = $db->query("SELECT * FROM users WHERE user_id = '$user'");
    $result = $sql->fetch_array(MYSQLI_BOTH);
    $_SESSION["UserName"] = $result['username'];
    $_SESSION["UserEmail"] = $result['email'];
    $_SESSION["UserPass"] = $result['password'];
    $_SESSION["FirstName"] = $result['first_name'];
    $_SESSION["LastName"] = $result['last_name'];
    $_SESSION["BirthDate"] = $result['birth_date'];
    $_SESSION["UserGender"] = $result['gender'];
    $_SESSION["HomeCountry"] = $result['country'];
    $_SESSION["HomeCity"] = $result['city'];
    $_SESSION["UserInterests"] = $result['interests'];
    $_SESSION["UserAbout"] = $result['about_me'];
    $_SESSION["UserImage"] = $result['image'];

    $user_identification_first_row =  $_SESSION["UserName"] . "'s profile";

    if($_SESSION["FirstName"] || $_SESSION["LastName"]) {
        $user_identification_first_row = $_SESSION["FirstName"] . " " . $_SESSION["LastName"] . "'s profile";
    }
    
    if($_SESSION["FirstName"]) {
        $user_first_name = $_SESSION["FirstName"];
    } else {
        $user_first_name="no data entered";
    }

    if($_SESSION["LastName"]) {
        $user_last_name = $_SESSION["LastName"];
    } else {
        $user_last_name="no data entered";
    }

    if($_SESSION["BirthDate"]) {
        $user_birth_date = $_SESSION["BirthDate"];
    } else {
        $user_birth_date="no data entered";
    }

    if($_SESSION["UserGender"]){
        $user_gender = $_SESSION["UserGender"];
    } else {
        $user_gender="no data entered";
    }

    if($_SESSION["UserInterests"]) {
        $user_interests = $_SESSION["UserInterests"];
    } else {
        $user_interests="no data entered";
    }

    if($_SESSION["HomeCountry"]){
        $user_country = $_SESSION["HomeCountry"];
    } else {
        $user_country="no data entered";
    }

    if($_SESSION["HomeCity"]){
        $user_city = $_SESSION["HomeCity"];
    } else {
        $user_city="no data entered";
    }

    if($_SESSION["UserAbout"]){
        $user_about = $_SESSION["UserAbout"];
    } else {
        $user_about="no data entered";
    }

    if($_SESSION["UserImage"]) {
        $user_img_path = "Upload/" . $_SESSION["UserImage"];
    } else {
        $user_img_path = "./images/logo/logoYG.png";
    }

    $user_location = "Italy, Genova";
    if($_SESSION["HomeCountry"] || $_SESSION["HomeCity"]) {
        $user_location = $_SESSION["HomeCountry"] . ", " . $_SESSION["HomeCity"];
        $user_location_output = "Your location is in " . $user_location;
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
            <?php include_once "./includes/logged_in_user_tabs.php";?>
            <!-- Top navigation -->
            <?php include_once "./includes/navigation.php"; ?>
            <?php include_once "./includes/title.php"; ?>
        </header>

        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4">
                        <div class="well profile-img-canvas">
                            <img class="profile-img" src="<?php echo $user_img_path;?>" alt="">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row"><h3><?php echo ucfirst($user_identification_first_row); ?></h3></div>
                        <div class="row"><span class="profile_label"><i class="fa fa-user fa" aria-hidden="true"></i> User: </span><?php echo ucfirst($_SESSION["UserName"]); ?></div>
                        <div class="row"><span class="profile_label"><i class="fa fa-envelope fa" aria-hidden="true"></i> E-mail: </span><?php echo ($_SESSION["UserEmail"]); ?></div>
                        <div class="row"><span class="profile_label"><i class="fa fa-user-plus" aria-hidden="true"></i> First Name: </span><?php echo $user_first_name; ?></div>
                        <div class="row"><span class="profile_label"><i class="fa fa-user-plus" aria-hidden="true"></i> Last Name: </span><?php echo $user_last_name; ?></div>
                        <div class="row"><span class="profile_label"><i class="fa fa-calendar-o" aria-hidden="true"></i> Birth Date: </span><?php echo $user_birth_date; ?></div>
                        <div class="row"><span class="profile_label"><i class="fa fa-venus-mars" aria-hidden="true"></i> Gender: </span><?php echo $user_gender; ?></div>
                        <div class="row"><span class="profile_label"><i class="fa fa-heart" aria-hidden="true"></i> I'm interested in: </span>
                        <?php echo $user_interests; ?></div>
                        <div class="row"><span class="profile_label"><i class="fa fa-align-left" aria-hidden="true"></i> About me: </span><?php echo $user_about; ?></div>
                        <div class="row"><span class="profile_label"><i class="fa fa-globe" aria-hidden="true"></i> Country: </span><?php echo $user_country; ?></div>
                        <div class="row"><span class="profile_label"><i class="fa fa-map-marker" aria-hidden="true"></i> City: </span><?php echo $user_city; ?></div>
                    </div>
                    <div class="col-sm-2">
                        <div class="dropdown">
                          <button class="btn btn-block button-yg dropdown-toggle" type="button" data-toggle="dropdown">Edit Profile
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li id="edit_profile"><a href="./edit_data.php">Data</a></li>
                            <li id="edit_account"><a href="./edit_account.php">Account</a></li>
                            <li id="edit_location"><a href="./edit_location.php">Location</a></li>
                            <li id="edit_about_user"><a href="./edit_about_user.php">About Me</a></li>
                            <li id="edit_pictre"><a href="./edit_picture.php">New Picture</a></li> 
                          </ul>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            <div class="row well">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="google-maps-canvas">
                        <?php include "./includes/google_map.php"?>
                    </div>  
                </div>
                <div class="col-sm-1"></div>
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