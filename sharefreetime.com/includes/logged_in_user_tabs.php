<?php 
    if(isset($_SESSION["user_id"])){
        
    } else {
        header('Location: login.php');
    }
    $home_tab = '<li id="home-page"><a href="./index.php">Home</a></li>';
    $search_tab = '<li  id="search-page"><a href="./main.php">Search event</a></li>';
    $create_tab = '<li  id="create-page"><a href="./create.php">Create event</a></li>';
    $profile_tab = '<li  id="my-profile-page"><a href="./myprofile.php">Profile</a></li>';
    $left_menu_items = $home_tab . $search_tab . $create_tab . $profile_tab;

    $drop_down_username = '
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">' .$_SESSION['username'] .'
        <span class="caret"></span></a>
        <ul class="dropdown-menu">';
    $my_profile = '<li><a href="./myprofile.php"> <i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>';
    $my_events = '<li><a href="#"> <i class="fa fa-calendar" aria-hidden="true"></i> My Events</a></li>';
    $my_messages = '<li><a href="#"> <i class="fa fa-comments-o" aria-hidden="true"></i> My Messages</a></li>';
    $create_event = '<li><a href="./create.php"> <i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Create Event</a></li>';
    $logout = '<li role="separator" class="divider"></li>
          <li><a href="./logout.php"> <i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a></li> ';

    $right_menu_items = $drop_down_username . $my_profile . $my_events . $my_messages . $create_event . $logout . '</ul></li>';
?>