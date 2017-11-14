<?php
session_start();

if (isset($_SESSION['s_usuario'])) {
    $user=$_SESSION['s_usuario'];
}
else
    header("location: login.php");
    
?>


<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.7, user-scalable=no"/>

	<title>Registro|Carrera</title>

	<link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/formularios.css">
</head>
<body>
<?php 
	include_once('clsCarrera.php');
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

    <main>

        <section id="bienvenidos">
            <div class="contenedor">
                <h2>REGISTRO DE CARRERAS</h2>
            </div>
        </section>

        <section id="blog">

            <div class="contenedor">
                <article>
                	<form name="carrera" action="frmCarrera.php" method="POST">
                		<table  align="center">
                			<tr>
                				<td><label for="codCarr">Codigo de Carrera</label></td>
                				<td><input type="text" name="codCarr" id="codCarr" value="<?php echo $_GET['x_codCarr'];?>"></td>
                			</tr>
                			<tr>
                				<td><label for="nomCarr">Carrera</label></td>
                				<td><input type="text" name="nomCarr" id="nomCarr" value="<?php echo $_GET['x_nombre'];?>"></td>
                			</tr>
                		

                            <tr>
                                 <td colspan="2">
                                    <input type="submit" name="botones" value="Nuevo" />
                                    <input type="submit" name="botones" value="Guardar" />
                                    <input type="submit" name="botones" value="Modificar" />
                                    <input type="submit" name="botones" value="Eliminar" />
                                    <input type="submit" name="botones" value="Buscar" />
                                 </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <label>Busqueda por: </label>
                                    <input type="radio" name="grupo" value="1" checked > Codigo  |
                                    <input type="radio" name="grupo" value="2" <?php if (($_POST['grupo'])=='2') echo "checked";?>> Nombre de Carrera
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <input type="text" name="txtbuscar" size="45">                                    
                                </td>
                            </tr>

                		</table>
                	</form>
                 
                </article>
                
            </div>
        </section>

       
<?php 

function Guardar()
{

	if ($_POST['codCarr']) 
    {
		$new = new Carrera();
		$new->setCod_carrera($_POST['codCarr']);
		$new->setNombre($_POST['nomCarr']);
		if ($new->Guardar()) 
			echo "Se registro exitosamente  la carrera";
		
		else
			echo "Error al registrar";
	}
	else
		echo "Es obligatorio el Registro";
}

function Eliminar()
{
    if ($_POST['codCarr']) 
    {

        $stu=new Carrera();
        $stu->setCod_carrera($_POST['codCarr']);
        if ($stu->Eliminar())
            echo "¡Se eliminaron los Codigo correctamente!";
        else
            echo "Error al Eliminar";
    }
    else
        echo "Se Necesita obligatoriamente un numero de Codigo";
}

function Modificar()
{
    if ($_POST['codCarr'])
     {
        $mod=new Carrera();
        $mod->setCod_carrera($_POST['codCarr']);
        $mod->setNombre($_POST['nomCarr']);
        if ($mod->Modificar()) 
            echo "Se modifico correctamente!";
        }
        else
            echo "Error, no se modificaron los Codigo";
    }


function Buscar(){
    $per= new Carrera();

    switch ($_POST[grupo]) {
        case '1':
            $cod_carrera=$per->BuscarPorCodigo($_POST['txtbuscar']);
            mostrarCod_carrera($cod_carrera); 
            break;

        case '2':
            $cod_carrera=$per->BuscarPorNombre($_POST['txtbuscar']);
            mostrarCod_carrera($cod_carrera);
            break;
        
    }

}

function mostrarCod_carrera($cod_carrera){
    echo "<table align='center'>";
    echo "<tr>  
                <td>Codigo Carrera</td>
                <td>Nombre</td>
                <td><center>*</center></td>
          </tr>";
    while($fila=mysqli_fetch_object($cod_carrera))
    {
        echo "<tr>";

        echo        "<td>$fila->cod_carrera</td>";
        echo        "<td>$fila->nombre_c</td>";
        

        echo        "<td><a href='frmCarrera.php?x_codCarr=$fila->cod_carrera&x_nombre=$fila->nombre_c' >[Editar] </a></td>";
        echo "</tr>";
    }
    echo "</table>";
}


switch ($_POST['botones']) {

    case 'Nuevo':
        # code...
        break;
    case 'Guardar':
        Guardar();
       break;

    case 'Modificar':
        Modificar();
       break;

    case 'Eliminar':
        Eliminar();
       break;

    case 'Buscar':
         Buscar();
        break;
    
}
?>

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