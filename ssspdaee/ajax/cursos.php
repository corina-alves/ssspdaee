<?php
//  $mesatual = date("m");
//  $diaatual = date("d");
$today = date('Y-m-d');

set_time_limit(20000);
include '../conection.php';
$mySQL = new MySQL;

$sql = "Select * from tb_curso where data_in >= '" . $today . "' order by data_in limit 0,3"; // $rsClientes recebe o valor do resultado da função executeQuery que criamos em nossa classe.

$rsResult = $mySQL->executeQuery($sql);
$rsResult_totalRows = mysql_num_rows($rsResult);
while ($row_rsResult = mysql_fetch_array($rsResult)) {
    $funcionarios[] = array(
        'id_curso' => utf8_encode($row_rsResult['id_curso']),
        'curso' => $row_rsResult['curso'],
        'data_in' => $row_rsResult["data_in"],
         'data_fim' => $row_rsResult["data_fim"],
        'foto' => $row_rsResult["foto"],
         'local' => $row_rsResult["local"]
       // 'local' => date("d/m/Y", strtotime($row_rsResult["data_publicacao"]))
    );
   /// echo utf8_encode($row_rsResult['curso'])."<br/>";
}
echo( json_encode($funcionarios) );


