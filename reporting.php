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
                        <div class="col-lg-10 offset-lg-1">
                            <div class="row">
                                <form class="col-lg-6 col-xs-10 offset-xs-1" action="reportingpush.php" method="post">
                                    <div class="form-group row">
                                        <div class="col-xs-10 selectContainer">
                                            <select class="form-control"  id="flight-lookup" name="flight-lookup" required>
                                                <option value="" selected disabled>Flights</option>
                                                <?php
                                                    $sql = "SELECT FID, O.NAME AS ORIGIN, D.NAME AS DEST 
                                                        FROM FLIGHT LEFT JOIN BRANCH O 
                                                        ON ORIGIN_BID = O.BID 
                                                        LEFT JOIN BRANCH D 
                                                        ON DEST_BID = D.BID 
                                                        ORDER BY FID";
                                                    $result = mysqli_query($connection, $sql);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo "<option value=\"{$row['FID']}\">{$row['FID']} - {$row['ORIGIN']} to {$row['DEST']}</option>";
                                                    }
                                                ?>
                                        	</select>
                                    	</div>
                                    </div>
                                    <br>
                                	<input type="submit" name="btn-flight" class="btn btn-default" value="Lookup by Flight">
                                    <br>
                                </form>
                                <form class="col-lg-6 col-xs-10 offset-xs-1" action="reportingpush.php" method="post">
                                    <div class="form-group row">
                                        <div class="col-xs-10 selectContainer">
                                            <select class="form-control"  id="branch-lookup" name="branch-lookup" required>
                                                <option value="" selected disabled>Branches</option>
                                                <?php
                                                    $sql = "SELECT * FROM BRANCH ORDER BY NAME";
                                                    $result = mysqli_query($connection, $sql);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo "<option value=\"{$row['BID']}\">{$row['BID']} - {$row['NAME']}</option>";
                                                    }
                                                ?>
                                        	</select>
                                    	</div>
                                    </div>
                                    <br>
                                	<input type="submit" name="btn-branch" class="btn btn-default" value="Lookup by Branch">
                                    <br>
                                </form>
                            </div>
                            <br>
                            <div class="row" id="variable" <?php if(!isset($_SESSION['show-report'])){ echo "style=\"visibility: hidden;\""; } ?>>
                                <?php if(isset($_SESSION['report-flight'])) { ?>
                                <div class="col=lg-10">
                                    <?php 
                                        $sql = "SELECT * 
                                            FROM USERS U JOIN RESERVE R 
                                            ON U.USER_ID = R.USER_ID 
                                            JOIN FLIGHT F 
                                            ON F.FID = R.FID 
                                            WHERE F.FID = {$_SESSION['report-flight']}
                                            GROUP BY U.USER_ID 
                                            ORDER BY U.USER_ID";
                                        if ($result = mysqli_query($connection, $sql)) {
                                            $sql = "SELECT COUNT(*)*F.PRICE AS PRICE FROM RESERVE R LEFT JOIN FLIGHT F ON R.FID = F.FID WHERE F.FID = {$_SESSION['report-flight']}";
                                            $price = mysqli_fetch_array(mysqli_query($connection, $sql))['PRICE'];
                                            
                                            echo "<h3>Total sales: $$price.00</h3>"
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>Name</th>
                                                    <th>Reservations</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $sqlUSER = "SELECT COUNT(*) AS CNT 
                                                            FROM USERS U JOIN RESERVE R 
                                                            ON U.USER_ID = R.USER_ID 
                                                            WHERE R.FID = {$_SESSION['report-flight']} 
                                                            AND U.USER_ID = {$row['USER_ID']}";
                                                        $resultUSER = mysqli_query($connection, $sqlUSER);
                                                        
                                                        echo "<tr>";
                                                        echo "<td>" . $row['USER_ID'] . "</td>";
                                                        echo "<td>" . $row['FNAME'] . " " . $row['LNAME'] . "</td>";
                                                        echo "<td>" . mysqli_fetch_array($resultUSER)['CNT'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php } else { ?>
                                    <h3>Total sales: $0.00</h3>
                                    <h3>No reservations</h3>
                                    <?php } ?>
                                </div>
                                <?php } elseif(isset($_SESSION['report-branch'])) { ?>
                                <div class="col=lg-10">
                                    <?php 
                                        $sql = "SELECT * 
                                            FROM BRANCH B RIGHT JOIN FLIGHT F 
                                            ON B.BID = F.ORIGIN_BID 
                                            WHERE B.BID = {$_SESSION['report-branch']}";
                                        if ($result = mysqli_query($connection, $sql)) {
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Flight ID</th>
                                                    <th>Destination</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $sqlDEST = "SELECT * 
                                                            FROM BRANCH B
                                                            WHERE B.BID = {$row['DEST_BID']}";
                                                        $resultDEST = mysqli_fetch_array(mysqli_query($connection, $sqlDEST));
                                                        
                                                        echo "<tr>";
                                                        echo "<td>" . $row['FID'] . "</td>";
                                                        echo "<td>" . $resultDEST['NAME'] . "</td>";
                                                        echo "<td>" . $row['PRICE'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php } else { ?>
                                    <h3>No flights leaving from this branch</h3>
                                    <?php } ?>
                                </div>
                                <?php } ?>
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