<?php 
// Dados da conex�o com o banco de dados
define('SERVER', '10.20.40.229');
define('DBNAME', 'diretorias-daee');
define('USER', 'root');
define('PASSWORD', 'daeesti');
 
// Recebe os par�metros enviados via GET
$acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
$parametro = (isset($_GET['parametro'])) ? $_GET['parametro'] : '';
 
// Configura uma conex�o com o banco de dados
$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
$conexao = new PDO("mysql:host=".SERVER."; dbname=".DBNAME, USER, PASSWORD, $opcoes);
 
// Verifica se foi solicitado uma consulta para o autocomplete
if($acao == 'autocomplete'):
	$where = (!empty($parametro)) ? 'WHERE diretoria LIKE ?' : '';
        $where.= (!empty($parametro)) ? ' OR divisao LIKE ?' : '';
	$sql = "SELECT iddiretorias,diretoria,divisao FROM diretorias " . $where ." GROUP BY divisao";
        
        
     //   SELECT nome, pront, dir FROM tb_funcionarios WHERE nome LIKE '%10228%' OR pront LIKE '%10228%'
 
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, '%'.$parametro.'%');
        $stm->bindValue(2, '%'.$parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
 
	$json = json_encode($dados);
       // echo $sql."<br/><br/><br/><br/>";
	echo $json;
endif;
 
// Verifica se foi solicitado uma consulta para preencher os campos do formul�rio
if($acao == 'consulta'):
	$sql = "SELECT iddiretorias,diretoria,divisao "
        . "FROM diretorias ";
	$sql .= "WHERE iddiretorias LIKE ? LIMIT 1";
        
        
 
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, '%'.$parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
 //echo $sql;
	$json = json_encode($dados);
	echo $json;
endif;