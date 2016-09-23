<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     <!-- Small screens -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!-- Link to homepage -->
      <a class="navbar-brand" href="./index.php"><div id="logoSM"></div></a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php echo $left_menu_items; ?>
      </ul>
      <!-- right side menu for login and drop menu -->
      <ul class="nav navbar-nav navbar-right">
        <?php echo $right_menu_items; ?>
      </ul>
    </div>
  </div>
</nav>
