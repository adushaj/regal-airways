<?php
   include('config.php');
   session_start();
   
   $sql_CUST = "SELECT FNAME, LNAME, ADDRESS, CITY, ZIP, EMAIL, TYPE FROM USERS WHERE USER_ID = '".$_SESSION['cur_user_id']."'";
   $result_CUST = mysqli_query($connection,$sql_CUST);
   $cust = mysqli_fetch_array($result_CUST, MYSQLI_ASSOC);
?>