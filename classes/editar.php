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

        <?php
        session_start();
        if ((isset($_SESSION['login']) == true) and ( isset($_SESSION['senha']) == true)) {
            $logado = $_SESSION['login'];
            $id = $_SESSION['id'];

            $nome = $_POST["nome"];
            $pront = $_POST["pront"];
           // $diretoria = $_POST["diretoria"];
            //$diretorias = $_POST["diretorias"];
           // $localidade = $_POST["localidade"];
            $data = $_POST["data"];
            $dir = $_POST["dir"];
            $divi = $_POST["divi"];
            //$fone = $_POST["fone"];
            //$cel_corp = $_POST["cel_corp"];
            $email = $_POST["email"];
           // echo "-->".$diretorias;
           // echo $data;
            include("../conection.php");
            $mySQL = new MySQL; //instancia o objto
            $sql = "UPDATE tb_funcionarios SET nome='".$nome ."' "
                    . ", pront='".$pront ."' "
                      . ", dir='".$dir ."' "
                    . ", divi='".$divi ."' "
                    . ", dt_nasc='".$data ."' "
                     .", email='".$email ."' "
                    . " WHERE id_func=".$id;
            
            $rsResult = $mySQL->executeQuery($sql); // $rsClientes recebe o valor do resultado da função executeQuery que criamos em nossa classe.
            if ($rsResult) {
             //   echo "Update OK <br/>";
                $func=1;
            } else {
            //    echo "erro Update <br/>";
            }
            
//            $sql = "select * from tb_telefone where id_func=".$id;
//      
//            
//            $rsResult = $mySQL->executeQuery("$sql"); // $rsClientes recebe o valor do resultado da função executeQuery que criamos em nossa classe.
//            $rsResult_totalRows = mysql_num_rows($rsResult); //recebo o valor de todas as linhas retornadas, com a sintaxe mysql_num_rows.
//
//            $row_rsResult = mysql_fetch_assoc($rsResult);
//            if ($row_rsResult >0){ //achou na tb_telefone
//                 $sql = "UPDATE tb_telefone SET fone='$fone'"
//                        . ", cel_corp='$cel_corp'"
//                        . ", email='$email'"
//                        . " WHERE id_func= $id";
//                    $rsResult = $mySQL->executeQuery($sql); 
//                     if ($rsResult) {
//                         $fone=1;
//                     }
//            }
//                else{
//                    $sql="INSERT INTO `tb_telefone`(id_func, fone, cel_corp, email) VALUES('$id', '$fone', '$cel_corp', '$email')";
//                    $rsResult = $mySQL->executeQuery($sql); 
//                     if ($rsResult) {
//                         $fone=1;
//                     }
//              }
//            
//                 if ($func==1 and $fone==1) {
//                         $msn="Alterações Salvas com Sucesso";
//                     }
            
            
        } else {
            echo "Login Necessário";
        }
        $msn="Alterações Salvas com Sucesso";
     
             header('location:../perfil.php?perfil='.$msn);
        ?>
    </body>
</html>
