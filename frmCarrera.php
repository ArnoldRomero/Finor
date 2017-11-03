<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>

	<title>Registro|Carrera</title>

	<link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/formularios.css">
</head>
<body>
<?
	include_once('clsCarrera.php');
?>

    <header>
        <div class="contenedor">
            <h1><strong>FINOR</strong> | <i>Registros</i></h1>
            
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
                <a href="index.html" class="icon-inicio">Inicio</a>
                <a href="frmEstudiante.php" >Estudiantes</a>
                <a href="frmDocente.php" >Docentes</a>
                <a href="frmCarrera.php" >Carreras</a>
                <a href="frmMateria.php" >Materias</a>
            </nav>
        </div>
    </header>

    <main>
        <section id="banner">
            <img src="images/infra.jpg">
            <div class="contenedor">
                <h2>FACULTAD INTEGRAL DEL NORTE</h2>
                <p>
                Formando profesionales competentes, emprendedores e idoneos</p>
                <a id="linktohome" href="index.html">Inicio</a>
            </div>
        </section>

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
                				<td><input type="text" name="codCarr" id="codCarr" value="<?echo $_GET['x_codCarr'];?>"></td>
                			</tr>
                			<tr>
                				<td><label for="nomCarr">Carrera</label></td>
                				<td><input type="text" name="nomCarr" id="nomCarr" value="<?echo $_GET['x_nombre'];?>"></td>
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
                                    <input type="radio" name="grupo" value="2" <?if (($_POST['grupo'])=='2') echo "checked";?>> Nombre de Carrera
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

       
<?

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
 <section id="info">
            <h3>Informacion que te interesaría</h3>
               <div class="contenedor">
               <div class="info-uni">
                   <a href="historia.html"><img src="images/historia.jpg" alt="">
                    </a>
                    <h4>Historia</h4>
                </div>
                <div class="info-uni">
                    <a href="infraestructura.html"><img src="images/infra5.jpg" alt=""></a>
                    <h4>Infraestructura</h4>
                </div>
                <div class="info-uni">
                    <a href="becas.html"><img src="images/becas.jpg" alt=""></a>
                    <h4>Becas</h4>
                </div>
                <div class="info-uni">
                    <a href="convenios.html"><img src="images/convenios.png" alt="convenios"></a>
                    <h4>Convenios</h4>
                </div>
                </div>
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