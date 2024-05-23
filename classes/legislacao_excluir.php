<?php

session_start();
if ((isset($_SESSION['login']) == true) and ( isset($_SESSION['senha']) == true)) {
    if ($tipo = $_SESSION['tipo'] == 3 or $tipo = $_SESSION['tipo'] == 1) {
         $id_legis = $_POST['id'];
        // echo $id_legis.'<br/>';
          include("../conection.php");
                        $mySQL = new MySQL; //instancia o objeto
                        $rsResult = $mySQL->executeQuery("SELECT * FROM tb_legislacao WHERE id_legislacao=" . $id_legis); // $rsClientes recebe o valor do resultado da função executeQuery que criamos em nossa classe.
                        $rsResult_totalRows = mysql_num_rows($rsResult); //recebo o valor de todas as linhas retornadas, com a sintaxe mysql_num_rows.

                        $row_rsResult = mysql_fetch_assoc($rsResult);
                        if ($row_rsResult > 0) {
                       //     echo "achou ";
                       //     echo utf8_encode($row_rsResult["ementa"]);
                            //DELETE FROM tb_curso` WHERE `tb_curso`.`id_curso` = 27
                             $sql="DELETE FROM tb_legislacao WHERE id_legislacao =".$id_legis;
                      // echo "<br/>".$sql;
                   $rsResult = $mySQL->executeQuery($sql); 
                    if ($rsResult) {
                        header('location:../legislacao_listagem.php?curso_attempt=3');
                    //     echo "OK";
                     }  
                     
                    }
    } else {
        echo "<div class='alert alert-error' >Você não tem permissão para essa operação</div>";
    }
} else {
     echo "<div class='alert' id='alert'>Página Restrita, Efetue Login</div>";
}
?>
