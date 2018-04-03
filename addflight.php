<?php
    include('session.php');
    include('employeeonly.php');
    
    $queryBranch = "SELECT * FROM BRANCH ORDER BY NAME";
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
                                            <div class="huge">Add New Flight</div>
                                            <div>
                                                <?php
                                                    if ($_SESSION['flight'] == 1) {
                                                        echo 'Flight added successfully!';
                                                    } else {
                                                        echo 'Input flight information below';
                                                    }
                                                    $_SESSION['flight'] = 0;
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
                                <form action="addflightpush.php" method="post">
                                    <div class="form-group row">
                                        <label class="col-xs-2 col-form-label">Origin</label>
                                        <div class="col-xs-10 selectContainer">
                                            <select class="form-control"  id="origin" name="origin" required>
                                                <option value="" selected disabled>Please select</option>
                                                <?php
                                                    $resultBranch = mysql_query($queryBranch);
                                                    while ($row = mysql_fetch_array($resultBranch)) {
                                                        if ($row['STATE'] == null) {
                                                            echo "<option value=\"{$row['BID']}\">" . $row['NAME'] . " - " . $row['CITY'] . ", " . $row['COUNTRY'] . "</option>";
                                                        } else {
                                                            echo "<option value=\"{$row['BID']}\">" . $row['NAME'] . " - " . $row['CITY'] . ", " . $row['STATE'] . ", " . $row['COUNTRY'] . "</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="destination" class="col-xs-2 col-form-label">Destination</label>
                                        <div class="col-xs-10 selectContainer">
                                            <select class="form-control"  id="destination" name="destination" required>
                                                <option value="" selected disabled>Please select</option>
                                                <?php
                                                    $resultBranch = mysql_query($queryBranch);
                                                    while ($row = mysql_fetch_array($resultBranch)) {
                                                        if ($row['STATE'] == null) {
                                                            echo "<option value=\"{$row['BID']}\">" . $row['NAME'] . " - " . $row['CITY'] . ", " . $row['COUNTRY'] . "</option>";
                                                        } else {
                                                            echo "<option value=\"{$row['BID']}\">" . $row['NAME'] . " - " . $row['CITY'] . ", " . $row['STATE'] . ", " . $row['COUNTRY'] . "</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="departdate" class="col-xs-2 col-form-label">Departure Date</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="date" value="" id="departdate" name="departdate" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="departtime" class="col-xs-2 col-form-label">Departure Time</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="time" value="" id="departtime" name="departtime" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="arrivaldate" class="col-xs-2 col-form-label">Arrival Date</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="date" value="" id="arrivaldate" name="arrivaldate" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="arrivaltime" class="col-xs-2 col-form-label">Arrival Time</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="time" value="" id="arrivaltime" name="arrivaltime" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="price" class="col-xs-2 col-form-label">Cost ($USD)</label>
                                        <div class="col-xs-10">
                                            <input class="form-control" type="text" value="" id="price" name="price" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="destination" class="col-xs-2 col-form-label">Aircraft</label>
                                        <div class="col-xs-10 selectContainer">
                                            <select class="form-control"  id="aircraft" name="aircraft" required>
                                                <option value="" selected disabled>Please select</option>
                                                <?php
                                                    $sql = "SELECT * FROM AIRCRAFT WHERE AVAILABLE > 0";
                                                    $result = mysql_query($sql);
                                                    while ($row = mysql_fetch_array($result)) {
                                                        echo "<option value=\"{$row['AID']}\">" . $row['MODEL'] . " - Capacity: " . $row['CAPACITY'] . "</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" value="Submit" class="btn btn-default">Add Flight</button> 
                                </form>
                            </div>
                        </div>
                    </div>
                <br>
                </div> <!-- /.container-fluid -->
            </div>
        </div> <!-- /#wrapper -->
        
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>