<?php 
// Dados da conex�o com o banco de dados
define('SERVER', 'localhost');
define('DBNAME', 'intra_net');
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
	$where = (!empty($parametro)) ? 'WHERE nome LIKE ?' : '';
        $where.= (!empty($parametro)) ? ' OR pront LIKE ?' : '';
	$sql = "SELECT nome, pront, dir FROM tb_funcionarios " . $where;
        

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
	$sql = "SELECT nome, pront, dir, divi, "
        . "DATE_FORMAT(dt_nasc,'%d/%m') AS aniversario , dt_nasc,ramal, "
        . " foto "
        . "FROM tb_funcionarios ";
	$sql .= "WHERE pront LIKE ? LIMIT 1";
        
        
 
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
	$json = json_encode($dados);
	echo $json;
endif;