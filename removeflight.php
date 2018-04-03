<?php
    include('session.php');
    include('employeeonly.php');
    
    $queryFlight = "SELECT * FROM FLIGHT";
	$resultFlight = mysql_query($queryFlight);
	
    
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
            
        <!-- /#wrapper -->
          <div id="page-wrapper">
          <div class="container-fluid">
                <br>
        
         <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
          
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <i class="fa fa-trash fa-5x"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="huge">Flight Removal</div>
                                        <div>Remove flight from fleet below</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class ="row">
                    <div class="col-lg-8">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Flight ID</th>
                                        <th>Origin</th>
                                        <th>Destination</th>
                                        <th>Depart Date</th>
                                        <th>Depart Time</th>
                                        <th>Arrival Date</th>
                                        <th>Arrival Time</th>
                                        <th>Price ($USD)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $FlightList = "SELECT FID, B1.NAME AS B1, B2.NAME AS B2, DEPARTDATE, DEPARTTIME, ARRIVALDATE, ARRIVALTIME, PRICE FROM FLIGHT LEFT JOIN BRANCH B1 ON ORIGIN_BID = B1.BID LEFT JOIN BRANCH B2 ON DEST_BID = B2.BID ORDER BY FID";
                                        $Flight = mysql_query($FlightList);
                                        
                                        while($row = mysql_fetch_array($Flight)){
                                            echo "<tr class = 'danger'>";
                                            echo "<td>" . $row['FID'] . "</td>";
                                            echo "<td>" . $row['B1'] . "</td>";
                                            echo "<td>" . $row['B2'] . "</td>";
                                            echo "<td>" . $row['DEPARTDATE'] . "</td>";
                                            echo "<td>" . $row['DEPARTTIME'] . "</td>";
                                            echo "<td>" . $row['ARRIVALDATE'] . "</td>";
                                            echo "<td>" . $row['ARRIVALTIME'] . "</td>";
                                            echo "<td>" . $row['PRICE'] . "</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class ="row">
                    <div class="col-lg-8">
                        <div align = "center">
                            <form action="removeflightpush.php" method = "post">
    						    <div class="form-group row">
    						        <label class="col-xs-2 col-form-label">Select Flight ID</label>
    						        <div class="col-xs-10 selectContainer">
    									<select class="form-control"  id="flight-remove" name="flight-remove" required>
    									    <option value="" selected disabled>Please select</option>
                                            <?php
                                                while ($row = mysql_fetch_array($resultFlight)) {
                                                    echo "<option>" . $row{'FID'} . "</option>";
                                                }
                                            ?>
    									</select>
    						        </div>
    						    </div>
                                <button type="submit" value="Submit" class="btn btn-default">Remove Flight</button> <br />
                            </form>
                        </div>
                    </div>
                </div>
                <br>
            </div>
          </div>
          </div>
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>