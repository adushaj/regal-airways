<?php
    include('session.php');
    
    if (isset($_POST['btn-origin'])) {
        $origin = mysqli_real_escape_string($connection, $_POST['origin']);
        
        $_SESSION['res-origin'] = $origin;
        $_SESSION['show_dest'] = "";
        
        unset($_SESSION['res-dest']);
        unset($_SESSION['show_result']);
    } elseif (isset($_POST['btn-dest'])) {
        $destination = mysqli_real_escape_string($connection, $_POST['destination']);
        
        $_SESSION['res-dest'] = $destination;
        $_SESSION['show_result'] = "";
    } elseif (isset($_POST['btn-res'])) {
        $reserveID = mysqli_real_escape_string($connection, $_POST['btn-res']);
        
        if (isset($_SESSION['cur_user_id'])) {
            $sql = "INSERT INTO RESERVE (USER_ID, FID) VALUES ('{$_SESSION['cur_user_id']}', '$reserveID')";
            if(mysqli_query($connection, $sql)){
                $_SESSION['res-message'] = 'Flight Reserved!';
                unset($_SESSION['res-origin']);
                unset($_SESSION['res-dest']);
                unset($_SESSION['show_dest']);
                unset($_SESSION['show_result']);
                
                header("location: reserveflight.php");
            } else{
                echo "ERROR: Not able to execute $sql. " . mysqli_error($connection);
            }
        } else {
            $_SESSION['loginerror'] = "Please login to reserve a flight";
            
            header("location: login.php");
            exit;
        }
    }
    
    header("location: reserveflight.php");
?>