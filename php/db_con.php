<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'uncci_lr_db');

// connect the db
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//  check if the database is connected
if($conn->connect_error){
    die("Database connection failed: " . $conn->connect_error);
}

?>