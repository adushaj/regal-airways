<?php
    include('session.php');
    include('employeeonly.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>Regal Airways</title>
        
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
                <br>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-2">
                                            <i class="fa fa-plane fa-5x"></i>
                                        </div>
                                        <div class="col-xs-10">
                                            <div class="huge">Add New Airport</div>
                                            <div>
                                                <?php
                                                    if ($_SESSION['airport'] == 1) {
                                                        echo 'Airport added successfully!';
                                                    } else {
                                                        echo 'Input airport information below';
                                                    }
                                                    $_SESSION['airport'] = 0;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class ="row">
                        <div class="col-lg-8">
                            <div align = "center">
                                <form action="addairportpush.php" method="post">
                                    <div class="form-group row">
                                        <label for="name" class="col-xs-2 col-form-label">Name</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="text" value="" id="name" name="name" required >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="col-xs-2 col-form-label">City</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="text" value="" id="city" name="city" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="state" class="col-xs-2 col-form-label">State</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="text" maxlength="2" value="" id="state" name="state" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="country" class="col-xs-2 col-form-label">Country</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="text" value="" id="country" name="country" required>
                                        </div>
                                    </div>
                                    <button type="submit" value="Submit" class="btn btn-default">Add Airport</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>