<?
include_once('clsConexion.php');
class Materia extends Conexion
{
	//atributos
	private $sigla;
	private $nombre;
	private $creditos;
	
	//construtor
	public function Materia()
	{   parent::Conexion();
		$this->sigla="";
		$this->nombre="";
		$this->creditos="";

	}
	//propiedades de acceso
	public function setSigla($valor)
	{
		$this->sigla=$valor;
	}
	public function getSigla()
	{
		return $this->sigla;
	}

	public function setNombre($valor)
	{
		$this->nombre=$valor;
	}
	public function getNombre()
	{
		return $this->nombre;
	}

	public function setCreditos($valor)
	{
		$this->creditos=$valor;
	}
	public function getCreditos()
	{
		return $this->creditos;
	}
    

	public function Guardar()
	{
     $sql="insert into materia(sigla,nombre,creditos) values('$this->sigla','$this->nombre','$this->creditos')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
}    
?>