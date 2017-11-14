<?php
ob_start();
session_start();
include_once('clsDocente.php');
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
<center><form id="form1" method="post" action="buscarDocentes.php">
<fieldset id="form">
<legend>BUSQUEDA DE DOCENTES</legend>
<table width="342" border="0">
	<tr>
		<td>
		<label>Nombre Docente: </label>
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

		    	$listax=new Docente();
		    	$registros=$listax->BuscarPorNombreApellido($_POST['txtBuscar']);
		    	mostrar($registros);
		    }

		    else{
		    	$todos=new Docente();
				$registros=$todos->Buscar();
		    		mostrar($registros);
		    }
		  	  		

		  	  	function mostrar($registros)
		  	  	{							  
					echo "<table border='1' align='center'>";
					echo "<tr bgcolor='black' align='center'>
					<td><font color='white'>Codigo</font></td>
				   <td><font color='white'> Nombres</font></td>
				   <td><font color='white'> Apellido Paterno </font></td>
				   <td><font color='white'>*</font></td></tr>";
					while($f=mysqli_fetch_object($registros))
					{
						echo "<tr >";
						echo "<td>$f->reg_docente</td>";
						echo "<td>$f->nombres_d</td>";
						echo "<td>$f->paterno_d</td>";

						echo "<td><a href='buscarDocentes.php? b_regdoc=$f->reg_docente&b_nondoc=$f->nombres_d'> >> </a> </td>";
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
if($_GET["b_regdoc"])
{
 $_SESSION["s_nombred"]=$_GET["b_nondoc"];
 $_SESSION["s_idoc"]=$_GET["b_regdoc"];

echo "<script> 
     opener.document.location.reload() 
     window.close() 
     </script>";
}

?>
</body>
</html>