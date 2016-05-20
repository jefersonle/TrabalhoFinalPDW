<?php 

include 'database.class.php';

class Portal{

	public function getAll(){
		$banco = new Database();
		$consulta = $banco->db->query("SELECT * FROM portal");
		while($resultado = $consulta->fetch()){
			$portais[] = $resultado;
		}			
		return $portais;
	}

	public function getById($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM portal WHERE id_portal=?");
		$consulta->execute(array($id));

		return $resultado = $consulta->fetch();	
	}
}

?>