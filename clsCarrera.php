<?
include_once('clsConexion.php');
class Carrera extends Conexion
{
	//atributos

    private $cod_carrera;
	private $nombre;
	//construtor
	public function Carrera()
	{	parent::Conexion();
		$this->cod_carrera=0;
		$this->nombre="";
	}

		//propiedades de acceso

	public function getCod_carrera(){
		return $this->cod_carrera;
	}
	public function setCod_carrera($valor){
		$this->cod_carrera=$valor;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nom){
		$this->nombre=$nom;
	}
	
	
	public function Guardar()
	{
     $sql="insert into carrera(cod_carrera,nombre) values('$this->cod_carrera','$this->nombre')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
}    
?>