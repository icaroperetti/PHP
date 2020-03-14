<?php
    session_start();

    require_once("src/utils/ConnectionFactory.php");

    $con = ConnectionFactory::getConnection();

    $user = $_REQUEST['user'];

    $stmtEmail = $con->prepare("SELECT * FROM users WHERE email = :email");
    $stmtEmail->bindParam('email', $user['email']);
    $stmtEmail->execute();

    $stmtRg = $con->prepare("SELECT * FROM users WHERE rg = :rg");
    $stmtRg->bindParam('rg', $user['rg']);
    $stmtRg->execute();

    $stmtCpf = $con->prepare("SELECT * FROM users WHERE cpf = :cpf");
    $stmtCpf->bindParam('cpf', $user['cpf']);
    $stmtCpf->execute();

    if($stmtEmail->rowCount() > 0) {
        $_SESSION['flash']['error'] = 'Este email já esta sendo utilizado';
        header("location: registro_front.php");

    } else if($stmtCpf->rowCount() > 0) {
        $_SESSION['flash']['error'] = 'Este CPF já esta sendo utilizado';
        header("location: registro_front.php");

    } else if($stmtRg->rowCount() > 0) {
        $_SESSION['flash']['error'] = 'Este RG já esta sendo utilizado';
        header("location: registro_front.php");
        
    } else {
        $_SESSION['flash']['message'] = 'Cadastrado com sucesso';
        $hashed_password = password_hash($user['password'], PASSWORD_DEFAULT);

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
        header("location: sign_in.php");
    }


?>