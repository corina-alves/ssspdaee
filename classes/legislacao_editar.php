<?php
    //  session_start();
    //  if ((isset($_SESSION['login']) == true) and ( isset($_SESSION['senha']) == true)) {
        // echo "logado";
        $id_legislacao= $_POST["id"];
        $ato = $_POST["ato"];
        $numero = $_POST["numero"];
        $ementa = $_POST["ementa"];
        $data = $_POST["data"];
        $conteudo=$_POST["conteudo"];

         $conteudo=$_POST["conteudo"];
//         echo "$id_legislacao <br/>";
//         echo "$ato <br/>";
//         echo "$numero <br/>";
//         echo utf8_encode("$ementa <br/>");
//         echo "$data <br/>";
//         echo "$conteudo <br/>";
        
        include("../conection.php");
            $mySQL = new MySQL; //instancia o objeto
            //$sql="INSERT INTO `tb_telefone`(id_func, fone, cel_corp, email) VALUES('$id', '$fone', '$cel_corp', '$email')";
           
            $sql="UPDATE `tb_legislacao` SET `id_ato`='$ato',`numero`='$numero' ,`ementa`='".$ementa."' ,`date`='$data' ,`conteudo`='$conteudo' WHERE id_legislacao=".$id_legislacao;
           // echo "<br/>".$sql."<br/><br/><br/>";
                $rsResult = $mySQL->executeQuery($sql); 
                if ($rsResult) {
                    //  header('location:../legislacao_listagem.php?curso_attempt=2');
                      echo "OK";
                }
    //}
        header('location:../legislacao_listagem.php?curso_attempt=2');