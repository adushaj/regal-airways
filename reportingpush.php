<?php
    include('session.php');
    
    if (isset($_POST['btn-flight'])) {
        unset($_SESSION['report-branch']);
        $_SESSION['show-report'] = 1;
        $_SESSION['report-flight'] = $_POST['flight-lookup'];
    } elseif (isset($_POST['btn-branch'])) {
        unset($_SESSION['report-flight']);
        $_SESSION['show-report'] = 1;
        $_SESSION['report-branch'] = $_POST['branch-lookup'];
        $sql = "SELECT * FROM BRANCH B LEFT JOIN FLIGHT F ON B.BID = F.ORIGIN_BID WHERE B.BID = {$_POST['branch-lookup']}";
        $_SESSION['report-sql'] = $sql;
    }
    
    header("location: reporting.php");
?>