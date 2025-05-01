<?php
define ('db_server', 'localhost');
define('db_username', 'root');
define('our_pswd', '');
define('db_name', 'practice_db');


$conn_db = new mysqli(db_server, db_username, our_pswd, db_name);

if($conn_db->connect_error){
    die("Database connection failed:" . $conn_db->connect_error);
}else{
  echo"Database connected successfully!";
}


$put_data = "INSERT INTO users(id, user_name, gender,email)
VALUES(1 , 'RACH', 'FEMALE', 'RA@GMAIL.COM')";

if (mysqli_query($conn_db, $put_data)){
    echo"data inserted successfully";

};
$retrieve = "SELECT COUNT(*) AS genders FROM users WHERE gender = 'female' ";
$retrieve_results = $conn_db -> query($retrieve);
$re = $retrieve_results->fetch_assoc();
$red = $re['genders']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <li>
        <?php if($red > 0): 
        
        ?>
          <?php echo $red; ?>
        <?php endif ?>
        
    </li>
</body>
</html>