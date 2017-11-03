<?
ob_start();
session_start();
include_once('clsSemestre.php');
?>
<html>
<head>
<title></title>
<script> 
function Insertar(){ 
    opener.document.location.reload() 
    window.close() 
} 
</script> 
<style type="text/css">
</style>
</head>
<body>
<center><form id="form1" method="post" action="buscarSemestres.php">
<fieldset id="form">
<legend>BUSQUEDA DE CARRERAS Y MATERIAS POR SEMESTRE</legend>
<table width="342" border="0">
	<tr>
		<td>
		<label>CARRERA: </label>
		</td>
		<td>
			<input name="txtcarrera" type="text" size="20" value="" id="txtcarrera" />
		</td>
	</tr>
	<tr>
		<td>
		<label>SEMESTRE: </label>
		</td>
		<td>
			<input name="txtsemestre" type="text" size="20" value="" id="txtsemestre" />
		</td>
	</tr>
	<tr>
		<td>
		<label>MATERIA: </label>
		</td>
		<td>
			<input name="txtmateria" type="text" size="20" value="" id="txtmateria" />
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<center><input type="submit" name="botones" class="btn" value="Buscar" />    
			<input type="submit" class="btn" name="botones"  value="Volver" /></center>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		</td>
	</tr>
	<tr>
		<td colspan="2">
		 <?   

			$carrera=$_POST['txtcarrera'];
		    $semestre=$_POST['txtsemestre'];
		    $materia=$_POST['txtmateria'];

		    if ($_POST['botones']=='Buscar') {

		    	$listax=new CarreraMateria();
		    	
		    	$registros=$listax->Buscar($carrera,$semestre,$materia);
		    	mostrar($registros);
		    }

		    else{

		    	$todos=new CarreraMateria();
				$registros=$todos->Buscar($carrera,$semestre,$materia);
		    		mostrar($registros);
		    }
		  	  		

		  	  	function mostrar($registros)
		  	  	{							  
					echo "<table border='1' align='center'>";
					echo "<tr bgcolor='black' align='center'>
					<td><font color='white'>Carrera</font></td>
				   <td><font color='white'> Semestre</font></td>
				   <td><font color='white'> Materia </font></td>
				   <td><font color='white'>*</font></td></tr>";
					while($f=mysqli_fetch_object($registros))
					{
						echo "<td>$f->nombre_c</td>";
						echo "<td>$f->semestre</td>";
						echo "<td>$f->nombre_m</td>";

						echo "<td><a href='buscarSemestres.php?
						b_nombrec=$f->nombre_c&
						b_idcar=$f->cod_carrera&
						b_nombrem=$f->nombre_m&
						b_idmat=$f->sigla


						'> >> </a> </td>";
						echo "</tr>";
					}
					echo "</table>";
				}
		  
		  if($_POST['botones']=="Volver")
		  {
		  	echo "<script>window.close()</script>";
		  }
	  ?>
		</td>
	</tr>
</table>
</form></center>
<?
if($_GET["b_idcar"])
{
 $_SESSION["s_nombrec"]=$_GET["b_nombrec"];
 $_SESSION["s_idcar"]=$_GET["b_idcar"];
 $_SESSION["s_nombrem"]=$_GET["b_nombrem"];
 $_SESSION["s_idmat"]=$_GET["b_idmat"];

echo "<script> 
     opener.document.location.reload() 
     window.close() 
     </script>";
}

?>
</body>
</html>