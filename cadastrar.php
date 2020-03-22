<?php

    require_once("src/utils/ConnectionFactory.php");

    $user = $_REQUEST['user'];

    $hashed_password = password_hash($user['password'], PASSWORD_DEFAULT);

    $con = ConnectionFactory::getConnection();

    $stmt = $con->prepare("INSERT INTO users(nome, cpf, rg, endereco, email, senha, data_nascimento) 
                           VALUES (:nome, :cpf, :rg, :endereco, :email, :senha, :data_nascimento)");
    
    $stmt->bindParam(':nome', $user['nome_completo']);
    $stmt->bindParam(':cpf', $user['cpf']);
    $stmt->bindParam(':rg', $user['rg']);
    $stmt->bindParam(':endereco', $user['endereco']);
    $stmt->bindParam(':email', $user['email']);
    $stmt->bindParam(':senha', $hashed_password);
    $stmt->bindParam(':data_nascimento', $user['data_nascimento']);

    $stmt->execute();
    header("location: index.php");

?>