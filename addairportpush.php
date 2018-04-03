<?php
    include("session.php");
       
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $state = mysqli_real_escape_string($connection, $_POST['state']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    
    // insert new branch into db
    $branch = "INSERT INTO BRANCH (NAME, CITY, STATE, COUNTRY) VALUES ('$name','$city','$state', '$country')";
    
    if(mysqli_query($connection, $branch)){
        $_SESSION['airport'] = 1;
        header("location: addairport.php");
    } else{
        echo "ERROR: Was not able to execute $addairport. " . mysqli_error($connection);
    }
?>
