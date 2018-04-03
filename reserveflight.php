<?php
    include('session.php');
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
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Reserve Flight
                            </h1>
                        </div>
                    </div> <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-10">
                                            <span><?php if (isset($_SESSION['res-message'])) { echo $_SESSION['res-message']; unset($_SESSION['res-message']); } else { echo "Enter your desired origin and destination."; }?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class ="row">
                        <div class="col-lg-10">
                            <div align="center">
                                <form action = "reserveflightpush.php" name="resOrigin" id="frmOrigin" method = "post">
                                    <div class="form-group row">
                                        <label class="col-xs-2 col-form-label">Origin</label>
                                        <div class = "col-xs-10 selectContainer">
                                            <select class="form-control" id="origin" name = "origin">
                                                <option value="" disabled <?php if (!isset($_SESSION['res-origin'])) { echo "selected"; } ?>>Please select</option>
                                                <?php
                                                    $query = "SELECT B.NAME, B.BID FROM BRANCH B JOIN FLIGHT F ON F.ORIGIN_BID = B.BID GROUP BY F.ORIGIN_BID";
                                                    $filter = mysqli_query($connection, $query);
                                                    
                                                    while($row = mysqli_fetch_array($filter)){
                                                        $name = $row['NAME'];
                                                        if ($_SESSION['res-origin'] == $row['BID']) {
                                                            echo "<option value = \"{$row['BID']}\" selected> $name </option>";
                                                        } else {
                                                            echo "<option value = \"{$row['BID']}\"> $name </option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="submit" name="btn-origin" class="btn btn-default" value="Set origin">
                                </form>
                                <br>
                                <form action = "reserveflightpush.php" name="resDest" id="frmDest" method = "post" <?php if (!isset($_SESSION['show_dest'])){ echo "style=\"visibility: hidden;\""; } ?>>
                                    <div class = "form-group row" id="divDEST">
                                        <label for="destination" class="col-xs-2 col-form-label">Destination</label>
                                        <div class = "col-xs-10 selectContainer">
                                            <select class="form-control" id="destination" name = "destination">
                                                <option value="" disabled <?php if (!isset($_SESSION['res-dest'])) { echo "selected"; } ?>>Please select</option>
                                                <?php
                                                    $query = "SELECT B.NAME, B.BID FROM BRANCH B JOIN FLIGHT F ON F.DEST_BID = B.BID WHERE F.ORIGIN_BID = '{$_SESSION['res-origin']}'";
                                                    $filter = mysqli_query($connection, $query);
                                                    
                                                    while($row = mysqli_fetch_array($filter)){
                                                        $name = $row['NAME'];
                                                        if ($_SESSION['res-dest'] == $row['BID']) {
                                                            echo "<option value = \"{$row['BID']}\" selected> $name </option>";
                                                        } else {
                                                            echo "<option value = \"{$row['BID']}\"> $name </option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                <input type="submit" name="btn-dest" class="btn btn-default" value="Set destination">
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" <?php if (!isset($_SESSION['show_result'])){ echo "style=\"visibility: hidden;\""; } ?>>
                        <div class="col-lg-10">
                            <form action = "reserveflightpush.php" name="resOrigin" id="frmOrigin" method = "post">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Origin</th>
                                                <th>Destination</th>
                                                <th>Depart Date</th>
                                                <th>Depart Time</th>
                                                <th>Arrival Date</th>
                                                <th>Arrival Time</th>
                                                <th>Price ($USD)</th>
                                                <th>Reserve?</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                    $FlightList = "SELECT FID, B1.NAME AS B1, B2.NAME AS B2, DEPARTDATE, DEPARTTIME, ARRIVALDATE, ARRIVALTIME, PRICE 
                                                        FROM 
                                                        FLIGHT LEFT JOIN BRANCH B1 
                                                        ON ORIGIN_BID = B1.BID 
                                                        LEFT JOIN BRANCH B2 
                                                        ON DEST_BID = B2.BID 
                                                        WHERE DEST_BID = '{$_SESSION['res-dest']}' AND ORIGIN_BID = '{$_SESSION['res-origin']}' 
                                                        ORDER BY DEPARTDATE, DEPARTTIME";
                                                    $Flight = mysql_query($FlightList);
                                                    
                                                    while($row = mysql_fetch_array($Flight)){
                                                        echo "<tr>";
                                                        echo "<td>" . $row['B1'] . "</td>";
                                                        echo "<td>" . $row['B2'] . "</td>";
                                                        echo "<td>" . $row['DEPARTDATE'] . "</td>";
                                                        echo "<td>" . $row['DEPARTTIME'] . "</td>";
                                                        echo "<td>" . $row['ARRIVALDATE'] . "</td>";
                                                        echo "<td>" . $row['ARRIVALTIME'] . "</td>";
                                                        echo "<td>" . $row['PRICE'] . "</td>";
                                                        echo "<td>" . "<button type=\"submit\" name=\"btn-res\" class=\"btn btn-default\" value=\"{$row['FID']}\"><i class=\"fa fa-fw fa-check-square-o\"></i></button>" . "</td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>