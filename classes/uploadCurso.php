<?php


function fotoBase64 () {

    $msnerror = "";
$_UP['pasta'] = "../temp/"; // Pasta onde o arquivo vai ser salvo
$_UP['tamanho'] = 1024 * 1024 * 7; // 2Mb // Tamanho máximo do arquivo (em Bytes)
$_UP['extensoes'] = array('jpg', 'png', 'gif'); // Array com as extensões permitidas
$_UP['renomeia'] = false; // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

if ($_FILES['file']['error'] != 0) {// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
    die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
    $msnerror = "Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']];
    return $msnerror;
   //exit; // Para a execução do script
}

// Faz a verificação da extensão do arquivo
$explode = explode('.', $_FILES['file']['name']);
$end = end($explode);
$extensao = strtolower($end);
if (array_search($extensao, $_UP['extensoes']) === false) {
    $msnerror = "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
    return $msnerror;
} else if ($_FILES['file']['size'] > $_UP['tamanho']) {// Faz a verificação do tamanho do arquivo
    $msnerror = "O arquivo enviado é muito grande, envie arquivos de até 7Mb.";
    return $msnerror;
} else {// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
    if ($_UP['renomeia'] == true) {// Primeiro verifica se deve trocar o nome do arquivo

    } else { // Mantém o nome original do arquivo
        $nome_final = $_FILES['file']['name'];
    }
    $foto = $_FILES['file'];
    $redim = new Redimensiona();
    if ($redim->Redimensionar($foto, 250, $_UP['pasta'], $nome_final)) {
       // include("../conection.php");
        
 
        $imagedata = file_get_contents($_UP['pasta'] . $nome_final);
        $base64 = base64_encode($imagedata);
        $foto64 = "data:image/jpeg;base64," . $base64;
       
       //$mySQL = new MySQL;
       // $sql="UPDATE tb_curso SET foto='" . $foto64 . "'WHERE id_func=" . $id;
        
        
    // echo"<br/>";
        $arquivo = $_UP['pasta'] . $nome_final;
        if (!unlink($arquivo))
        {
         // echo ("Erro ao deletar $arquivo");
        }
        else
        {
         // echo ("Deletado $arquivo com sucesso!");
        }
        
        
        $msnerror = "Upload efetuado com sucesso!";
        return $foto64;
    } else {
        $msnerror = "Não foi possível enviar o arquivo, tente novamente";
         return $msnerror;
    }
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