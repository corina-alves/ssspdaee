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
//        include("../conection.php");
//        $mySQL = new MySQL; //instancia o objto
//        $rsResult = $mySQL->executeQuery("SELECT * FROM tb_funcionarios where id_func=" . $id);
//        $rsResult_totalRows = mysql_num_rows($rsResult);
//        $row_rsResult = mysql_fetch_assoc($rsResult);
//        if ($row_rsResult > 0) {
//            $pront = $row_rsResult["pront"];
//        }
//        //$pront = "10228";
//        $nome_final = $pront . "." . $extensao;
    } else { // Mantém o nome original do arquivo
        $nome_final = $_FILES['file']['name'];
    }
    $foto = $_FILES['file'];
    $redim = new Redimensiona();
    //$redim->Redimensionar($foto, 250, $_UP['pasta'],$nome_final);
    if ($redim->Redimensionar($foto, 250, $_UP['pasta'], $nome_final)) {
        // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
        // $nome_final="teste";
        include("../conection.php");
        
       // echo "HEre";
       // echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
      //  echo "<img class='' src='" . $_FILES['file']['name'] . " ' alt='...' width='50'/>";
        
        $imagedata = file_get_contents($_UP['pasta'] . $nome_final);
        $base64 = base64_encode($imagedata);
        $foto64 = "data:image/jpeg;base64," . $base64;
      //   echo"<br/>";
       // echo "<img class='' src='" . $foto64 . " ' alt='...'/>";
       // echo $foto64;
        //echo $id;
       //  $foto64="data:image/jpeg;base64,iVBORw0KGgoAAAANSUhEUgAAAEwAAABlCAYAAADnNAXVAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAAB50RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNS4xqx9I6wAAABZ0RVh0Q3JlYXRpb24gVGltZQAwMS8wOS8xM0Www6UAAARsSURBVHic7Z3bTus6EIb/VZlWUZSWBlQVEFe8/5vwClyh0ioyoSGKrAbjtS9Qujn0kEkyTlma7xJa2/nisR17ov65v7//C6E2CgDu7u76bsev4OHhAYO+G/HbEGFERBgREUZEhBERYUREGBERRkSEERFhREQYERFGRIQREWFERBgREUZEhBFRfTfgM8YYWGvx9va2/dtoNIJSCqPRqMeW/U/vwvI8R1EUKIri4OeUUgiCAJPJpFd5vQkrigJaa1hra33eWos8z5HnOYIgwGw2g1L+m++9RucckiQ52qMOYYzB4+Mj4jjGZDLpsHXH8TroW2uxWCxayapwzkFrjSRJOmhZfbwJc85huVyiLMtOy83z3Ks0b8JWq1Xnsiqqsc0HXoSlaQpjDGsdlAmkDezCnHPIsoy7GjjnkKYpez3swtbrNZxz3NUA+AhN7l7GLsxH7/rMer1mLZ9VmDHGW++q6GLJcgh2Yb6x1rKGJaswrmXEMT4/vHcNqzDf4eiDf3I/jHMo+CeFcW7/sAobDPq5H5z1sl7RcDjkLH4vZ2dnbGWzCutjZ1QpxbqxyCosDEPvYRkEAWv57FcThiF3FV/g3oFlFxbHMXcVW4IgYB8G2IUppbztu19cXLDX4WWAieOYfcacTqdeJhkvwgaDAWazGdsEEEWRt9D3NoWNRiNcX193Li0MQ1xeXnZa5iG8zvmVtK7CczKZYD6fe126dL7CM8ZsH36rfanqmL+axW5vb5GmKbIsa7SjoZTCbDZjX3PtrLurgjabDZ6envYKeHl5wXQ63Y41cRzj/Pwc6/W69l58GIYIwxBRFP34n9YaRVF8KWc4HGI8HiOKos56YSfCjsmqyLIM4/F4++gyGAwQxzHiOIa1FsaYnZt/Vc/cd9FZlu08OyjLElprvL6+4urqqpNHptYlVLkSdUKrOt6fz+c/G6LUzp5zDGvt0eO1siyxXC5xc3PTuqe17qdaa9JWdFEUnW7waa1r3ayyLLFYLFrX10pY0yN6rXWbarfUySv7TFmWrfMwGgvbbDaNL7wsy9bnlVV4U2mbh9FYWN1xax9pmrb+ftPjNK01NptNo+82EkYdt3bRtIcAH727TQ+lTFTfIQszxnR2/J/neaM73UU+WLXkoEIS5pzDarUiV3KI5+dn0ufTNO3sgLhKSKZAEtZ23NqFMab2IGyt7Ty5JUkS0lhIEsaV6FF3LcVxw5xzpNSCkzjIdc4dTVPKsqyX5JbvnIQw4OPhfF9o+MourMPJCAP2z34codiU2sJ8hIMx5sc4SX384eakehjw9TmzWmCeEr2/nPUday2SJEEURbVnT5+cnDDA74sKVE4uJE8dEUZEhBERYUREGBERRqS2sL5eUjg1agt7f3/nbMevQUKSiAgjIsKIiDAiIoyICCNSe3tnPB73kvHnA0r2dW1h3O/w/BYkJImIMCIijIgIIyLCiIgwIiKMiAgjIsKIiDAiIoyICCMiwoiIMCIijIgIIyLCiCjg46dMhXr8BwntMzYhTiulAAAAAElFTkSuQmCC";
        $mySQL = new MySQL;
        $sql="UPDATE tb_funcionarios SET foto='" . $foto64 . "'WHERE id_func=" . $id;
     //   echo"<br/>".$sql;
        $rsResult = $mySQL->executeQuery($sql);
        
        
     echo"<br/>";
        $arquivo = $_UP['pasta'] . $nome_final;
        if (!unlink($arquivo))
        {
         // echo ("Erro ao deletar $arquivo");
        }
        else
        {
         // echo ("Deletado $arquivo com sucesso!");
        }
        
        
        
       // $mySQL = new MySQL;
      //  $rsResult = $mySQL->executeQuery("UPDATE tb_funcionarios SET foto='" . $nome_final . "'WHERE id_func=" . $id);
        
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