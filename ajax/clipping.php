<?php
  $mesatual = date("m");
  $diaatual = date("d");
                            
                             
set_time_limit(20000);
include '../conection.php';
$mySQL = new MySQL;
//$sql = "SELECT * FROM tb_funcionarios WHERE MONTH(dt_nasc)=" . $mesatual . 
//       " AND DAY(dt_nasc)=" . $diaatual . " ORDER BY nome ";
 $sql="SELECT * FROM clipping 
                        WHERE (data_publicacao) 
                        IN ( SELECT MAX(data_publicacao) 
                        FROM clipping
                        )
                        ORDER BY id DESC LIMIT 1";
 
$rsResult = $mySQL->executeQuery($sql);
$rsResult_totalRows = mysql_num_rows($rsResult);
while ($row_rsResult = mysql_fetch_array($rsResult)) {
    $funcionarios[] = array(
        'link' => utf8_encode($row_rsResult['link']),
        'data_publicacao1' =>$row_rsResult["data_publicacao"],
        'data_publicacao' =>date("d/m/Y", strtotime($row_rsResult["data_publicacao"]))
    );
    //echo $row_rsResult['nome']."<br/>";
}
echo( json_encode($funcionarios) );
