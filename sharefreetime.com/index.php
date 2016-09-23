<!DOCTYPE html>
<html lang="en">
    <?php require_once './includes/head.php'; ?>
    <body>
        <header>
            <script>
                $(document).ready(function(){
                    $("#home-page").addClass("active");
                });
            </script>
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
            <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-12 page-header"><h2 class="text-center">What is all about?</h2></div>
              </div>
              <div class="row">
                  <div class="col-md-2 col-xs-1"></div>
                  <div class="col-md-8 col-xs-10 text-center"><p>If you are looking how to spend your time in a fun way you are in the right place. Here you can find people with same interests and share time with them.</p>
                  <p class="text-justified">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel lacus eros. Suspendisse at accumsan lorem, vel iaculis libero. Ut id lorem nec ante efficitur faucibus. Integer sit amet blandit ipsum, a hendrerit metus. Sed lectus mi, bibendum eget venenatis eu, congue at sapien. Sed non metus eu nulla vulputate tristique eu id purus. Phasellus vehicula mi a ante ultricies, nec porta nibh faucibus. Ut velit ex, rhoncus vitae enim sed, posuere interdum tortor. Vestibulum lobortis magna sit amet nisl accumsan, tristique interdum nibh placerat. Vestibulum bibendum ex id mauris semper interdum. Aenean sodales eros eu fermentum accumsan. Quisque non tincidunt tellus, et sagittis neque. Duis gravida auctor tincidunt. Phasellus accumsan sapien vel mollis sollicitudin.</p></div>
                  <div class="col-md-2 col-xs-1"></div>
              </div>
                <div class="row">
                  <div class="col-sm-12"><h2 class="text-center">How it works?</h2></div>
              </div>
              <div class="row">
                  <div class="col-sm-2 col-xs-1"></div>
                  <div class="col-sm-8 col-xs-10 text-center"><p>First you have to <a href="./login.php">log in</a>. Then you can search or create event.</p>
                  <p class="text-justified">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam urna libero, volutpat vel mauris ac, imperdiet facilisis lectus. Nulla facilisi. Aliquam finibus mi consectetur, iaculis lectus ut, consequat purus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris eget mauris vitae quam mollis semper. Etiam faucibus leo et laoreet eleifend. Duis maximus nisi lorem, vel viverra lectus fringilla facilisis. Pellentesque dignissim nunc at feugiat viverra.</p></div>
                  <div class="col-sm-2 col-xs-1"></div>
              </div>
              <div class="row add-some-space well">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-2 col-xs-6 text-center"><a href="./login.php"><i class="homepage-icons fa fa-sign-in"></i></a><br><span>Log in</span></div>
                  <div class="col-sm-2 col-xs-6 text-center"><a href="./create.php"><i class="homepage-icons fa fa-calendar-plus-o"></i></a><br><span>Create event</span></div>
                  <div class="col-sm-2 col-xs-6 text-center"><a href="./main.php"><i class="homepage-icons fa fa-search"></i></a><br><span>Search for event</span></div>
                  <div class="col-sm-2 col-xs-6 text-center"><i class="homepage-icons fa fa-users"></i><br><span>Meet new people</span></div>
                  <div class="col-sm-2"></div>
              </div>
              <div class="row add-some-space">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-4">
                      <div class="well well-custom text-center">
                          <h3>If you have free time</h3>
                          <p class="add-some-space">And want to do something new and different</p>
                          <button type="button" class="btn btn-block button-yg button-yg-important" onclick="window.location.href='./main.php'">Search for event</button>
                          <p class="add-some-space">We offer a choice of activities for adventurers who want to share their time and meet new people.</p>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="well well-custom text-center">
                          <h3>If you are full of ideas</h3>
                          <p class="add-some-space">But 
    looking for the right people 
    to have fun</p>
                          <button type="button" class="btn btn-block button-yg button-yg-important" onclick="window.location.href='./create.php'">Create event</button>
                          <p class="add-some-space">Here you will find the right people and will do cool things
    together. Find people with the same interests.</p>
                      </div>
                  </div>
                  <div class="col-sm-2"></div>
              </div>
            </div>
        </section>

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up fa-5x" aria-hidden="true"></i></a>

        <?php include_once "./includes/footer.php"; ?>
    </body>
    <script type="text/javascript">
        $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');
    </script>
</html>