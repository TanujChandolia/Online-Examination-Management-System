<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand" style="font-size:28px">
                <img src="img/navlogocrop.jpeg" width="140px" alt="Xaminer">
            </a>
        
        
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav ml-auto">
                <?php
                    if(!isset($_SESSION['id'])){
                ?>
                <li class="nav-item"><a class="nav-link" href="about.php"><i class="fas fa-info-circle"></i> About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                <?php
                    }
                    
                else{
                ?>
                <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link" href="logout_script.php"><i class="fas fa-sign-in-alt"></i> Logout</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>