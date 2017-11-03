<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>

	<title>Registro|Docente</title>

	<link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/formularios.css">
</head>
<body>
<?
	include_once('clsDocente.php');
    $criterio=$_POST['txtbuscar'];
?>

    <header>
        <div class="contenedor">
            <h1><strong>FINOR</strong> | <i>Docente</i></h1>
            
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
                <h2>REGISTRO DE NUEVOS DOCENTES</h2>
            </div>
        </section>

        <section id="blog">

            <div class="contenedor">
                <article>
                	<form name="docente" action="frmDocente.php" method="POST">
                		<table  align="center">
                			<tr>
                				<td><label for="regDoc">Registro</label></td>
                				<td><input type="text" name="regDoc" id="regDoc" value="<?echo $_GET['x_reg'];?>"></td>
                			</tr>
                			<tr>
                				<td><label for="nomDoc">Nombre</label></td>
                				<td><input type="text" name="nomDoc" id="nomDoc" value="<?echo $_GET['x_nombres'];?>"></td>
                			</tr>
                			<tr>
                				<td><label for="patDoc">Apellido Paterno</label></td>
                				<td><input type="text" name="patDoc" id="patDoc" value="<?echo $_GET['x_paterno'];?>"></td>
                			</tr>
                			<tr>
                				<td><label for="matDoc">Apellido Materno</label></td>
                				<td><input type="text" name="matDoc" id="matDoc" value="<?echo $_GET['x_materno'];?>"></td>
                			</tr>
                			<tr>
                				<td><label for="telDoc">Telefono</label></td>
                				<td><input type="text" name="telDoc" id="telDoc" value="<?echo $_GET['x_telefono'];?>"></td>
                			</tr>


                			<tr>
                                 <td colspan="2">
                				 <input type="submit" name="botones" value="Nuevo">
                				 <input type="submit" name="botones" value="Guardar">
                                 <input type="submit" name="botones" value="Modificar">
                                 <input type="submit" name="botones" value="Eliminar">
                                 <input type="submit" name="botones" value="Buscar">
                			</tr>
                            <tr>
                                <td colspan="2">
                                    <label>Busqueda por: </label>
                                    <input type="radio" name="grupo" value="1" checked >Registro |
                                    <input type="radio" name="grupo" value="2" <?if (($_POST['grupo'])=='2') echo "checked";?> >Nombre y Apellido
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
            <?

function Guardar()
{
    if ($_POST['regDoc']) {
        $new = new Docente;
        $new->setRegDocente($_POST['regDoc']);
        $new->setNombre($_POST['nomDoc']);
        $new->setPaterno($_POST['patDoc']);
        $new->setMaterno($_POST['matDoc']);
        $new->setTelefono($_POST['telDoc']);

        if ($new->Guardar()) {
            echo "Se registro exitosamente al nuevo Docente";
        }
        else
            echo "Error al registrar";
    }
    else
        echo "Es obligatorio el Registro";
}
function Eliminar(){
    if ($_POST['regDoc']) {

        $stu=new Docente();

        $stu->setRegDocente($_POST['regDoc']);
        if ($stu->Eliminar())
            echo "¡Se eliminaron los registros correctamente!";
        else
            echo "Error al Eliminar";
    }
    else
        echo "Se Necesita obligatoriamente un numero de Registro";
}

function Modificar(){
    if ($_POST['regDoc']) {
        $mod=new Docente();

        $mod->setRegDocente($_POST['regDoc']);
        $mod->setNombre($_POST['nomDoc']);
        $mod->setPaterno($_POST['patDoc']);
        $mod->setMaterno($_POST['matDoc']);
        $mod->setTelefono($_POST['telDoc']);

        if ($mod->Modificar()) {
            echo "Se modifico corectamente!";
        }
        else
            echo "Error, no se modificaron los registros";
    }
}

function Buscar(){
    $per= new Docente();

    switch ($_POST['grupo']) {
        case '1':
            $registros=$per->BuscarPorRegistro($_POST['txtbuscar']);
            mostrarRegistros($registros); 
            break;

        case '2':
            $registros=$per->BuscarPorNombreApellido($_POST['txtbuscar']);
            mostrarRegistros($registros);
            break;
        
        
            

    }

}

function mostrarRegistros($registros){
    echo "<table align='center'>";
    echo "<tr>  
                <td>Nro Registro</td>
                <td>Nombres</td>
                <td>Apellido Paterno</td>
                <td>Apellido Materno</td>
                <td>Telefono</td>
                <td><center>*</center></td>
          </tr>";
    while($fila=mysqli_fetch_object($registros))
    {
        echo "<tr>";

        echo        "<td>$fila->reg_docente</td>";
        echo        "<td>$fila->nombres_d</td>";
        echo        "<td>$fila->paterno_d</td>";
        echo        "<td>$fila->materno_d</td>";
        echo        "<td>$fila->telefono</td>";

        echo        "<td><a href='frmDocente.php?x_reg=$fila->reg_docente&x_nombres=$fila->nombres_d&x_paterno=$fila->paterno_d&x_materno=$fila->materno_d&x_telefono=$fila->telefono'> [Editar] </a></td>";
        echo "</tr>";
    }
    echo "</table>";
}


switch ($_POST['botones']) {
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
        </section>

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