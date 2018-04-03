<?php
    include("session.php");
       
    $origin = mysqli_real_escape_string($connection, $_POST['origin']);
    $destination = mysqli_real_escape_string($connection, $_POST['destination']);
    $departdate = mysqli_real_escape_string($connection, $_POST['departdate']);
    $departtime = mysqli_real_escape_string($connection, $_POST['departtime']);
    $arrivaldate = mysqli_real_escape_string($connection, $_POST['arrivaldate']);
    $arrivaltime = mysqli_real_escape_string($connection, $_POST['arrivaltime']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);
    $aircraft = mysqli_real_escape_string($connection, $_POST['aircraft']);
    
    // insert new flight into db
    $flight = "INSERT INTO FLIGHT (ORIGIN_BID, DEST_BID, DEPARTDATE, DEPARTTIME, ARRIVALDATE, ARRIVALTIME, PRICE, AID) VALUES ('$origin','$destination','$departdate', '$departtime', '$arrivaldate', '$arrivaltime', $price, $aircraft)";
    
    if(mysqli_query($connection, $flight)){
        $sql = "UPDATE AIRCRAFT SET AVAILABLE = AVAILABLE - 1";
        mysqli_query($connection, $sql);
        
        $_SESSION['flight'] = 1;
        header("location: addflight.php");
    } else{
        echo "ERROR: Not able to execute $addflight. " . mysqli_error($connection);
    }
?>
