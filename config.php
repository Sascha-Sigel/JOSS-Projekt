<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'i-kf.ch');
define('DB_USERNAME', 'jossAdmin');
define('DB_PASSWORD', 'zi_23Dt9!y');
define('DB_NAME', 'joss_kundenportal');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>