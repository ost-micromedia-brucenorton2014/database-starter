<?php
  require_once('../_includes/connect.php');

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  //get posted form data
  $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : 'not_set';
  $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : 'not_set';
  $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : 'not_set';
  $colour = isset($_REQUEST['colour']) ? $_REQUEST['colour'] : 'not_set';

  //echo("response: $username, $name, $email, $colour")

   $tbl = "users";//change to your table i.e. John_app
  //write query
    $query = "INSERT INTO $tbl (username, name, email, colour) VALUES (?,?,?,?)";
  //prepare statement, execute, store_result
    if($insertStmt = $mysqli->prepare($query)){
      $insertStmt->bind_param("ssss", $username,  $name, $email, $colour);
      $insertStmt->execute();
      $insertRows = $insertStmt->affected_rows;
      $insertID = $mysqli->insert_id;
      
    }else{
      $jsonResponse["response"] = "error";
      $jsonResponse["messageError"] = "$insertStmt->error $mysqli->error";
    }
    //if the info got inserted
    if($insertRows > 0){
      $jsonResponse["response"] = "success";
      $jsonResponse["messageSuccess"] = "$insertRows inserted";
      $jsonResponse["insertID"] = $insertID;
      $jsonResponse["email"] = $email;
    }else{
      $jsonResponse["response"] = "error";
      $jsonResponse["messageError"] = "else error $insertStmt->error $mysqli->error";
    }
    $insertStmt->close();
    $mysqli->close();

    echo(json_encode($jsonResponse));

?>