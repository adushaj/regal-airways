<?php
    include('session.php');
    
    if ($_SESSION['logged'] == false or $_SESSION['type'] == 0) {
        $_SESSION['error'] = "You're not supposed to be in there!";
        header('location: index.php');
    }
?>