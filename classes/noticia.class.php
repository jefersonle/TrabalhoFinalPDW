<?php 
//Inclui classe para conexão com BD
include_once 'database.class.php';

//Cria classe Noticia
class Noticia{
	//Define variáveis da classe
	public $idNoticia = "";
	public $idPortal = "";
	public $titulo = "";
	public $data = "";
	public $gravata = "";
	public $conteudo = "";
	public $link = "";
	//Método para pegar todas as notícias do BD
	public function getAll(){
		$banco = new Database();
		$consulta = $banco->db->query("SELECT * FROM noticia ORDER BY id_noticia DESC");
		$noticias = array();
		while($resultado = $consulta->fetch()) {
			$noticias[] = $resultado;
		}
		return $noticias;	
	}
	//Método para pegar notícia pelo seu id no BD
	public function getById($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM noticia WHERE id_noticia=?");
		$consulta->execute(array($id));

		return $resultado = $consulta->fetch();	
	}	
	//Método para salvar novo objeto da classe no BD
	public function save(){
		$banco = new Database();
		$consulta = $banco->db->prepare("INSERT INTO noticia (id_portal, titulo, data, gravata, conteudo, link) VALUES (?, ?, ?, ?, ?, ?) RETURNING id_noticia");
		$consulta->execute(array($this->idPortal, $this->titulo, $this->data, $this->gravata, $this->conteudo, $this->link));
		$resultado = $consulta->fetch();

		return $resultado[0];

		}
	//Método para pegar notícia pelo id no BD e carregar na classe
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
		$this->link = $resultado['link'];

	}
	//Método para atualizar objeto da classe no BD
	public function update(){
		$banco = new Database();
		$consulta = $banco->db->prepare("UPDATE noticia SET id_portal=?, titulo=?, data=?, gravata=?, conteudo=?, link=? WHERE id_noticia=?");
		$consulta->execute(array($this->idPortal, $this->titulo, $this->data, $this->gravata, $this->conteudo, $this->link, $this->idNoticia));

		return $resultado = $consulta->fetch();
		
	}
	//Método para apagar notícia do BD pelo id
	public function delete($id){
		
		$banco = new Database();
		$consulta = $banco->db->prepare("DELETE FROM noticia WHERE id_noticia=?");
		$consulta->execute(array($id));

		return true;		
	}
	//Método para pegar notícias correspondentes com a busca
	public function search($word){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM noticia WHERE conteudo ILIKE ? OR titulo ILIKE ? ORDER BY id_noticia DESC");
		$consulta->execute(array("%".$word."%", "%".$word."%"));
		$noticias = array();
		while ($res = $consulta->fetch()) {
			$noticias[] = $res;
		}
		return $noticias;
	}

}

?>