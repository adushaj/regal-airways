CSI 3450 Course Project - Regal Airways Reservation System

Team Members: Aleksander Dushaj, Nick Polhemus, Taylor Winowiecki
Date: 12/2/2017 
Location: Oakland University
Description: This airline reservation system is written in HTML with the Bootstrap framework. Data manipulation is handled with PHP. Data stored on PHPMyAdmin server hosted on Cloud9.

Database type: MySQL
Server version: 5.5.57-0ubuntu0.14.04.1 - (Ubuntu)
Protocol version: 10
Web Server: Apache/2.4.7 (Ubuntu)
Database client version: libmysql - 5.5.57
PHP extension: mysqli


A. How to run site/phpmyadmin
    1. Open index.php
    2. Click run
    3. Open Link https://csi3450ars-adushaj.c9users.io/index.php
    
    PHP: https://csi3450ars-adushaj.c9users.io/phpmyadmin
    USERNAME: root
    There is no password.
    
B. How you have tested    
    - Password hashing confirmed functioning. Plaintext passwords are hashed after next login in PHPMyAdmin.
    - To set an account with employee privileges, the TYPE column must be set from 0 to 1. 

C. System requirements
    - Source code uploaded to Cloud9 PHP workspace. URL: c9.io
    - Make sure you have MySQL installed by running the following commands in the bash terminal:
    
        mysql-ctl install
    
    Then install phpMyAdmin:
    
        phpmyadmin-ctl install
    
    After the installation is complete you'll just want to make sure mysql is running once more:
    
        mysql-ctl start
    
    After installing phpMyAdmin, you are given a link to access PHPMyAdmin which will follow the pattern of: https://[workspacename]-[username].c9users.io/phpmyadmin. From that link, you can login with your Cloud9 username and a blank password.
    
    
D. # of files in source: 152