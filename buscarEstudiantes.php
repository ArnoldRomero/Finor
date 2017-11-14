<?php 
ob_start();
session_start();
include_once('clsEstudiante.php');
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
<center><form id="form1" method="post" action="buscarEstudiantes.php">
<fieldset id="form">
<legend>BUSQUEDA DE ESTUDIANTES</legend>
<table width="342" border="0">
	<tr>
		<td>
		<label>Nro Registro o Nombre: </label>
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
		 <?php      
			

		    if ($_POST['botones']=='Buscar') {

		    	$listax=new Estudiante();
		    	$registros=$listax->Buscarxregnom($_POST['txtBuscar']);
		    	mostrar($registros);
		    }

		    else{
		    	$todos=new Estudiante();
				$registros=$todos->Buscar();
		    		mostrar($registros);
		    }
		  	  		

		  	  	function mostrar($registros)
		  	  	{							  
					echo "<table border='1' align='center'>";
					echo "<tr bgcolor='black' align='center'>

					<td><font color='white'>Nro Registro</font></td>
				   <td><font color='white'> Nombre</font></td>
				   <td><font color='white'> Apellido</font></td>
				   <td><font color='white'>*</font></td></tr>";
					while($f=mysqli_fetch_object($registros))
					{
						echo "<tr>";
						echo "<td>$f->reg_estudiante</td>";
						echo "<td>$f->nombres</td>";
						echo "<td>$f->paterno</td>";

						echo "<td><a href='buscarEstudiantes.php? x_registro=$f->reg_estudiante&x_nombre=$f->nombres&x_paterno=$f->paterno'> << </a> </td>";
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
<?php 
if($_GET["x_registro"])
{
 $_SESSION["s_registro"]=$_GET["x_registro"];
 $_SESSION["s_nombre"]=$_GET["x_nombre"];
 $_SESSION["s_paterno"]=$_GET["x_paterno"];

echo "<script> 
     opener.document.location.reload() 
     window.close() 
     </script>";
}

?>
</body>
</html>