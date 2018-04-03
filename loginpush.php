<?php
    include("config.php");
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // email and password sent from form 
        $myusername = mysqli_real_escape_string($connection,$_POST['username']);
        $mypassword = mysqli_real_escape_string($connection,$_POST['password']); 
        
        $found = false;
        $sql = "SELECT * FROM USERS WHERE EMAIL = '$myusername'";
        $result = mysqli_query($connection,$sql);
        
        while ($row = mysqli_fetch_array($result)) {
            if (password_verify($mypassword, $row['PASSWORD'])) {
                $found = $row;
            } elseif ($mypassword == $row['PASSWORD']) { // Checks plain text password as well
                $options = [
                    'cost' => 11,
                    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
                ];
                $password = password_hash($mypassword, PASSWORD_BCRYPT, $options);
                
                // Convert to hashed password in database
                $sql = "UPDATE USERS SET PASSWORD = '$password' WHERE USER_ID = ".$row['USER_ID'];
                if(mysqli_query($connection, $sql)) {
                    $found = $row;
                }
            }
        }
        
        if($found != false) {
            $_SESSION['logged'] = true;
            $_SESSION['login_user'] = $myusername;
            $_SESSION['cur_user_id'] = $found["USER_ID"];
            $_SESSION['cur_fname'] = $found["FNAME"];
            $_SESSION['cur_lname'] = $found["LNAME"];
            $_SESSION['type'] = $found["TYPE"];
            
            header("location: index.php");
        } else {
            $_SESSION['logged'] = false;
            $_SESSION['loginerror'] = "Your Email Address or Password is Invalid. Please try again.";
            
            header("location: login.php");
        }
    }
?>