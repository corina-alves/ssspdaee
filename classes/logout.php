<?php

session_start(); // desselecciona a variável
unset($_SESSION['login']);
unset($_SESSION['senha']);
session_destroy(); // detroy it
header("location: ../index.php"); // vai para a pagina login.html
?>