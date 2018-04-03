<?php
    include('session.php');
    include('employeeonly.php');
    
    $selectFID = mysqli_real_escape_string($connection, $_POST['flight-update']);
    
    if (isset($_POST['btn-search'])) {
        $_SESSION['upd-message'] = "Flight found!";
        
        $q = "SELECT * FROM FLIGHT WHERE FID = '$selectFID'";
        $resultFlight = mysqli_query($connection, $q);
        $flightID = mysqli_fetch_array($resultFlight);
        
        $_SESSION['upd-FID'] = $flightID['FID'];
        $_SESSION['upd-ORIGIN_BID'] = $flightID['ORIGIN_BID'];
        $_SESSION['upd-DEST_BID'] = $flightID['DEST_BID'];
        $_SESSION['upd-DEPARTDATE'] = $flightID['DEPARTDATE'];
        $_SESSION['upd-DEPARTTIME'] = $flightID['DEPARTTIME'];
        $_SESSION['upd-ARRIVALDATE'] = $flightID['ARRIVALDATE'];
        $_SESSION['upd-ARRIVALTIME'] = $flightID['ARRIVALTIME'];
        $_SESSION['upd-PRICE'] = $flightID['PRICE'];
    
        header("location: updateflight.php");
    } else {
        $newFID = mysqli_real_escape_string($connection, $_POST['upd-FID']);
        $newORIGIN_BID = mysqli_real_escape_string($connection, $_POST['upd-ORIGIN_BID']);
        $newDEST_BID = mysqli_real_escape_string($connection, $_POST['upd-DEST_BID']);
        $newDEPARTDATE = mysqli_real_escape_string($connection, $_POST['upd-DEPARTDATE']);
        $newDEPARTTIME = mysqli_real_escape_string($connection, $_POST['upd-DEPARTTIME']);
        $newARRIVALDATE = mysqli_real_escape_string($connection, $_POST['upd-ARRIVALDATE']);
        $newARRIVALTIME = mysqli_real_escape_string($connection, $_POST['upd-ARRIVALTIME']);
        $newPRICE = mysqli_real_escape_string($connection, $_POST['upd-PRICE']);
        
        $updSQL = "UPDATE FLIGHT SET ORIGIN_BID = '$newORIGIN_BID', DEST_BID = '$newDEST_BID', DEPARTDATE = '$newDEPARTDATE', DEPARTTIME = '$newDEPARTTIME', 
            ARRIVALDATE = '$newARRIVALDATE', ARRIVALTIME = '$newARRIVALTIME', PRICE = '$newPRICE' WHERE FID = '$newFID'";
        if (mysqli_query($connection, $updSQL)) {
            $_SESSION['upd-message'] = 'Flight updated!';
            
            unset($_SESSION['upd-FID']);
            unset($_SESSION['upd-ORIGIN_BID']);
            unset($_SESSION['upd-DEST_BID']);
            unset($_SESSION['upd-DEPARTDATE']);
            unset($_SESSION['upd-DEPARTTIME']);
            unset($_SESSION['upd-ARRIVALDATE']);
            unset($_SESSION['upd-ARRIVALTIME']);
            unset($_SESSION['upd-PRICE']);
            
            header("location: updateflight.php");
        } else {
            echo "ERROR: Could not execute $updSQL. " . mysqli_error($connection);
        }
    }
?>