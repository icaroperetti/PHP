<?php
require_once("src/utils/ConnectionFactory.php");

$user = $_GET['id'];

$con = ConnectionFactory::getConnection();

 $stmt = $con->prepare("DELETE FROM users WHERE id = :id");
 $stmt->bindParam(':id', $user);
 $stmt->execute();

 header("location: index.php");
?>