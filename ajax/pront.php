<?php //

$login =$_REQUEST['login'];
//$login='carodrigues';
set_time_limit(20000);
include '../conection.php';
$mySQL = new MySQL;

$sql = "SELECT * FROM usuarios WHERE login LIKE '".$login."'";

//echo $sql;

$rsResult = $mySQL->executeQuery($sql);
$rsResult_totalRows = mysql_num_rows($rsResult);
if ($row_rsResult = mysql_fetch_array($rsResult)>0) {
   // echo '1'; //ja existe no bd
  //  echo 'achou';
    $retorno[] = array(
        'status' => '1'
    );
    echo( json_encode($retorno));
    //return false;
}
//else{
    // echo '0';
//echo( json_encode($funcionarios));
//}

