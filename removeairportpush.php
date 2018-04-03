<?php
    include("session.php");
    
    $NAME = mysqli_real_escape_string($connection, $_POST['airport-remove']);
    
    $sql = "DELETE FROM BRANCH WHERE NAME = ('$NAME')";
    $query = mysqli_query($connection, $sql);
    
    if($query){
        header("location: removeairport.php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }
?>