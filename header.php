<nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="image/favicon.jpg" width="30" height="30" class="rounded-circle">Blood Bank Management System</a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><i class="fas fa-align-left"></i></span>
          </button>

          <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <?php if (isset($_SESSION['hid'])) { ?>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link bg bg-light" href="hospitalpage.html"><b>Home</b></a>
            </li>
        </ul>

        <?php } elseif (isset($_SESSION['rid'])) { ?> 
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link bg bg-light" href="Userpage.html"><b>Home</b></a>
            </li>
        </ul>
            
        <?php }  else { ?>
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                <a class="nav-link bg bg-light" href="main.php"><b> Home</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg bg-light" href="login.php"><b> Login</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-light" href="register.php"><b> Register</b></a>
            </li>

        </ul>

        <?php } ?>
       </div>
    </div>
</nav>