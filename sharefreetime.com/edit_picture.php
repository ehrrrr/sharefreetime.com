<?php require './includes/connections.php'; ?>
<?php 
        session_start();
        $user = $_SESSION["user_id"];
?>
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
<?php 

    if(isset($_POST['UploadButton'])){
        
        $updateImage = $mysqli->real_escape_string($UploadName);
        
        if($updateImage) {
            $sqlUser = $db->query("UPDATE `users` SET `image`='{$updateImage}' WHERE  `user_id`='{$user}'");    
        }
        
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
                <div class="row">
                    <?php include "./includes/sidebar.php"?>
                    <div class="col-md-5 col-sm-8 main-form">
                       <div class="row">
                           <div class="col-sm-12 text-center"><h3>Upload Photo</h3></div>
                       </div>

                        <div class="row fileuploadholder">
                          <form action="edit_picture.php" method="post" enctype="multipart/form-data" name="FileUploadForm" id="FileUploadForm">
                            <div class="row">
                                <div class="form-group">
                                    <label for="UploadFileField"></label>
                                    <input type="file" name="UploadFileField" id="UploadFileField" />
                                </div>
                            </div>
                            <div id="image-holder"></div>
                            <div class="row"></div>
                            <div class="row">
                                <input type="submit" name="UploadButton" id="UploadButton" value="Upload" />
                            </div>
                          </form>
                        </div>

                      </div>
                    <div class="col-md-3 col-sm-1"></div>
                </div>
            </div>    
        </section>

        <!-- To the top link -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up fa-5x" aria-hidden="true"></i></a>
        <?php include_once "./includes/footer.php"; ?>

    </body>
    <script>
        $(document).ready(function() {
            $("#UploadFileField").on('change', function() {
              //Get count of selected files
              var countFiles = $(this)[0].files.length;
              var imgPath = $(this)[0].value;
              var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
              var image_holder = $("#image-holder");
              image_holder.empty();
              if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                if (typeof(FileReader) != "undefined") {
                  //loop for each file selected for uploaded.
                  for (var i = 0; i < countFiles; i++) 
                  {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                      $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image"
                      }).appendTo(image_holder);
                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[i]);
                  }
                } else {
                  alert("This browser does not support FileReader.");
                }
              } else {
                alert("Pls select only images");
              }
            });
        });
    </script>
    <script type="text/javascript">
        $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');
    </script>
</html>