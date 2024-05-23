<?php
  $mesatual = date("m");
  $diaatual = date("d");
                            
                             
set_time_limit(20000);
include '../conection.php';
$mySQL = new MySQL;
$sql = "SELECT * FROM tb_funcionarios WHERE MONTH(dt_nasc)=" . $mesatual . 
        " AND DAY(dt_nasc)=" . $diaatual . " ORDER BY nome ";

$rsResult = $mySQL->executeQuery($sql);
$rsResult_totalRows = mysql_num_rows($rsResult);
while ($row_rsResult = mysql_fetch_array($rsResult)) {
    $funcionarios[] = array(
        'id_func' => utf8_encode($row_rsResult['id_func']),
        'pront' => utf8_encode($row_rsResult['pront']),
        'nome' => trim(utf8_encode($row_rsResult['nome'])),
         'foto' => utf8_encode($row_rsResult['foto']),
        'dt_nasci' => utf8_encode($row_rsResult['dt_nasc']),
        'ramal' => utf8_encode($row_rsResult['ramal']),
        'dir' => utf8_encode($row_rsResult['dir']),
         'divi' => utf8_encode($row_rsResult['divi'])
    );
    //echo $row_rsResult['nome']."<br/>";
}
echo( json_encode($funcionarios) );




