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
                                        <div class="huge">Airport Removal</div>
                                        <div>Remove Airport Below</div>
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
                                        <th>Branch ID</th>
                                        <th>Name</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                            $querybranch = "SELECT * FROM BRANCH ORDER BY COUNTRY, STATE, NAME";
	                                        $resultbranch = mysql_query($querybranch);
                                            while($row = mysql_fetch_array($resultbranch)){
                                                echo "<tr class = 'danger'>";
                                                echo "<td>" . $row['BID'] . "</td>";
                                                echo "<td>" . $row['NAME'] . "</td>";
                                                echo "<td>" . $row['CITY'] . "</td>";
                                                echo "<td>" . $row['STATE'] . "</td>";
                                                echo "<td>" . $row['COUNTRY'] . "</td>";
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
                            <form action="removeairportpush.php" method = "post">
    						    <div class="form-group row">
    						        <label class="col-xs-2 col-form-label">Select Branch</label>
    						        <div class="col-xs-10 selectContainer">
    									<select class="form-control"  id="airport-remove" name="airport-remove" required>
    									    <option value="" selected disabled>Please select</option>
    									    <?php
    									        $querybranch = "SELECT * FROM BRANCH ORDER BY NAME";
    	                                        $resultbranch = mysql_query($querybranch);
        									    while ($row = mysql_fetch_array($resultbranch)) {
        									   		echo "<option>" . $row{'NAME'} . "</option>";
        										}
    									    ?>
    									</select>
    						        </div>
    						    </div>
                                  <button type="submit" value="Submit" class="btn btn-default">Remove Airport</button> <br />
                            </form>
                        </div>
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