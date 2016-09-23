<?php require './includes/connections.php'; ?>
<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once './includes/head.php'; ?>
    <body>
        <header>
            <?php 
                session_start();
                if(isset($_SESSION["user_id"])){
                    include_once "./includes/logged_in_user_tabs.php";
                } else {
                    include_once "./includes/logged_out_user_tabs.php";
                }
            ?>
            <!-- Top navigation -->
            <?php include_once "./includes/navigation.php"; ?>
            <?php include_once "./includes/title.php"; ?>
        </header>


        <section>

        </section>

        <!-- To the top link -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up fa-5x" aria-hidden="true"></i></a>

    </body>
    <script type="text/javascript">
        $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');
    </script>
</html>