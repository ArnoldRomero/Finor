<?php
include_once('clsConexion.php');
class Grupo extends Conexion
{
	//atributos
	private $nro_grupo;
	private $fechaini;
	private $fechafin;
	private $gestion;
	private $cod_docente;
	private $cod_carrera;
	private $sigla;

	//construtor
	public function Grupo()
	{   parent::conexion();
		$this->nro_grupo=0;
		$this->fechaini="";
		$this->fechafin="";
		$this->gestion=0;
		$this->reg_docente=0;
		$this->cod_carrera="";
		$this->sigla="";

	}

	public function setNroGrupo($valor)
	{
		$this->nro_grupo=$valor;
	}
	public function getNroGrupo()
	{
		return $this->nro_grupo;
	}

	public function setfechaini($valor)
	{
		$this->fechaini=$valor;
	}
	public function getfechaini()
	{
		return $this->fechaini;
	}

	public function setfechafin($valor)
	{
		$this->fechafin=$valor;
	}
	public function getfechafin()
	{
		return $this->fechafin;
	}

	public function setGestion($valor)
	{
		$this->gestion=$valor;
	}
	public function getGestion()
	{
		return $this->gestion;
	}

	public function setRegDocente($valor)
	{
		$this->reg_docente=$valor;
	}
	public function getRegDocente()
	{
		return $this->reg_docente;
	}

	public function setCodCarrera($valor)
	{
		$this->cod_carrera=$valor;
	}
	public function getCodCarrera()
	{
		return $this->cod_carrera;
	}

	public function setSigla($valor)
	{
		$this->sigla=$valor;
	}
	public function getSigla()
	{
		return $this->sigla;
	}



	public function guardar()
	{
     $sql="INSERT INTO grupo (fecha_inicio,fecha_final,gestion,reg_docentef,cod_carreraf,siglaf) VALUES('$this->fechaini','$this->fechafin','$this->gestion','$this->reg_docente','$this->cod_carrera','$this->sigla')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function modificar()
	{
		$sql="UPDATE grupo SET fecha_inicio='$this->fechaini', fecha_final='$this->fechafin', gestion='$this->gestion', reg_docentef='$this->reg_docente', cod_carreraf='$this->cod_carrera',siglaf='$this->sigla' WHERE nro_grupo=$nro_grupo";
		if (parent::ejecutar($sql)) {
			return true;
		}
		else
		{
			return false;
		}
	}

		

	public function eliminar()
	{
		$sql="DELETE FROM grupo WHERE nro_grupo='$this->nro_grupo'";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function buscar()
	{
		$sql="SELECT * FROM grupo,docente,matcar,materia,carrera WHERE  grupo.reg_docentef=docente.reg_docente AND grupo.siglaf=matcar.sigla_f AND grupo.cod_carreraf=matcar.cod_carrera_f AND matcar.cod_carrera_f=carrera.cod_carrera AND matcar.sigla_f=materia.sigla ORDER BY semestre ASC ";
		return parent::ejecutar($sql);
	}

	public function buscarxid($criterio)
	{
		$sql="SELECT * FROM grupo,docente,matcar,materia,carrera WHERE  grupo.reg_docentef=docente.reg_docente AND grupo.siglaf=matcar.sigla_f AND grupo.cod_carreraf=matcar.cod_carrera_f AND matcar.cod_carrera_f=carrera.cod_carrera AND matcar.sigla_f=materia.sigla and nro_grupo like'$criterio%' ORDER BY semestre ASC ";
		return parent::ejecutar($sql);
	}

	public function buscarxcarrerasemestre($carrera,$semestre)
	{
		$sql="SELECT * FROM grupo,docente,matcar,materia,carrera WHERE  grupo.reg_docentef=docente.reg_docente AND grupo.siglaf=matcar.sigla_f AND grupo.cod_carreraf=matcar.cod_carrera_f AND matcar.cod_carrera_f=carrera.cod_carrera AND matcar.sigla_f=materia.sigla and nombre_c like '%$carrera%' OR semestre like '$semestre%' ORDER BY semestre ASC ";
		return parent::ejecutar($sql);
	}

}    
?>