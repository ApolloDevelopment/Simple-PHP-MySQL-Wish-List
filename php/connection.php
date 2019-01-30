<?php

//set these values as needed
  $host = "localhost";
  $username = "root";
  $password = "";
  $db = "wishlist_items";
  $table = "items";

  //create connection
  $connect = mysqli_connect($host, $username, $password, $db);

  //check connection
  if(!$connect) {
    die("Error connecting: " . mysqli_connect_error());
  }
?>
