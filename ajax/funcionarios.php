<?php

set_time_limit(20000);
include '../conection.php';
$mySQL = new MySQL;
$sql = "SELECT * from tb_funcionarios";

$rsResult = $mySQL->executeQuery($sql);
$rsResult_totalRows = mysql_num_rows($rsResult);
while ($row_rsResult = mysql_fetch_array($rsResult)) {
    $funcionarios[] = array(
        'id_func' => utf8_encode($row_rsResult['id_func']),
        'pront' => utf8_encode($row_rsResult['pront']),
        'nome' => utf8_encode($row_rsResult['nome']),
        'dt_nasci' => utf8_encode($row_rsResult['dt_nasc']),
        'ramal' => utf8_encode($row_rsResult['ramal']),
        'dir' => utf8_encode($row_rsResult['dir'])
    );
}
echo( json_encode($funcionarios) );




