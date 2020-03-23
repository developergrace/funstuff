<!doctype html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>Connect to MySQL</title>
</head>

<body>
 <?php
 
  $host = "denal.sgedu.site";
  $user = "denal305_class";
  $pass = "cosw30";
  $db = "denal305_stud18"; 
  $port = 3306; 
  
  $connection = mysqli_connect($host, $user, $pass, $db, $port);
  
  if(mysqli_connect_errno()) {
   die("Database connection failed: " .
    mysqli_connect_error() .
    " (" .mysqli_connect_errno() . ")"
   );
  }
 
 ?>
</body>
</html>