<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DAEE - Legislação</title>
        <!-- Bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
</html>
<?php

session_start();
if ((isset($_SESSION['login']) == true) and ( isset($_SESSION['senha']) == true)) {
    echo "logado <br/>";
    $ato = utf8_decode($_POST["ato"]);
    $numero = utf8_decode($_POST["numero"]);
    $ementa = utf8_decode($_POST["ementa"]);
    $data = $_POST["data"];
   $conteudo= utf8_decode($_POST["conteudo"]);
   // $conteudo=utf8_encode($_POST["conteudo"]);
//conteudo=  utf8_decode($_POST["conteudo"]);
    echo "$ato <br/>";
    echo "$numero <br/>";
    echo "$ementa <br/>";
    echo "$data <br/>";

  /*  $_UP['pasta'] = '../arquivos/institucional/legislacao/'; // Pasta onde o arquivo vai ser salvo
    $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb // Tamanho máximo do arquivo (em Bytes)
    $_UP['extensoes'] = array('pdf'); // Array com as extensões permitidas
    $_UP['renomeia'] = false; // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
    // Array com os tipos de erros de upload do PHP
    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
    $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

    if ($_FILES['arquivo']['error'] != 0) {// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
        die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
        exit; // Para a execução do script
    }

    $explode = explode('.', $_FILES['arquivo']['name']);
    $end = end($explode);
    $extensao = strtolower($end);
    if (array_search($extensao, $_UP['extensoes']) === false) {
        echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
    } else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {// Faz a verificação do tamanho do arquivo
        echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
    } else {
        if ($_UP['renomeia'] == true) {// Primeiro verifica se deve trocar o nome do arquivo
            $pront = "10228";
            $nome_final = $pront . "." . $extensao;
            $tamanho = mt_rand(5, 9);
            $all_str = "abcdefghijlkmnopqrstuvxyzw1234567890";
            $nome = "";
            for ($i = 0; $i <= $tamanho; $i++) {
                $nome.= $all_str[mt_rand(0, 36)];
            }
            $nome_final = $nome . "." . $extensao;
            echo $nome_final . "<br/>";
        } else {
            $nome_final = $_FILES['arquivo']['name']; // Mantém o nome original do arquivo
        }

        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {// Depois verifica se é possível mover o arquivo para a pasta escolhida
            echo "Upload efetuado com sucesso!";
            include("../conection.php");
            $mySQL = new MySQL; //instancia o objto

            $file = "arquivos/institucional/legislacao/". $nome_final;
   * 
   */
     
    include("../conection.php");
            $mySQL = new MySQL; //instancia o objto
            $sql = "INSERT INTO `tb_legislacao`(id_ato,numero,date,ementa,conteudo) "
                    . "VALUES('$ato',"
                    . "'$numero',"
                     . "'$data',"
                    . "'$ementa',"
                     . "'$conteudo'"
                 //   . "'conteudo'"
              //      . "'$file'"
                    . ")";
                  
            $rsResult = $mySQL->executeQuery($sql);
            if ($rsResult) {
                
                echo "OK";
            }
         //   echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
        } else {
        //    echo "Não foi possível enviar o arquivo, tente novamente";// Não foi possível fazer o upload, provavelmente a pasta está incorreta
        }
        header('location:../legislacao_listagem.php?leg_attempt=1');
 //   }
//}
?>
  