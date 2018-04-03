<?php
    include('session.php');
    
    if (isset($_POST['btn-cancel'])) {
        $rid = mysqli_real_escape_string($connection, $_POST['btn-cancel']);
        
        $sql = "DELETE FROM RESERVE WHERE RID = '$rid'";
        if (mysqli_query($connection, $sql)) {
            header("location: cancelreservation.php");
        } else {
            echo "ERROR: Not able to execute $sql. " . mysqli_error($connection);
        }
    }
?>