<script src="js/jquery-1.11.1.min.js"></script>


<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$pront = $_REQUEST["pront"];
$cpf = $_POST["cpf"];
$login = $_POST["login"];
$senha = $_POST["senha"];
//echo "**********************************************";
include("../conection.php");
$mySQL = new MySQL;
$sql = "SELECT * FROM tb_funcionarios WHERE pront= '" . $pront . "'";
//echo $sql."<br/>";
?>


<?php
$rsResult = $mySQL->executeQuery($sql);
$rsResult_totalRows = mysql_num_rows($rsResult);
while ($row_rsResult = mysql_fetch_array($rsResult)) {
    $id_Func = $row_rsResult['id_func'];
}

//echo $id_Func;
//$sql="INSERT INTO `tb_curso`(curso,horario, vagas,responsavel, local, endereco, publico_alvo,objtivo,conteudo,inscricoes,data_in,data_fim,foto ) "
//$mySQL = new MySQL; //instancia o objto
//$sql = "INSERT INTO usuarios (login, senha, id_func,tipo)"
//        . "VALUES('$login',"
//        . "'$senha',"
//        . "'$id_Func',"
//        . "0"
//        . ")";
//echo "<br/>";
$sql="INSERT INTO usuarios (login, senha, id_func,tipo)"
        . "VALUES('$login',"
        . "'$senha',"
        . "'$id_Func',"
        . "0"
        . ") ";
$sql2= "UPDATE tb_funcionarios SET cpf='$cpf' WHERE id_func=$id_Func ";



//echo $sql;
//echo "<br/>";
//echo "<br/>";echo "<br/>";echo "<br/>";

$rsResult = $mySQL->executeQuery($sql);
$rsResult2 = $mySQL->executeQuery($sql2);
if ($rsResult && $rsResult2) {
    ?>

    <form action="login.php" method="post" class="form-horizontal" name="formlogin">
        <input type="hidden"name="login" value="<?php echo $login ?>" >
        <input type="hidden"name="senha" value="<?php echo $senha ?>">
        <input type="hidden"name="acao" value="criar">
    </form>
    <script type = "text/javascript">
       document.formlogin.submit();
    </script>
    <?php
//    echo "OK";
}