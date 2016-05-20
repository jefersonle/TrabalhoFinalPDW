<?php

class Database{
	private $database = "pdw";
	private $user = "postgres";
	private $pass = "123";
	public  $db = '';
	
	function __construct(){
		try {
		    return $this->db = new PDO("pgsql:host=localhost dbname={$this->database} user={$this->user} password={$this->pass}");
		} catch (PDOException $e) {
		    print $e->getMessage();
		}
	}

}