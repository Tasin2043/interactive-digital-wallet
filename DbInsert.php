<?php 

require 'DbConnect.php';

function transfer($category, $amountto, $amount) {
$conn = connect();
$sql = $conn->prepare("INSERT INTO USERS (category, amountto, amount) VALUES(?, ?, ?)");
$sql->bind_param("sss",$category,$amountto,$amount);
return $sql->execute();
  }

  function getAllUsers(){
    $conn = connect();
    $sql = $conn->prepare("SELECT * FROM USERS");
    $sql->execute();
    $res = $sql->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
  }

function getUser($category){
    $conn = connect();
    $sql = $conn->prepare("SELECT * FROM USERS WHERE category = ?");
    $sql->bind_param("s", $category);
    $sql->execute();
    $res = $sql->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
  }

?>