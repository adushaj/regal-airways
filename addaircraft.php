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
                                            <div class="huge">Add New Aircraft</div>
                                            <div>
                                                <?php
                                                    if (isset($_SESSION['aircraft'])) {
                                                        echo 'Aircraft added successfully!';
                                                    } else {
                                                        echo 'Input aircraft information below';
                                                    }
                                                    unset($_SESSION['aircraft']);
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
                                <form action="addaircraftpush.php" method="post">
                                    <div class="form-group row">
                                        <label for="name" class="col-xs-2 col-form-label">Model</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="text" value="" id="model" name="model" required >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-xs-2 col-form-label">Capacity</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="number" value="" id="capacity" name="capacity" required >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-xs-2 col-form-label">Mileage</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="number" value="" id="mileage" name="mileage" required >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-xs-2 col-form-label">Range</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="number" value="" id="range" name="range" required >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-xs-2 col-form-label">Class</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="number" value="" id="class" name="class" required >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-xs-2 col-form-label">Services</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="number" value="" id="services" name="services" required >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-xs-2 col-form-label">Price</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="number" value="" id="price" name="price" required >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-xs-2 col-form-label">Quantity</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="number" value="" id="quantity" name="quantity" required >
                                        </div>
                                    </div>
                                    <button type="submit" value="Submit" class="btn btn-default">Add Aircraft</button>
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