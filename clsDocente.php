<?php

include_once('clsConexion.php');
class Docente extends Conexion
{
	// atributos
private $reg_docente;
private $nombre;
private $paterno;
private $materno;
private $telefono;
	
	 // constructor
public function Docente()
	{   parent::Conexion();
		$this->reg_docente=0;
		$this->nombre="";
		$this->paterno="";
		$this->materno="";
		$this->telefono=0;
	}

	// prpiedades de acceso
	public function setRegDocente($valor)
	{
		$this->reg_docente=$valor;
	}
	public function getRegDocente()
	{
		return $this->reg_docente;
	}
	
	public function setNombre($valor)
	{
		$this->nombre=$valor;
	}
	public function getNombre()
	{
		return $this->nombre;
	}
	public function setPaterno($valor)
	{
		$this->paterno=$valor;
	}
	public function getPaterno($valor)
	{
		return $this->paterno;
	}
	public function setMaterno($valor)
	{
		$this->materno=$valor;
	}
	public function getMaterno()
	{
		return $this->materno;
	}
	public function setTelefono($valor)
	{
		$this->telefono=$valor;
	}
	public function getTelefono()
	{
		return $this->telefono;
	}
    public function Guardar()
	{
     $sql="insert into docente(reg_docente,nombre,paterno,materno,telefono) values('$this->reg_docente', '$this->nombre','$this->paterno','$this->materno','$this->telefono')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	public function Eliminar()
	{
		$sql="delete from docente where  reg_docente='$this->reg_docente'";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function Modificar(){
		$sql="update docente set nombre='$this->nombre', paterno='$this->paterno', materno='$this->materno', telefono='$this->telefono' where reg_docente='$this->reg_docente'";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	
	//-----------Metodos de Funcion----------//

	public function Buscar(){
		$consulta="select * from docente";
		return parent::ejecutar($consulta);
	}

	public function BuscarPorRegistro($criterio){
		$consulta="select * from docente where reg_docente like '$criterio%'";
		return parent::ejecutar($consulta);
	}

	public function BuscarPorNombreApellido($criterio){
		$consulta="select * from docente where concat (nombre,' ',paterno) like '%$criterio%'";
		return parent::ejecutar($consulta);
	}


}    
?>
























