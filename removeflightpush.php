<?php
    include("session.php");
    
    $FID = mysqli_real_escape_string($connection, $_POST['flight-remove']);
    
    $sql = "DELETE FROM FLIGHT WHERE FID = ('$FID')";
    $query = mysqli_query($connection, $sql);
    
    if($query) {
        $resSQL = "DELETE FROM RESERVE WHERE FID = $FID";
        mysqli_query($connection, $resSQL);
        
        $airSQL = "UPDATE AIRCRAFT SET AVAILABLE = AVAILABLE + 1";
        mysqli_query($connection, $airSQL);
        
        header("location: removeflight.php");
    } else {
        echo "ERROR: Not able to execute $sql. " . mysqli_error($connection);
    }
?>
