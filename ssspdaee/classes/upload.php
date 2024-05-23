<?php

session_start();
if ((isset($_SESSION['login']) == true) and ( isset($_SESSION['senha']) == true)) {
    $id = $_SESSION['id'];
    //  echo" ID--> " . $id; 
}
$msnerror = "";
$_UP['pasta'] = "../funcionarios/"; // Pasta onde o arquivo vai ser salvo
$_UP['tamanho'] = 1024 * 1024 * 7; // 2Mb // Tamanho máximo do arquivo (em Bytes)
$_UP['extensoes'] = array('jpg', 'png', 'gif'); // Array com as extensões permitidas
$_UP['renomeia'] = true; // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

if ($_FILES['file']['error'] != 0) {// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
    die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
    $msnerror = "Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']];
    header('location:../perfil.php?msnerror=' . $msnerror);
    exit; // Para a execução do script
}

// Faz a verificação da extensão do arquivo
$explode = explode('.', $_FILES['file']['name']);
$end = end($explode);
$extensao = strtolower($end);
if (array_search($extensao, $_UP['extensoes']) === false) {
    //  echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
    $msnerror = "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
    header('location:../perfil.php?msnerror=' . $msnerror);
} else if ($_FILES['file']['size'] > $_UP['tamanho']) {// Faz a verificação do tamanho do arquivo
    // echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
    $msnerror = "O arquivo enviado é muito grande, envie arquivos de até 7Mb.";
    header('location:../perfil.php?msnerror=' . $msnerror);
} else {// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
    if ($_UP['renomeia'] == true) {// Primeiro verifica se deve trocar o nome do arquivo
        include("../conection.php");
        $mySQL = new MySQL; //instancia o objto
        $rsResult = $mySQL->executeQuery("SELECT * FROM tb_funcionarios where id_func=" . $id);
        $rsResult_totalRows = mysql_num_rows($rsResult);
        $row_rsResult = mysql_fetch_assoc($rsResult);
        if ($row_rsResult > 0) {
            $pront = $row_rsResult["pront"];
        }
        //$pront = "10228";
        $nome_final = $pront . "." . $extensao;
    } else { // Mantém o nome original do arquivo
        $nome_final = $_FILES['file']['name'];
    }
    $foto = $_FILES['file'];
    $redim = new Redimensiona();
    //$redim->Redimensionar($foto, 250, $_UP['pasta'],$nome_final);
    if ($redim->Redimensionar($foto, 250, $_UP['pasta'], $nome_final)) {
        // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
        // $nome_final="teste";
        $mySQL = new MySQL;
        $rsResult = $mySQL->executeQuery("UPDATE tb_funcionarios SET foto='" . $nome_final . "'WHERE id_func=" . $id);
        //echo "<script>alert('Olá, Mundo!');</script>";
        header('location:../perfil.php');
        // echo "Upload efetuado com sucesso!";
        $msnerror = "Upload efetuado com sucesso!";
        // echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
    } else {
        // echo "Não foi possível enviar o arquivo, tente novamente";
        $msnerror = "Não foi possível enviar o arquivo, tente novamente";
        header('location:../perfil.php?msnerror=' . $msnerror);
    }
}

class Redimensiona {
    public function Redimensionar($imagem, $largura, $pasta, $nome_final) {
        if ($imagem['type'] == "image/jpeg") {$img = imagecreatefromjpeg($imagem['tmp_name']);} 
        else if ($imagem['type'] == "image/gif") {$img = imagecreatefromgif($imagem['tmp_name']);} 
        else if ($imagem['type'] == "image/png") {$img = imagecreatefrompng($imagem['tmp_name']);} 
        else {return;}
        $x = imagesx($img);
        $y = imagesy($img);
        $autura = ($largura * $y) / $x;
        $nova = imagecreatetruecolor($largura, $autura);
        imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $autura, $x, $y);
        $local = "$pasta/$nome_final";
        if (imagejpeg($nova, $local)) {
            imagedestroy($img);
            imagedestroy($nova);
            return true;
        } else {
            imagedestroy($img);
            imagedestroy($nova);
            return false;
        }
    }
}

?>