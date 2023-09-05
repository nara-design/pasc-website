<?php

   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL); 

  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'pasc_db';
 
// this is what my connection is called ($mysqli)
  $mysqli = @new mysqli(
      $db_host,
      $db_user,
      $db_password,
      $db_db
  );
	
  if ($mysqli->connect_error) {
      echo 'Errno: '.$mysqli->connect_errno;
      echo '<br>';
      echo 'Error: '.$mysqli->connect_error;
      exit();
  }

//   echo 'Success: A proper connection to MySQL was made.';
//   echo '<br>';
//   echo 'Host information: '.$mysqli->host_info;
//   echo '<br>';
//   echo 'Protocol version: '.$mysqli->protocol_version;

?>