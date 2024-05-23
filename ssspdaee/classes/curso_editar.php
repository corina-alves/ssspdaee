<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        HEllo
      <?php
            include 'uploadCurso.php';
        session_start();
        if ((isset($_SESSION['login']) == true) and ( isset($_SESSION['senha']) == true)) {
            echo "logado";
            $id_curso=$_POST["id"];
            $curso = $_POST["curso"];
            $data_in = $_POST["data_in"];
            $data_fim = $_POST["data_fim"];
             $horario = $_POST["horario"];
             $vagas=$_POST["vagas"];
             $resp=$_POST["resp"];
             $local=$_POST["local"];
             $endereco=$_POST["endereco"];
             $publico=$_POST["publico"];
             $objetivo=$_POST["objetivo"];
             $conteudo=$_POST["conteudo"];
             $inscricoes=$_POST["inscricoes"];
             
            echo "$curso<br/>$data_in<br/>$data_fim<br/> $horario<br/> $vagas<br/> $resp<br/>
//             $local<br/>
//             $endereco<br/>
//             $publico<br/>
//             $objetivo<br/>
//             $conteudo<br/>
//             $inscricoes";
            echo "<br/>";
            echo $_FILES['file']['name']."--";
            if($_FILES['file']['name']!= null){
                //echo "tem foto";
                $foto64=fotoBase64($_FILES);
                $fotoSQL=" `foto`='$foto64',";
                }else{
                    $fotoSQL="";
                   // echo "nao tem foto";
                }
                
            
            //$foto64=fotoBase64($_FILES);
//             echo $foto64;
            include("../conection.php");
            $mySQL = new MySQL; //instancia o objto
         
            $sql="UPDATE `tb_curso` SET `curso`='$curso',`data_in`='$data_in',`data_fim`='$data_fim',`horario`='$horario',`vagas`='$vagas',`responsavel`='$resp',`local`='$local',"
                    . "`endereco`='$endereco',`publico_alvo`='$publico',`objtivo`='$objetivo',`conteudo`='$conteudo', $fotoSQL `inscricoes`='$inscricoes' WHERE id_curso=".$id_curso;
         ////   echo "<br/>".$sql;
                    $rsResult = $mySQL->executeQuery($sql); 
                     if ($rsResult) {
                       header('location:../curso_listar.php?curso_attempt=2');
                    //      header('location:../curso_listar.php?curso_attempt=1');
                         echo "OK";
                     }
        }
        ?>
    </body>
</html>
