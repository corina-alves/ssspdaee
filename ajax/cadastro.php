<?php //
                   
$pront =$_REQUEST['pront'];
//$pront='10217';
set_time_limit(20000);
include '../conection.php';
$mySQL = new MySQL;
$sql = "SELECT * FROM tb_funcionarios WHERE pront= '".$pront."'";

$id_fun=0;
$rsResult = $mySQL->executeQuery($sql);
$rsResult_totalRows = mysql_num_rows($rsResult);
while ($row_rsResult = mysql_fetch_array($rsResult)) {
    $id_fun=$row_rsResult['id_func'];
    $funcionarios[] = array(
        'id_func' => utf8_encode($row_rsResult['id_func']),
        'pront' => utf8_encode($row_rsResult['pront']),
        'nome' => trim(utf8_encode($row_rsResult['nome']))
         
    );
}

$sql = "SELECT * FROM usuarios WHERE id_func= '".$id_fun."'";

$rsResult = $mySQL->executeQuery($sql);
$rsResult_totalRows = mysql_num_rows($rsResult);
if ($row_rsResult = mysql_fetch_array($rsResult)>0) {
    echo '1'; //ja existe no bd
    return false;
}
else{
    echo( json_encode($funcionarios));
}

