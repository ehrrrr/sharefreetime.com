<?php require './includes/connections.php'; ?>
<?php
    session_start();
    $user = $_SESSION["user_id"];

    $sql = $db->query("SELECT * FROM users WHERE user_id = '$user'");

    $result = $sql->fetch_array(MYSQLI_BOTH);

    $_SESSION["FirstName"] = $result['first_name'];
    $_SESSION["LastName"] = $result['last_name'];
    $_SESSION["BirthDate"] = $result['birth_date'];
    $_SESSION["Usergender"] = $result['gender'];

?>
<?php 
    if(isset($_POST['update_btn'])){
        
        $updateFirstName = $mysqli->real_escape_string($_POST['first_name']);
        $updateLastName = $mysqli->real_escape_string($_POST['last_name']);
        $updateBirthDate = $mysqli->real_escape_string($_POST['birth_date']);
        $updateGender = $mysqli->real_escape_string($_POST['gender']);

        $sqlUser = $db->query("UPDATE `users` SET `first_name`='{$updateFirstName}',`last_name`='{$updateLastName}',`birth_date`='{$updateBirthDate}',`gender`='{$updateGender}' WHERE  `user_id`='{$user}'");


        header('Location: edit_data.php');

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
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />'
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
                <form  class="form-horizontal" method="post" action="edit_data.php">
                        <div class="row">
                            <?php include "./includes/sidebar.php"?>
                            <div class="col-md-4 col-sm-6 main-form">
                               <div class="row">
                                   <div class="col-sm-12 text-center"><h3>Edit User Data</h3></div>
                               </div>
                                
                                <div class="form-group">
                                    <label class="sr-only" for="first_name">First name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                                        <input class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo  $_SESSION["FirstName"]?>" type="text" tabindex="1">
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="last_name">Last name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                                        <input class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo  $_SESSION["LastName"]?>" type="text" tabindex="2">
                                    </div> 
                                </div>
                              <div id="" class=""><?php include './includes/single_date_picker.php';?></div>
                              <div id="" class=""><?php include './includes/gender.php';?></div>
                              <button type="submit" name="update_btn" class="btn btn-block button-yg login-button">Update</button>
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