<?php  
    $server_connection_error = "Sirver is down, Sir!";
    $host = "127.0.0.1";
    $user = "adushaj";                          
    $pass = "";                                
    $db = "c9";                                
    $port = 3306;                               
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die($server_connection_error);
    $dbhandle = mysql_connect($host, $user, $pass) or die("Unable to connect to MySQL");
    $selected = mysql_select_db("c9", $dbhandle) or die("Could not select examples");
?>