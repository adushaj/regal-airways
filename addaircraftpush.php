<?php
    include("session.php");
       
    $model = mysqli_real_escape_string($connection, $_POST['model']);
    $capacity = mysqli_real_escape_string($connection, $_POST['capacity']);
    $mileage = mysqli_real_escape_string($connection, $_POST['mileage']);
    $range = mysqli_real_escape_string($connection, $_POST['range']);
    $class = mysqli_real_escape_string($connection, $_POST['class']);
    $services = mysqli_real_escape_string($connection, $_POST['services']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);
    $quantity = mysqli_real_escape_string($connection, $_POST['quantity']);
    
    $sql = "SELECT COUNT(*) AS CNT, QUANTITY, AVAILABLE FROM AIRCRAFT WHERE MODEL = '$model'";
    $re = mysqli_fetch_array(mysqli_query($connection, $sql));
    
    if ($re['CNT'] > 0) {
        $sql = "UPDATE AIRCRAFT SET QUANTITY = {$re['QUANTITY']}+$quantity, AVAILABLE = {$re['AVAILABLE']}+$quantity";
    } else {
        $sql ="INSERT INTO AIRCRAFT (MODEL, CAPACITY, MILEAGE, FLIGHT_RANGE, CLASS, SERVICES, PRICE, QUANTITY, AVAILABLE) 
            VALUES ('$model', '$capacity', '$mileage', '$range', '$class', '$services', '$price', '$quantity', '$quantity')";
    }
    
    if(mysqli_query($connection, $sql)){
        $_SESSION['aircraft'] = 1;
        header("location: addaircraft.php");
    } else{
        echo "ERROR: Was not able to execute $sql. " . mysqli_error($connection);
    }
?>
