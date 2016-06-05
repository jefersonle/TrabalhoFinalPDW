<?php
//Classe para conexao com o banco
class Database{
	//Variáveis da classe, utilizadas para configurar a conexão
	private $database = "pdw";
	private $user = "postgres";
	private $pass = "123";
	public  $db = '';
	//Método construct que faz a conexão e retorna a mesma
	function __construct(){
		try {
		    return $this->db = new PDO("pgsql:host=localhost dbname={$this->database} user={$this->user} password={$this->pass}");
		} catch (PDOException $e) {
		    print $e->getMessage();
		}
	}

}