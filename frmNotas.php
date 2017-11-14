 <?php
session_start();

if (isset($_SESSION['s_usuario'])) {
    $user=$_SESSION['s_usuario'];
    echo "<a href='logOut.php'>CERRAR SESSION</a>";
}
else
    header("location: login.php");
    
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.6, user-scalable=no"/>

	<title>Registro|Notas</title>

	<link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/formularios.css">
</head>
<body>
<?php 
	include_once('clsGrupoEstudiante.php');

?>

    <header>
        <div class="contenedor">
            <h1><strong>FINOR</strong> | <i>Registros</i></h1>
            
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
                <a href="panel.php" class="icon-inicio">Principal</a>
                <a href="frmRegistrarse.php" >Inscripcion</a>
                <a href="registros.php" >Registros</a>
                <a href="consultas.php" >Consultas</a>
                <a href="logout.php">Cerrar Sesion</a>
            </nav>
        </div>
    </header>

    <main style="margin-top: 50px;">

        <section id="blog">

            <div class="contenedor">
                <article>
                	<form name="estudiante" action="frmNotas.php" method="POST">
                		<fieldset id="form">
							<legend>ASIGNACION DE NOTAS </legend>
                		<table  align="center" border="0">
                			<tr>
                				<td><label for="regEst">Nro Registro</label></td>
                				<td><input type="text" size="30" name="regEst" id="regEst" value="<?php echo $_GET['x_reg'];?>"></td>
                			</tr>
                			<tr>
                				<td><label for="nomEst">Nombre y apellido</label></td>
                				<td><input type="text" size="30"  name="nomEst" id="nomEst" value="<?php echo $_GET['x_nombres']." ".$_GET['x_paterno'];?>"></td>
                			</tr>
                			<tr>
                				<td><label for="txtgrupo">Grupo</label></td>
                				<td><input type="text" size="30"  name="txtgrupo" id="txtgrupo" value="<?php echo $_GET['x_grupo'];?>"></td>
                			</tr>
                			<tr>
                				<td><label for="txtgrupo">Materia</label></td>
                				<td><input type="text" size="30"  name="txtmateria" id="txtgrupo" value="<?php echo $_GET['x_materia'];?>"></td>
                			</tr>
                			<tr>
                				<td><label for="txtnota">Nota</label></td>
                				<td><input type="text"  size="30" name="txtnota" id="txtnota" value=""></td>
                			</tr>
                	


                			<tr>
                				 <td colspan="2" align="center">
                                    
                				    <input type="submit" name="botones" style="padding-right:100px; padding-left:100px;" value="Guardar">

                			     </td>
                            </tr>
                         </table>
                         <table align="center" border="0" id="busc">
                            <tr>
                                <td >Docente:</td>
                                <td>
                                	<input type="text"  name="txtnombred" size="45" value="<?php 
                                	if($_SESSION['s_usuario'])
                                		echo $_SESSION['s_usuario'];
                                	else
                                	 echo $_POST['txtnombred']?>">
                                </td>
                            </tr>
                            <tr>
                            	<td >Materia:</td>
                                <td>
                                	<input type="text" name="txtmateria" size="45" value="<?php if($_POST['txtmateria']) echo $_POST['txtmateria'];?>">
                                </td>
                            </tr>
                            <tr>
                            	 <td >Grupo:</td>
                                <td>
                                	<input type="text" name="txtgrupob" size="45" value="<?php if($_POST['txtgrupob']) echo $_POST['txtgrupob'];?>">
                                </td>
                            </tr>
                            <tr>
                            	<td colspan="2" align="center">
                            		<input type="submit" name="botones" value="Buscar" style="padding-right:100px; padding-left:100px;">
                            	</td>

                		</table>

                	</form>
                 
                </article>
                
            </div>
<?php 

function Guardar()
{
    if ($_POST['regEst']) {
        $new = new GrupoEstudiante();
        $new->setRegEstudiante($_POST['regEst']);
        $new->setNroGrupo($_POST['txtgrupo']);
        $new->setNota($_POST['txtnota']);
       
        if ($new->GuardarNota()) {
            echo "Se registro correctamente la nota del estudiante";

        }
        else
            echo "Error al registrar";
    }
    else
        echo "Es obligatorio el Registro de estudiante!!!";
}



function Buscar(){
    $per= new GrupoEstudiante();
    $result=$per->buscarxtres($_POST['txtnombred'],$_POST['txtmateria'],$_POST['txtgrupob']);
    mostrarRegistros($result);

}

function mostrarRegistros($registros){
    echo "<table align='center'>";
    echo "<tr>  
                <td>Grupo</td>
                <td>Nombres</td>
                <td>Apellido </td>
                <td>Materia</td>;
                <td>Nota</td>
                <td><center>*</center></td>
          </tr>";
    while($fila=mysqli_fetch_object($registros))
    {
        echo "<tr>";

        echo        "<td>$fila->nro_grupo</td>";
        echo        "<td>$fila->nombres</td>";
        echo        "<td>$fila->paterno</td>";
        echo        "<td>$fila->nombre_m</td>";
        echo        "<td>$fila->nota</td>";

        echo        "<td><a href='frmNotas.php?x_reg=$fila->reg_estudiante&x_nombres=$fila->nombres&x_paterno=$fila->paterno&x_grupo=$fila->nro_grupo&x_materia=$fila->nombre_m'> [Editar] </a></td>";
        echo "</tr>";
    }
    echo "</table>";
}


switch ($_POST['botones']) {
    case 'Guardar':
        Guardar();
       break;

    case 'Buscar':
         Buscar();
        break;
    
}
?>
        </section>

    </main>

    <footer>
        <div class="contenedor">
            <p class="copy">Facultad Integral del Norte &copy; 2017</p>
            <div class="sociales">
                <a class="icon-telefono" href="ubicacion.html"></a>
                <a class="icon-facebook" href="https://www.facebook.com/rrppfinor.uagrm/#"></a>
                <a class="icon-whatsapp" href="ubicacion.html"></a>
                <a class="icon-mapa" href="https://goo.gl/maps/365BfNbAwAG2"></a>
            </div>
        </div>
    </footer>
</body>
</html>