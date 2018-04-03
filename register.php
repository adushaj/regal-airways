<?php
    include('registerpush.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Regal Airways - Registration</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        <?php
        include('navbar.php');
        ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Create New Account
                        </h1>
                    </div>
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="huge">Insert Your Information Below</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class ="row">
                    <div class="col-lg-8">
                        <div class="text-center">
                            <form action="registerpush.php" id="register" method="post">
                                <div class="form-group row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <input class="form-control" placeholder="First Name" type="text" value="" id="fname" name="fname" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <input class="form-control" placeholder="Last Name" type="text" value="" id="lname" name="lname" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <input class="form-control" placeholder="Address" type="text" value="" id="address" name="address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <input class="form-control" placeholder="City" type="text" value="" id="city" name="city" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <input class="form-control" placeholder="State" type="text" value="" id="state" name="state" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <input class="form-control" placeholder="Zip Code" type="text" pattern="[0-9]{5}" value="" id="zip" name ="zip" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <input class="form-control" placeholder="Email Address" type="email" value="" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <input class="form-control" placeholder="Password" type="password" value="" id="password" name="password" required>
                                    </div>
                                </div>
                            </form>
                            <button type="submit" form="register" value="Submit" class="btn btn-default">Submit</button> 
                            <div style = "font-size:31px; color:#cc0000; margin-top:10px">
                                <?php
                                    echo $_SESSION['regerror'];
                                    $_SESSION['regerror'] = '';
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