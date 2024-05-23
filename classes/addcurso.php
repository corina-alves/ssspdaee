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
          if ($tipo = $_SESSION['tipo'] == 2 or $tipo = $_SESSION['tipo'] == 1) {
            echo "logado";
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
             
             
               if ((empty($curso)) or (empty($data_in)) or (empty($horario)) or (empty($vagas))or (empty($resp))or (empty($local))or (empty($endereco)) )  {
                    header('location:../curso_listar.php');
               }else{
             
             
//            echo "$curso<br/>$data_in<br/>$data_fim<br/> $horario<br/> $vagas<br/> $resp<br/>
//             $local<br/>
//             $endereco<br/>
//             $publico<br/>
//             $objetivo<br/>
//             $conteudo<br/>
//             $inscricoes";
          //  echo "<br/>";
            $foto64=fotoBase64($_FILES);
            //echo $foto64;
          

            
            include("../conection.php");
            $mySQL = new MySQL; //instancia o objto
            $sql="INSERT INTO `tb_curso`(curso,horario, vagas,responsavel, local, endereco, publico_alvo,objtivo,conteudo,inscricoes,data_in,data_fim,foto ) "
                    . "VALUES('$curso',"
                    . "'$horario',"
                    . "'$vagas',"
                    . "'$resp',"
                    . "'$local',"
                    . "'$endereco',"
                    . "'$publico',"
                    . "'$objetivo',"
                    . "'$conteudo',"
                    . "'$inscricoes',"
                    . "'$data_in',"
                    . "'$data_fim',"
                     . "'$foto64'"
                    . ")";
                    $rsResult = $mySQL->executeQuery($sql); 
                     if ($rsResult) {
                       header('location:../curso_listar.php?curso_attempt=1');
                      //   echo "OK";
                     }
         
               }
        }
        }
        ?>
    </body>
</html>
