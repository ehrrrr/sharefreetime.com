<?php require './includes/connections.php'; ?>
<?php
    session_start();
    $user = $_SESSION["user_id"];

    $sqlUserDetails = $db->query("SELECT * FROM user_details WHERE user_id = '$user'");

        $firstName = '';
        $lastName = '';
        $aboutMe = '';
        $image = '';

    if( $sqlUserDetails) {
        $resultDetailsRow = $sqlUserDetails->fetch_array(MYSQLI_BOTH);
        $_SESSION["FirstName"] = $resultDetailsRow['first_name'];
        $_SESSION["LastName"] = $resultDetailsRow['last_name'];
        $_SESSION["AboutMe"] = $resultDetailsRow['about_me'];
        $_SESSION["Image"] = $resultDetailsRow['image'];
        $firstName = $_SESSION["FirstName"]; 
        $lastName = $_SESSION["LastName"];
        $aboutMe = $_SESSION["AboutMe"];
        $image = $_SESSION["Image"];
    } 
?>
<?php 
    if(isset($_POST['update_btn'])){
        $updateFirstName = $mysqli->real_escape_string($_POST['first-name']);
        $updateLastName = $mysqli->real_escape_string($_POST['last-name']);
        $updateAboutMe = $mysqli->real_escape_string($_POST['about-me']);
        $updateImage = $mysqli->real_escape_string($_POST['image']);

        $sqlUserDetails = $db->query("SELECT * FROM user_details WHERE user_id = '$user'");

        if( $sqlUserDetails != '') {
            $sqlUserDetailsUpdate = $db->query("UPDATE user_details SET `user_id`='{$user}', `first_name`='{$updateFirstName}', `last_name`='{$updateLastName}', `about_me`='{$updateAboutMe}', image='{$updateImage}'");
            
        } else {
            $sqlUserDetailsInsert = "INSERT INTO user_details (user_id, first_name, last_name, about_me, image) VALUES('$user', '{$updateFirstName}', '{$updateLastName}', '{$updateAboutMe}', '{$updateImage}')";
            
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
            <div class="container-fluid">
            <div class="container-fluid form">
                <form  class="form-horizontal" method="post" action="editProfile.php">
                    <div class="well">
                        <div class="row">
                            <div class="col-md-2 col-sm-1"></div>
                            <div class="col-sm-1 login-register my-profile">
                                <a href="./myprofile.php">My profile</a>
                            </div>
                            <div class="col-md-6 col-sm-8"><h1 class="text-center">Edit Profile</h1></div>
                            <div class="col-md-2 col-sm-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-sm-1"></div>
                        <div class="col-md-4 col-sm-5 edit-form">
                            <div class="form-group">
                                <label class="sr-only" for="first-name">First Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input class="form-control" id="first-name" name="first-name" type="text" tabindex="5" placeholder="First Name" value="<?php echo $firstName?>">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="last-name">Last Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input class="form-control" id="last-name" name="last-name" type="text" tabindex="6" placeholder="Last Name" value="<?php echo $lastName?>">
                                </div> 
                              </div>
                              <div class="form-group">
                                <label class="sr-only" for="about-me">About Me</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" id="about-me" name="about-me" placeholder="About Me" tabindex="7"  value="<?php echo $aboutMe?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="sr-only" for="password2">Image</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" id="image" name="image" placeholder="Select image" tabindex="8"  value="<?php echo $image?>">
                                </div>
                              </div>
                        </div>
                        <div class="col-md-2 col-sm-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>
                        <div class="col-md-10 col-sm-10">
                            <button type="submit" name="update_btn" class="btn btn-block button-yg login-button">Update Info</button>
                        </div>
                        <div class="col-md-1 col-sm-1"></div>            
                    </div>
                    </div>
                </form>
            
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