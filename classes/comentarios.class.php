<?php 

include 'database.class.php';

class Comentarios{

	public function getAll(){
		$banco = new Database();
		$consulta = $banco->db->query("SELECT * FROM comentarios");
		while($resultado = $consulta->fetch()){
			$comentarios[] = $resultado;
		}			
		return $comentarios;
	}

	public function getById($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM comentarios WHERE id_comentario=?");
		$consulta->execute(array($id));

		return $resultado = $consulta->fetch();	
	}
}

?>