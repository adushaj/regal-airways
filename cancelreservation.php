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
                                Cancel Reservation
                            </h1>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-10">
                                            <span>Please select a reservation below to cancel.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class ="row">
                        <div class="col-lg-10 col-xs-12">
                            <form action = "cancelreservationpush.php" name="cancel" id="cancel" method = "post" onsubmit="return confirm('Are you sure you want to cancel this reservation?');">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
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
                                                <th>Cancel?</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                    $sql = "SELECT RID, R.FID, B1.NAME AS B1, B2.NAME AS B2, DEPARTDATE, DEPARTTIME, ARRIVALDATE, ARRIVALTIME, PRICE FROM RESERVE R LEFT JOIN FLIGHT F ON R.FID = F.FID LEFT JOIN BRANCH B1 ON ORIGIN_BID = B1.BID LEFT JOIN BRANCH B2 ON DEST_BID = B2.BID WHERE R.USER_ID = '{$_SESSION['cur_user_id']}' ORDER BY DEPARTDATE, DEPARTTIME";
                                                    $query = mysql_query($sql);
                                                    
                                                    while($row = mysql_fetch_array($query)){
                                                        echo "<tr class = 'danger'>";
                                                        echo "<td>" . $row['FID'] . "</td>";
                                                        echo "<td>" . $row['B1'] . "</td>";
                                                        echo "<td>" . $row['B2'] . "</td>";
                                                        echo "<td>" . $row['DEPARTDATE'] . "</td>";
                                                        echo "<td>" . $row['DEPARTTIME'] . "</td>";
                                                        echo "<td>" . $row['ARRIVALDATE'] . "</td>";
                                                        echo "<td>" . $row['ARRIVALTIME'] . "</td>";
                                                        echo "<td>" . $row['PRICE'] . "</td>";
                                                        echo "<td>" . "<button type=\"submit\" name=\"btn-cancel\" class=\"btn btn-default\" value=\"{$row['RID']}\"><i class=\"fa fa-fw fa-times\"></i></button>" . "</td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div> 
        <!-- /#wrapper -->
        
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>