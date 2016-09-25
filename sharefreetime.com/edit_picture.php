<?php
	if(isset($_FILES['UploadFileField'])){
		// Creates the Variables needed to upload the file
		$UploadName = $_FILES['UploadFileField']['name'];
		$UploadName = mt_rand(100000, 999999).$UploadName;
		$UploadTmp = $_FILES['UploadFileField']['tmp_name'];
		$UploadType = $_FILES['UploadFileField']['type'];
		$FileSize = $_FILES['UploadFileField']['size'];
		
		// Removes Unwanted Spaces and characters from the files names of the files being uploaded
		$UploadName = preg_replace("#[^a-z0-9.]#i", "", $UploadName);
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

    $_SESSION["UserImage"] = $result['image'];
?>
<?php 
    if(isset($_POST['update_btn'])){
        
        $updateImage = $mysqli->real_escape_string($UploadName);
        
        if($updateImage) {
            $sqlUser = $db->query("UPDATE `users` SET `image`='{$updateImage}' WHERE  `user_id`='{$user}'");    
        }
        
        header('Location: edit_picture.php');

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
                <form  class="form-horizontal" method="post" action="edit_picture.php">
                        <div class="row">
                            <?php include "./includes/sidebar.php"?>
                            <div class="col-md-5 col-sm-8 main-form">
                               <div class="row">
                                   <div class="col-sm-12 text-center"><h3>Edit About Me</h3></div>
                               </div>
                            <div id="upload_image"></div>
                            <form action="FileUpload.php" method="post" enctype="multipart/form-data" name="FileUploadForm" id="FileUploadForm">
                                <label for="UploadFileField"></label>
                                <input type="file" name="UploadFileField" id="UploadFileField" />
                                <input type="submit" name="UploadButton" id="UploadButton" value="Upload" />
                              </form>                                
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