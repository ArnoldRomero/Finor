<?
include_once('clsConexion.php');
class Estudiante extends Conexion
{
	//atributos
	private $reg_estudiante;
	private $nombres;
	private $paterno;
    private $materno;
    private $email;
	
	//construtor
	public function Estudiante()
	{   parent::Conexion();
		$this->reg_estudiante=0;
		$this->nombres="";
		$this->paterno="";
        $this->materno="";
        $this->email="";
	}
	//propiedades de acceso
	public function setRegEstudiante($valor)
	{
		$this->reg_estudiante=$valor;
	}
	public function getRegEstudiante()
	{
		return $this->reg_estudiante;
	}

	public function setNombre($valor)
	{
		$this->nombres=$valor;
	}
	public function getNombre()
	{
		return $this->nombres;
	}

	public function setPaterno($valor)
	{
		$this->paterno=$valor;
	}
	public function getPaterno()
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
	public function setEmail($valor)
	{
		$this->email=$valor;
	}
	public function getEmail()
	{
		return $this->email;
	}

	//-------------Metodos de Procedimientos------------//

	public function Guardar()
	{
     $sql="insert into Alumno(reg_estudiante,nombres,paterno,materno,email) values('$this->reg_estudiante','$this->nombres','$this->paterno','$this->materno','$this->email')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function Eliminar()
	{
		$sql="delete from Alumno where id reg_estudiante='$this->reg_estudiante'";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function Modificar(){
		$sql="update Alumno set nombres='$this->nombres', paterno='$this->paterno', materno='$this->materno', email='$this->email' where reg_estudiante='$this->reg_estudiante'";
		if (parent::ejecutar(sql))
			return true;
		else
			return false;	
	}
	
	//-----------Metodos de Funcion----------//

	public function Buscar(){
		$consulta="select * from Alumno";
		return parent::ejecutar($consulta);
	}

	public function BuscarPorRegistro($criterio){
		$consulta="select * from Alumno where reg_estudiante like '$criterio%'";
		return parent::ejecutar($consulta);
	}

	public function BuscarPorNombreApellido($criterio){
		$consulta="select * from Alumno where concat (nombres,' ',paterno) like '%$criterio%'";
		return parent::ejecutar($consulta);
	}


}    
?>