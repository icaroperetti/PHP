<?php
session_start();

require_once("src/utils/ConnectionFactory.php");

$con = ConnectionFactory::getConnection();

$email = $_REQUEST['email'];
$senha = $_REQUEST['password'];



$stmt = $con->prepare("SELECT * FROM users WHERE email = :email ");
$stmt->bindParam(':email', $email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_OBJ);

if($user){
    if(password_verify($senha, $user->senha)){
        $_SESSION['user'] = $email;
        $_SESSION['logado'] = true;
        $_SESSION['flash']['message'] = "Logado com sucesso";
        header("location: index.php");
    } else{
        $_SESSION['flash']['error'] = "Dados Incorretos,tente novamente (senha)";
        header("location: sign_in.php");
    }
} else{
    $_SESSION['flash']['error'] = "Dados incorretos(email)";
    header("location: sign_in.php");
}

?>  