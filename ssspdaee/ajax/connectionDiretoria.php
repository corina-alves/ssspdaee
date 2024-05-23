<?php

//Verificação de Segurança
//$url = $_SERVER["PHP_SELF"]; // $url recebe o valor da URL atual.
//if (eregi("conection.php", "$url")) { //função eregi para NÃO fazer diferença entre minúsculas e maiúsculas em nossa comparação. 
//                                      Em seguida, é verificado se a a URL digitada tem o mesmo nome do nosso arquivo.
//    header("Location: index.php"); //header para enviar o usuário de volta para o index.
//}

class MySQL {

    var $host = "10.20.40.229"; //onde esta o banco
    var $user = "root"; //usuario para entrar no MySql
    var $password = "daeesti"; //senha do MySQL
    var $database = "diretorias-daee"; //a base de dados criada
    var $query; // que será responsável por arqmazenar no SQL
    var $link; //responsável por fazer nossa conexão com o banco
    var $result; //armazenará o resultado da nossa transação

//Apenas instancia o Objeto
    function MySQL() {}

//Esta função faz a conexão com o Banco de Dados
    function connect() {
        $this->link = mysql_connect($this->host, $this->user, $this->password); //faz com que a variável que criei acima 
//                                      chama link receba o resultado da conexão com o banco de dados, através da sintaxe $this->link.
        if (!$this->link) { //verifico se a conexão falhou
            echo "Falha na conexao com o Banco de Dados!<br />";
            echo "Erro: " . mysql_error();
            die();
        } elseif (!mysql_select_db($this->database, $this->link)) { //verifica a base de dados
            echo "O Banco de Dados solicitado não pode ser aberto!<br />";
            echo "Erro: " . mysql_error();
            die();
        }
    }

    //Esta função executa uma Query
    function executeQuery($query) {
        $this->connect(); //fazer a conexao
        $this->query = $query;
        if ($this->result = mysql_query($this->query)) { //tenta executar a instrução SQL e armazena o resultado em $result
            $this->disconnect(); //desconecta o banco
            return $this->result; //retorna o valor de $result
        } else {
            echo "Ocorreu um erro na execução da SQL";
            echo "Erro :" . mysql_error();
            echo "SQL: " . $query;
            die();
            disconnect();
        }
    }

    //Esta função desconecta do Banco
    function disconnect() {
        return mysql_close($this->link);
    }

}
?>

