<?php 

define("DB_HOST", "107.170.117.168");
define("DB_USER", "cloudnews");
define("DB_PASS", "6uze8uqab");
define("DB_NAME", "zadmin_newspanikaju");

//Create the database connection using mysqli_connect
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//Test the mysqli_connection
if (mysqli_connect_errno()) {
  die("Database Connection Failed " . mysqli_connect_error() . 
    "(" . mysqli_connect_errno() . ")");
}

?>
