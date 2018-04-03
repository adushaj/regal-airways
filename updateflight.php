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
            <div id="page-wrapper">
                <div class = "container-fluid">
                    <div class = "row">
                <br>
                        <div class = "col-lg-8">
                            <div align = "center">
                                <form action="updateflightpush.php" method="post">
                                    <div class="form-group row">
                                        <br>
                                        <label class="col-xs-2 col-form-label">Select Flight ID</label>
                                        <div class="col-xs-10 selectContainer">
                                            <select class="form-control"  id="flight-update" name="flight-update" required>
                                                <option value="" selected disabled>Please select</option>
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
                                	<input type="submit" name="btn-search" class="btn btn-default" value="Search">
                                </form>
                                <form action="updateflightpush.php" method="post">
                                    <h2>Update Flight</h2>
                                    <h4><?php 
                                        echo $_SESSION['upd-message']; 
                                        $_SESSION['upd-message'] = '';
                                    ?></h4><br>
                                    Flight ID
                                    <input class="form-control" type="text" name="upd-FID"value="<?php if(isset($_SESSION['upd-FID'])){echo $_SESSION['upd-FID'];}?>"><br>
                                    Origin
                                    <br>
                                    <input type="text" class="form-control" name="upd-ORIGIN_BID" value="<?php if(isset($_SESSION['upd-ORIGIN_BID'])){echo $_SESSION['upd-ORIGIN_BID'];}?>">
                                    <br>
                                    Destination
                                    <br>
                                    <input type="text" class="form-control" name="upd-DEST_BID" value="<?php if(isset($_SESSION['upd-DEST_BID'])){echo $_SESSION['upd-DEST_BID'];}?>">
                                    <br>
                                    Departure Date
                                    <br>
                                    <input type="date" class="form-control" name="upd-DEPARTDATE" value="<?php if(isset($_SESSION['upd-DEPARTDATE'])){echo $_SESSION['upd-DEPARTDATE'];}?>">
                                    <br>
                                    Departure Time
                                    <br>
                                    <input type="time" class="form-control" name="upd-DEPARTTIME" value="<?php if(isset($_SESSION['upd-DEPARTTIME'])){echo $_SESSION['upd-DEPARTTIME'];}?>">
                                    <br>   
                                    Arrival Date
                                    <br>
                                    <input type="date" class="form-control" name="upd-ARRIVALDATE" value="<?php if(isset($_SESSION['upd-ARRIVALDATE'])){echo $_SESSION['upd-ARRIVALDATE'];}?>">
                                    <br>
                                    Arrival Time
                                    <br>
                                    <input type="time" class="form-control" name="upd-ARRIVALTIME" value="<?php if(isset($_SESSION['upd-ARRIVALTIME'])){echo $_SESSION['upd-ARRIVALTIME'];}?>">
                                    <br>
                                    Price
                                    <input type="text" class="form-control" name="upd-PRICE" value="<?php if(isset($_SESSION['upd-PRICE'])){echo $_SESSION['upd-PRICE'];}?>">
                                    <br>
                                    <input type="submit" name="btn-update" class="btn btn-default" value="Update Flight">
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