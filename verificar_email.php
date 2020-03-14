<?php 

session_start();

require_once("src/utils/ConnectionFactory.php");

$con = ConnectionFactory::getConnection();

$email = $_REQUEST['email'];

$stmt = $con->prepare("SELECT * FROM users WHERE email = :email");

$stmt->bindParam(':email', $email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_OBJ);

if($user > 0 ){
    $_SESSION['user'] = $email;
    $_SESSION['flash']['error'] = "Email já existente!";
}
?>