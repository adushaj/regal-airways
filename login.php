<?php
    include('loginpush.php')
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>Regal Airways - Login</title>
        
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        <div id="wrapper">
            
            <!-- Navbar -->
            <?php
            include('navbar.php');
            ?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Existing User Login
                            </h1>
                        </div>
                    </div> <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-10">
                                            <span>Enter your email and password below.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class ="row">
                        <div class="col-lg-8">
                            <div align = "center">
                                <form action = "loginpush.php" id="login" method = "post">
                                    <div class="form-group row">
                                        <label for="username" class="col-xs-2 col-form-label">Email</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="email" value="" id="username" name="username" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-xs-2 col-form-label">Password</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="password" value="" id="password" name="password" required>
                                        </div>
                                    </div>
                                </form>
                                <button type="submit" form="login" value="Submit" class="btn btn-default">Submit</button> 
                                <div style = "font-size:31px; color:#cc0000; margin-top:10px">
                                    <?php
                                        echo $_SESSION['loginerror'];
                                        $_SESSION['loginerror'] = '';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.container-fluid -->
            </div> <!-- /#page-wrapper -->
        </div> <!-- /#wrapper -->
        
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>