<?php 
    session_start();

    unset($_SESSION['logado']);
    unset($_SESSION['user']);

    $_SESSION['flash']['message'] = "Desconectado com sucesso";
    header("location: sign_in.php");
?>