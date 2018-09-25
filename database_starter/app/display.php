<?php
  //connect to the database 
  require_once('../_includes/connect.php');

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  //define table
  $tbl = "users";//change table name as required
  //write query
  $query = "SELECT $tbl.userID, $tbl.username, $tbl.name, $tbl.email, $tbl.colour FROM $tbl";
  //prepare statement, execute, store_result
  if($displayStmt = $mysqli->prepare($query)){
    $displayStmt->execute();
    $displayStmt->store_result();
    $numResults = $displayStmt->num_rows;
  }
  //bind results
  $displayStmt->bind_result($userID, $username, $name, $email, $colour);

  //create an array for the results
  $userArray = [];

  //fetch results
  while($displayStmt->fetch()){
    //create array for json
    $userArray[] = [
      "userID"=>$userID, 
      "username"=>$username, 
      "name"=>$name, 
      "email"=>$email, 
      "colour"=>$colour];

  }
  //encode the array in json format
  echo( json_encode($userArray));


?>