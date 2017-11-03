<?
ob_start();
session_start();
include_once('clsGrupoEstudiante.php');
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
<center><form id="form1" method="post" action="buscarMaterias.php">
<fieldset id="form">
<legend>BUSQUEDA DE MATERIAS</legend>
<table width="342" border="0">
	<tr>
		<td>
		<label>Nombre Materia: </label>
		</td>
		<td>
			<input name="txtBuscar" type="text" size="20" value="" id="txtBuscar" />
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
			

		    if ($_POST['botones']=='Buscar') {

		    	$listax=new Materia();
		    	$registros=$listax->buscarPorNombre($_POST['txtBuscar']);
		    	mostrar($registros);
		    }

		    else{
		    	$todos=new Materia();
				$registros=$todos->Buscar();
		    		mostrar($registros);
		    }
		  	  		

		  	  	function mostrar($registros)
		  	  	{							  
					echo "<table border='1' align='center'>";
					echo "<tr bgcolor='black' align='center'>
					<td><font color='white'>Sigla</font></td>
				   <td><font color='white'> Nombre</font></td>
				   <td><font color='white'>*</font></td></tr>";
					while($f=mysqli_fetch_object($registros))
					{
						echo "<tr >";
						echo "<td>$f->sigla</td>";
						echo "<td>$f->nombre_m</td>";

						echo "<td><a href='buscarMaterias.php? psigla=$f->sigla&pnombre=$f->nombre_m' > << </a> </td>";
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
if($_GET["pnombre"])
{
 $_SESSION["nombre_mat"]=$_GET["pnombre"];
 $_SESSION["id_sigla"]=$_GET["psigla"];

echo "<script> 
     opener.document.location.reload() 
     window.close() 
     </script>";
}

?>
</body>
</html>