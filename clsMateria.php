<?php
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
     $sql="insert into materia(sigla,nombre_m,creditos) values('$this->sigla','$this->nombre','$this->creditos')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	public function Eliminar()
	{
		$sql="delete from materia where sigla='$this->sigla'";
		if (parent::ejecutar($sql))
			return true;
        else
        	return face;
			
		}
			public function Modificar(){
               $sql="update materia set nombre_m='$this->nombre', creditos='$this->creditos' where sigla='$this->sigla'";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

       public function Buscar(){
       	$consulta="SELECT * from materia ORDER BY nombre_m ASC ";
		return parent::ejecutar($consulta);
       }

       public function BuscarPorSigla($criterio){
		$consulta="SELECT * from materia where sigla like '$criterio%' ORDER BY sigla ASC ";
		return parent::ejecutar($consulta);
	}

	public function BuscarPorNombre($criterio){
		$consulta="SELECT * from materia where nombre_m like '$criterio%' ORDER BY nombre_m ASC ";
		return parent::ejecutar($consulta);
	}

		
	
	
}    
?>