<?php

session_start();
$_SESSION["nome"] = 'Icaro';

echo "Seu nome é " . $_SESSION['nome'];
?>
