<?php
// // Create environment variables
// $hostname   = getenv('DB_HOSTNAME');
// $username   = getenv('DB_USERNAME_CLASS');
// $password   = getenv('DB_PW_CLASS');
// $dbname     = getenv('DB_NAME_CONS');

// // Establish the connection to the database
// $connection = mysqli_connect($hostname, $username, $password, $dbname);
  $host = "denal.sgedu.site";
  $user = "denal305_class";
  $pass = "cosw30";
  $db = "denal305_CONS"; 
  $port = 3306; 
  
  $connection = mysqli_connect($host, $user, $pass, $db, $port);
  
  if(mysqli_connect_errno()) {
   die("Database connection failed: " .
    mysqli_connect_error() .
    " (" .mysqli_connect_errno() . ")"
   );
  }
?>