<?php require './includes/connections.php'; ?>

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
                session_start();
                include_once "./includes/logged_in_user_tabs.php";
            ?>
            <!-- Top navigation -->
            <?php include_once "./includes/navigation.php"; ?>
            <?php include_once "./includes/title.php"; ?>
        </header>

        <section>
            <div class="container-fluid">
                <div class="row">
                   <?php include "./includes/sidebar.php"?>
                    <div class="col-sm-8">
                        <h1>Wellcome, <?php echo $_SESSION['username']?></h1>
                        <a href="./account_management.php">Account Management</a><br>
                        <a href="./edit_profile.php">Edit Primary User Data</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- To the top link -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up fa-5x" aria-hidden="true"></i></a>

    </body>
    <script type="text/javascript">
        $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');
    </script>
</html>