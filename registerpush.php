<?php
    include("config.php");
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = mysqli_real_escape_string($connection, $_POST['fname']);
        $last_name = mysqli_real_escape_string($connection, $_POST['lname']);
        $address = mysqli_real_escape_string($connection, $_POST['address']);
        $city = mysqli_real_escape_string($connection, $_POST['city']);
        $state = mysqli_real_escape_string($connection, $_POST['state']);
        $zip = mysqli_real_escape_string($connection, $_POST['zip']);
        $email_address = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        
        $sql = "SELECT * FROM USERS WHERE EMAIL = '$email_address'";
        $query = mysql_query($sql);
        if (mysql_num_rows($query) > 0) {
            $_SESSION['regerror'] = 'Email already has an active account';
            header("location: register.php");
        } else {
            // Hash password
            $options = [
                'cost' => 11,
                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
            ];
            $password = password_hash($password, PASSWORD_BCRYPT, $options);
            
            // attempt insert query execution
            $sql = "INSERT INTO USERS (FNAME, LNAME, ADDRESS, CITY, STATE, ZIP, EMAIL, PASSWORD) 
                VALUES 
                ('$first_name', '$last_name','$address', '$city', '$state', '$zip', '$email_address', '$password')";
            
            if(mysqli_query($connection, $sql)){
                $sql = "SELECT USER_ID TYPE FROM USERS WHERE EMAIL = '$myusername' and PASSWORD = '$mypassword'";
                $result = mysqli_query($connection,$sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $_SESSION['logged'] = true;
                $_SESSION['login_user'] = $myusername;
                $_SESSION['cur_user_id'] = $row["USER_ID"];
                $_SESSION['cur_fname'] = $first_name;
                $_SESSION['cur_lname'] = $last_name;
                $_SESSION['type'] = 0;
                
                header("location: index.php");
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
            }
        }
    }
?>