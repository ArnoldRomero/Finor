<?php
include_once('clsConexion.php');
class GrupoEstudiante extends Conexion
{
	//atributos
	private $reg_estudiante;
	private $nro_grupo;
	private $nota;

	//construtor
	public function GrupoEstudiante()
	{   parent::conexion();
		$this->reg_estudiante=0;
		$this->nro_grupo=0;
		$this->nota=0;
	}

	public function setRegEstudiante($valor)
	{
		$this->reg_estudiante=$valor;
	}
	public function getRegEstudiante()
	{
		return $this->reg_estudiante;
	}

	public function setNroGrupo($valor)
	{
		$this->nro_grupo=$valor;
	}
	public function getNroGrupo()
	{
		return $this->nro_grupo;
	}

	public function setNota($valor)
	{
		$this->nota=$valor;
	}
	public function getNota()
	{
		return $this->nota;
	}



	public function guardar()
	{
     $sql="INSERT INTO grupoalumno (reg_estudiantef,nro_grupof)VALUES('$this->reg_estudiante','$this->nro_grupo')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}


	public function eliminar()
	{
		$sql="DELETE FROM grupoalumno WHERE nro_grupof='$this->nro_grupo' AND reg_estudiantef='$this->reg_estudiante'";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function buscarxestudiante($criterio)
	{
		$sql="SELECT * FROM estudiante,grupoalumno,grupo,docente,matcar,carrera,materia  WHERE estudiante.reg_estudiante=grupoalumno.reg_estudiantef AND grupoalumno.nro_grupof=grupo.nro_grupo AND grupo.reg_docentef=docente.reg_docente AND grupo.siglaf=matcar.sigla_f AND grupo.cod_carreraf=matcar.cod_carrera_f AND matcar.cod_carrera_f=carrera.cod_carrera AND matcar.sigla_f=materia.sigla AND reg_estudiante like '%$criterio%'  ORDER BY nombres ASC ";
		return parent::ejecutar($sql);
	}

	public function buscarxgrupo($criterio)
	{
		$sql="SELECT * FROM estudiante,grupoalumno,grupo,docente,matcar,carrera,materia  WHERE estudiante.reg_estudiante=grupoalumno.reg_estudiantef AND grupoalumno.nro_grupof=grupo.nro_grupo AND grupo.reg_docentef=docente.reg_docente AND grupo.siglaf=matcar.sigla_f AND grupo.cod_carreraf=matcar.cod_carrera_f AND matcar.cod_carrera_f=carrera.cod_carrera AND matcar.sigla_f=materia.sigla AND nro_grupo='$criterio'  ORDER BY nro_grupo ASC ";

		return parent::ejecutar($sql);
	}


}    
?>