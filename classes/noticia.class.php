<?php 

include 'database.class.php';

class Noticia{

	public function getAll(){
		$banco = new Database();
		$consulta = $banco->db->query("SELECT * FROM noticia");
		while($resultado = $consulta->fetch()) {
			$noticias[] = $resultado;
		}
		return $noticias;	
	}

	public function getById($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM noticia WHERE id_noticia=?");
		$consulta->execute(array($id));

		return $resultado = $consulta->fetch();	
	}	
}

?>