<?php

session_start(); // session_start inicia a sessão 
$login = $_POST['login']; //as variáveis login e senha recebem os dados digitados na página anterior 
$senha = $_POST['senha'];
$acao="";
$acao = isset($_POST['acao']);

include("../conection.php");
$mySQL = new MySQL; //instancia o objeto
$rsResult = $mySQL->executeQuery("SELECT * FROM usuarios "
        . " INNER JOIN tb_funcionarios ON usuarios.id_func=tb_funcionarios.id_func"
        . " WHERE `login` = '$login' AND `senha`= '$senha'"); // $rsClientes recebe o valor do resultado da função executeQuery que criamos em nossa classe.
$rsResult_totalRows = mysql_num_rows($rsResult); //recebo o valor de todas as linhas retornadas, com a sintaxe mysql_num_rows.

$row_rsResult = mysql_fetch_assoc($rsResult);
if ($row_rsResult >0){
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['id'] = $row_rsResult["id_func"];
    $_SESSION['tipo'] = $row_rsResult["tipo"];
    
    $nome  = $row_rsResult["nome"];
$pieces = explode(" ", $nome);
//echo $pieces[0]; 
$_SESSION['nome'] =$pieces[0];

    
    
  //  $_SESSION['nome'] = $row_rsResult["nome"];
    
    echo "login" .$_SESSION['login'];
    echo ", senha".$_SESSION['senha'];
    echo ", Session -->".$_SESSION['id'];
    if($acao=="criar"){
         header('location:../perfil.php');
    }else{
        header('location:../index.php');
    }
} else {
    //echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='loginForm.php';</script>";
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    //$autentica="usuario e senha incorretos";
   // $autentica="Usuario e/ou Senha incorretos";
    $autentica='1';
   // header('location:../loginForm.php?login_attempt='.$autentica);
    echo "nao achou";
    echo $login;
    echo $senha;
}

?>
