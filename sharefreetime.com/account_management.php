<?php
	if(isset($_FILES['upload_img_field'])){
		// Creates the Variables needed to upload the file
		$UploadName = $_FILES['upload_img_field']['name'];
		$UploadName = mt_rand(100000, 999999).$UploadName;
		$UploadTmp = $_FILES['upload_img_field']['tmp_name'];
		$UploadType = $_FILES['upload_img_field']['type'];
		$FileSize = $_FILES['upload_img_field']['size'];
		
		// Removes Unwanted Spaces and characters from the files names of the files being uploaded
		$UploadName = preg_replace("#[^a-z0-9.]#i", "", $UploadName);
        
        session_start();
        $_SESSION["UserPic"] = $UploadName;
        
		// Upload File Size Limit 
		if(($FileSize > 125000)){
			
			die("Error - File too Big");
			
		}
		// Checks a File has been Selected and Uploads them into a Directory on your Server
		if(!$UploadTmp){
			die("No File Selected, Please Upload Again");
		}else{
			move_uploaded_file($UploadTmp, "Upload/$UploadName");
		}
	}
?>
<?php require './includes/connections.php'; ?>
<?php
        session_start();
        $user = $_SESSION["user_id"];
        $sql = $db->query("SELECT * FROM users WHERE user_id = '$user'");
        $result = $sql->fetch_array(MYSQLI_BOTH);
//        $_SESSION["UserName"] = $result['username'];
//        $_SESSION["UserEmail"] = $result['email'];
//        $_SESSION["UserPass"] = $result['password'];
//        $_SESSION["FirstName"] = $result['first_name'];
//        $_SESSION["LastName"] = $result['last_name'];
//        $_SESSION["BirthDate"] = $result['birth_date'];
//        $_SESSION["UserGender"] = $result['gender'];
//        $_SESSION["HomeCountry"] = $result['country'];
//        $_SESSION["HomeCity"] = $result['city'];
//        $_SESSION["UserInterests"] = $result['interests'];
//        $_SESSION["UserAbout"] = $result['about_me'];
//        $_SESSION["UserImage"] = $result['image'];
?>
<?php  
    if(isset($_POST['update_btn'])){
//        $updateUserName = $mysqli->real_escape_string($_POST['username']);
//        $updateEmail = $mysqli->real_escape_string($_POST['email']);
//        $updateFirstName = $mysqli->real_escape_string($_POST['first_name']);
//        $updateLastName = $mysqli->real_escape_string($_POST['last_name']);
//        $updateBirthDate = $mysqli->real_escape_string($_POST['birth_date']);
//        $updateGender = $mysqli->real_escape_string($_POST['gender']);
//        $updateCountry = $mysqli->real_escape_string($_POST['country']);
//        $updateCity = $mysqli->real_escape_string($_POST['city']);
//        $updateInterests = $mysqli->real_escape_string($_POST['interests']);
//        $updateAboutMe = $mysqli->real_escape_string($_POST['about_me']);
//        $updateImage = $mysqli->real_escape_string($UploadName);

        $sql = $db->query("UPDATE `users` SET `username`='{$updateUserName}',`email`='{$updateEmail}', `first_name`='{$updateFirstName}',`last_name`='{$updateLastName}',`birth_date`='{$updateBirthDate}',`gender`='{$updateGender}',`city`='{$updateCity}',`country`='{$updateCountry}',`interests`='{$updateInterests}',`about_me`='{$updateAboutMe}',`image`='{$updateImage}' WHER  `user_id`='{$user}'");

        header('Location: account_management.php');

    }
?>
<!DOCTYPE html>
<html lang="en">
       <?php $customAdds = 
        '<!-- for Date Range Picker -->
        <!-- Include Required Prerequisites -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />

        <!-- Include Date Range Picker -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <script src="//cdn.ckeditor.com/4.5.11/basic/ckeditor.js"></script>'
    ?>
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
                <form  class="form-horizontal" method="post" action="edit_profile.php">
                   <div class="well">
                        <div class="row">
                            <div class="col-sm-12 text-center"><h3>Manage Account</h3></div>
                        </div>
                        <div class="row">
                           <div class="col-sm-1"></div>
                            <div class="well col-sm-2">
                                <div id="upload_image"></div>
                                <form action="account_management.php" method="post" enctype="multipart/form-data" name="img_upload" id="img_upload">
<!--                                    <div class="form-group">-->
                                        <label class="btn btn-default btn-file">
                                            Browse <input type="file" name="upload_img_field" id="upload_img_field" style="display: none;">
                                        </label>
<!--                                    </div>                                    -->
                                </form>
                            </div>
                            <div class="well col-sm-4">
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
                                    <label class="sr-only" for="first_name">First name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                                        <input class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo  $_SESSION["FirstName"]?>" type="text" tabindex="3">
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="last_name">Last name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                                        <input class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo  $_SESSION["LastName"]?>" type="text" tabindex="4">
                                    </div> 
                                </div>
                            </div>
                            
                            <div class="well col-sm-4">
                                <div id="" class=""><?php include "./includes/gender.php";?></div>
                                <div id="" class=""><?php include "./includes/countries.php"; ?></div>
                                <div id="" class=""><?php include "./includes/categories.php"; ?></div>

                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="sr-only" for="about_me">About me</label>
                                    <textarea class="form-control" id="about_me" name="about_me" placeholder="About me..." value="<?php echo  $_SESSION["UserAbout"]?>" rows="3"></textarea>
                                    <script>
                                        CKEDITOR.replace( 'about_me' );
                                    </script>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <button type="submit" name="update_btn" class="btn btn-block button-yg login-button">Update</button>
                                <div class="login-register">
                                    <a href="./myprofile.php">Back to my profile</a>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
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