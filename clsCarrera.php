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
	public function setCod_carrera($valor){
		$this->cod_carrera=$valor;
	}
	public function getCod_carrera(){
		return $this->cod_carrera;
	}
	
	public function setNombre($nom){
		$this->nombre=$nom;
	}
	public function getNombre(){
		return $this->nombre;
	}


	public function Guardar()
	{
     $sql="insert into carrera(cod_carrera,nombre_c) values('$this->cod_carrera','$this->nombre')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	public function Modificar()
	{
		$sql="update carrera set nombre_c='$this->nombre' where cod_carrera='$this->cod_carrera'";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	public function Eliminar()
	{
		$sql="delete from carrera where cod_carrera='$this->cod_carrera'";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	
	//-----------Metodos de Funcion----------//

	public function Buscar()
	{
		$consulta="select * from carrera";
		return parent::ejecutar($consulta);
	}

	public function BuscarPorCodigo($criterio){
		$consulta="select * from carrera where cod_carrera like '$criterio%'";
		return parent::ejecutar($consulta);
	}

	public function BuscarPorNombre($criterio){
		$consulta="select * from carrera where  nombre_c like '%$criterio%'";
		return parent::ejecutar($consulta);
	}	
}    
?>