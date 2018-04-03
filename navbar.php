<?php
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#rockin-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Regal Airways</a>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <?php if($_SESSION['cur_user_id']): ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$_SESSION['cur_fname']," ", $_SESSION['cur_lname']?></a>
                    <?php else: ?>
                    <!--<a href="login.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user">-->
                    <!--</i> Login</a>-->
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        
        <!-- Top Menu Items -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" id="rockin-navbar">
            <ul class="nav navbar-nav side-nav">
                <li><a href="index.php"><i class="fa fa-fw fa-home"></i> Dashboard</a></li>
                <?php
                    if ($_SESSION['type'] == 1){
                ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-lock"></i> Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="addaircraft.php"><i class="fa fa-fw fa-plus"></i> Add Aircraft</a></li>
                        <li><a href="removeaircraft.php"><i class="fa fa-fw fa-minus"></i> Remove Aircraft</a></li>
                        <li><a href="addflight.php"><i class="fa fa-fw fa-plus"></i> Add Flight</a></li>
                        <li><a href="removeflight.php"><i class="fa fa-fw fa-minus"></i> Remove Flight</a></li>
                        <li><a href="addairport.php"><i class="fa fa-fw fa-plus"></i> Add Airport</a></li>
                        <li><a href="removeairport.php"><i class="fa fa-fw fa-minus"></i> Remove Airport</a></li>
                        <li><a href="updateflight.php"><i class="fa fa-fw fa-arrow-up"></i> Update Flight</a></li>
                        <li><a href="reporting.php"><i class="fa fa-fw fa-line-chart"></i> Reporting</a></li>
                    </ul>
                </li>
                <?php
                    }
                ?> 
                
                <li><a href="reserveflight.php"><i class="fa fa-fw fa-check-square-o"></i> Reserve Flight</a></li>
                <li><a href="cancelreservation.php"><i class="fa fa-fw fa-ban"></i> Cancel Reservation</a></li>
                <li><a href="viewreservation.php"><i class="fa fa-fw fa-binoculars"></i> View Reservation</a></li>
                
                <?php
                    if ($_SESSION['logged'] == false){
                ?>
                <li><a href="register.php"><i class="fa fa-fw fa-user-plus"></i> Not a user? Register</a></li>
                <li><a href="login.php"><i class="fa fa-fw fa-sign-in"></i> Login</a></li>
                <?php
                    } else {
                ?> 
                <li><a href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
