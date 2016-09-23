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
        <!-- Top navigation -->
        <header>
           <script>
                $(document).ready(function(){
                    $("#search-page").addClass("active");
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
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <aside class="sidebar">
                       <h1>Filters</h1>
                        <div id="" class=""><?php include "./includes/countries.php"; ?></div>
                        <div id="" class=""><?php include "./includes/dateRangePicker.php"; ?></div>
                        <div id="" class=""><?php include "./includes/categories.php"; ?></div>
                    </aside>
                </div>
                <div class="col-sm-9">
                    <section>
                        <div class="container-fluid">
                            
                         </div>
                    </section>
                </div>
            </div>
        </div>

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up fa-5x" aria-hidden="true"></i></a>

        <?php include_once "./includes/footer.php"; ?>
    </body>
    <script type="text/javascript">
        $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');
    </script>
</html>