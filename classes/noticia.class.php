<?php 

include_once 'database.class.php';

class Noticia{
	private $idNoticia = "";
	public $idPortal = "";
	public $titulo = "";
	public $data = "";
	public $gravata = "";
	public $conteudo = "";

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

	public function save(){
		$banco = new Database();
		$consulta = $banco->db->prepare("INSERT INTO noticia (id_portal, titulo, data, gravata, conteudo) VALUES (?, ?, ?, ?, ?)");
		$consulta->execute(array($this->idPortal, $this->titulo, $this->data, $this->gravata, $this->conteudo));

		return $resultado = $consulta->fetch();


		}

	public function get($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM noticia WHERE id_noticia=?");
		$consulta->execute(array($id));
		$resultado = $consulta->fetch();

		$this->idNoticia = $resultado['id_noticia'];
		$this->idPortal = $resultado['id_portal'];
		$this->titulo = $resultado['titulo'];
		$this->data = $resultado['data'];
		$this->gravata = $resultado['gravata'];
		$this->conteudo = $resultado['conteudo'];

	}

	public function update(){
		$banco = new Database();
		$consulta = $banco->db->prepare("UPDATE noticia SET id_portal=?, titulo=?, data=?, gravata=?, conteudo=? WHERE id_noticia=?");
		$consulta->execute(array($this->idPortal, $this->titulo, $this->data, $this->gravata, $this->conteudo, $this->idNoticia));

		return $resultado = $consulta->fetch();
		
	}
}

?>