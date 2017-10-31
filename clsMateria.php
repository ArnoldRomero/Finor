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
	public function Eliminar()
	{
		$sql="delete from materia where reg_materia='$this->reg_materia'";
		if (parent::ejecutar($sql))
			return true;
        else
        	return face;
			
		}
			public function Modificar(){
               $sql="update materia set sigla='$this->sigla', nombre='$this->nombre', creditos='$this->creditos'";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

       public function Buscar(){
       	$consulta="select * from materia";
		return parent::ejecutar($consulta);
       }

       public function BuscarPorSigla($criterio){
		$consulta="select * from materia where reg_materia like '$criterio%'";
		return parent::ejecutar($consulta);
	}

	public function BuscarPorNombre($criterio){
		$consulta="select * from materia where concat (sigla,' ',nombre) like '%$criterio%'";
		return parent::ejecutar($consulta);
	}

		
	
	
}    
?>