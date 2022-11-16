<?php

  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $db = 'iteh_domaci';

  $conn = new mysqli($dbhost,$dbuser,$dbpass,$db);
  $conn->set_charset("utf8");

  if($conn->connect_errno){
    exit("Unsuccessful connection: ".$conn->connect_error);
  }
  



// function OpenCon(){
//   $dbhost = 'localhost';
//     $dbuser = 'root';
//     $dbpass = '';
//     $db = 'iteh_domaci';

//     $conn = new mysqli($dbhost,$dbuser,$dbpass,$db) or die ('<p>Connection to database failed!</p>');
//     $conn->set_charset("utf8");
//     return $conn;
// }

// function CloseCon($conn){
//     $conn -> close();
// }


?>