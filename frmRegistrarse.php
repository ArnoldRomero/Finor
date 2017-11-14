<?php 
ob_start();
session_start();

if (isset($_SESSION['s_usuario'])) {
    $user=$_SESSION['s_usuario'];
}
else
    header("location: login.php");

?>
<?php 
include_once('clsGrupo.php');
include_once('clsEstudiante.php');
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.6, user-scalable=no"/>

    <title>Registro|Carrera</title>

    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/formularios.css">

    <script> 

    var miPopup 
    function abreBuscarEstudiante(){ 
        miPopup = window.open("buscarEstudiantes.php","miwin","width=410,height=350,scrollbars=yes")
         miPopup.focus() 
    } 
    var miPopup2 
    function abreBuscarGrupos(){ 
        miPopup2 = window.open("buscarGrupos.php","miwin","width=510,height=350,scrollbars=yes")
         miPopup.focus() 
    } 

    </script>
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

    <main style="margin-top: 100px;>

        <section id="bienvenidos">
            <div class="contenedor">
                <h2>REGISTRAR ESTUIANTE A GRUPO</h2>
            </div>
        </section>

        <section id="blog">

            <div class="contenedor">
                <article>
                    <form name="registro" action="frmRegistrarse.php" method="POST">
                        <table  align="center" >
                            <tr>
                                <td width="150">
                                    <label for="txtRegEst">Nro Registro de Estudiante: </label></td>
                                <td>
                                    <input type="text" name="txtRegEst" id="txtRegEst" value="<?php  if ($_GET['x_regest']) echo $_GET['x_regest']; 
                                else  
                                    echo $_SESSION["s_registro"]; ?>">
                                    <a href="#" onClick="abreBuscarEstudiante()">Buscar</a>
                                </td>

                            </tr>

                            <tr>
                                <td><label for="txtNombreEst">Nombre y Apellido: </label></td>
                                <td><input type="text" size="50" name="txtNombreEst" id="txtNombreEst" value="<?php  if ($_GET['x_nombre']) echo $_GET['x_nombre']." ".$_GET['x_apellido'];
                                else  
                                    echo $_SESSION['s_nombre']." ".$_SESSION['s_paterno']; ?>"></td>
                            </tr>


                            <tr>
                              <td width="80">Grupo: </td>
                              <td width="225">                
                                <input name="txtNroGrupo" type="text" value="<?php  if ($_GET['x_nrogrupo']) echo $_GET['x_nrogrupo'];  
                                else  
                                    echo $_SESSION["s_nrogrupo"]; ?>" id="" />

                                <a href="#" onClick="abreBuscarGrupos()">Buscar</a> 

                            
                             </td>
                            </tr>

                            <tr> 
                              <td colspan="2" align="center">---Detalles--- </td>
                            </tr>
                            <tr> 
                              <td colspan="2">
                                  <label>Carrera: </label>
                                    <b><?php if($_GET['x_carrera'])
                                        echo $_GET['x_carrera'];
                                    else
                                        echo $_SESSION['s_carrera']; ?><br></b>
                                  <label>Semestre: </label>
                                    <b><?php if($_GET['x_semestre'])
                                        echo $_GET['x_semestre'];
                                    else
                                        echo $_SESSION['s_semestre']; ?><br></b>
                                  <label>Materia: </label>
                                    <b><?php if($_GET['x_nombremateria'])
                                        echo $_GET['x_nombremateria'];
                                    else
                                        echo $_SESSION['s_materia']; ?><br></b>
                                  <label>Docente: </label>
                                    <b><?php if($_GET['x_nombred'])
                                        echo $_GET['x_nombred']." ".$_GET['x_paternod'];
                                    else
                                        echo $_SESSION['s_docente']." ".$_SESSION['s_paternod']; ?><br></b>
                                  <label>Inicio de Actividades: </label>
                                    <b><?php if($_GET['x_fini'])
                                        echo $_GET['x_fini'];
                                    else
                                        echo $_SESSION['s_inicio']; ?><br></b>
                                  <label>Fin de Actividades: </label> 
                                    <b><?php if($_GET['x_ffin'])
                                        echo $_GET['x_ffin'];
                                    else
                                        echo $_SESSION['s_final']; ?><br></b>  
                              </td>
                            </tr>

                            <tr>
                                 <td colspan="2" align="center">
                                    <input type="submit" name="botones" value="Nuevo" />
                                    <input type="submit" name="botones" value="Guardar" />
                                    <input type="submit" name="botones" value="Eliminar" />
                                    <input type="submit" name="botones" value="Buscar" />
                                 </td>
                            </tr>

                            <tr>
                                <td  align="left">
                                    <label>Busqueda por: </label>
                                </td>
                                <td align="center">
                                    <input type="radio" name="grupo" value="1" checked > Estudiante |
                                    <input type="radio" name="grupo" value="2" <?php if (($_POST['grupo'])=='1') echo "checked";?>> Grupo  
                                    
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" align="center">
                                    <input type="text" name="txtbuscar" size="50">                                    
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

    if ($_POST['txtRegEst'] and $_POST['txtNroGrupo']) 
    {
        $new = new GrupoEstudiante();

        $new->setRegEstudiante($_POST['txtRegEst']);
        $new->setNroGrupo($_POST['txtNroGrupo']);

        if ($new->guardar()) 
            echo "Se registro exitosamente los datos";
        
        else
            echo "Error al registrar";

    }
    else
        echo "Es obligatorio el Registro y numero de Grupo";
}

function Eliminar()
{
    if ($_POST['txtRegEst'] and $_POST['txtNroGrupo']) 
    {

        $elim=new GrupoEstudiante();

        $elim->setRegEstudiante($_POST['txtRegEst']);
        $elim->setNroGrupo($_POST['txtNroGrupo']);

        if ($elim->eliminar())
            echo "¡Se eliminaron los registros correctamente!";
        else
            echo "Error al Eliminar";

    }
    else
        echo "Se Necesita obligatoriamente un numero de Codigo";
}


function Buscar(){
    $search= new GrupoEstudiante();

    switch ($_POST['grupo']) {
        case '1':
            $resultados=$search->buscarxestudiante($_POST['txtbuscar']);
            mostrar($resultados); 
            break;

        case '2':
            $resultados=$search->buscarxgrupo($_POST['txtbuscar']);
            mostrar($resultados);
            break;

    }
}

function mostrar($resultados){
    echo "<table align='center'>";
    echo "<tr>  
                <td>Grupo</td>
                <td>Estudiante</td>
                <td>Carrera</td>
                <td>Semestre</td>
                <td>Materia</td>
                <td>Docente</td>
                <td><center>*</center></td>
          </tr>";
        while($fila=mysqli_fetch_object($resultados))
        {
        echo "<tr>";

        echo        "<td>$fila->nro_grupo</td>";
        echo        "<td>$fila->nombres</td>";
        echo        "<td>$fila->nombre_c</td>";
        echo        "<td>$fila->semestre</td>";
        echo        "<td>$fila->nombre_m</td>";
        echo        "<td>$fila->nombres_d</td>";
        

        echo        "<td><a href='frmRegistrarse.php?
        x_regest=$fila->reg_estudiante&
        x_nombre=$fila->nombres&
        x_apellido=$fila->paterno&  
        x_nrogrupo=$fila->nro_grupo&
        x_carrera=$fila->nombre_c&
        x_semestre=$fila->semestre&
        x_nombremateria=$fila->nombre_m&
        x_fini=$fila->fecha_inicio&
        x_ffin=$fila->fecha_final&
        x_nombred=$fila->nombres_d&
        x_paternod=$fila->paterno_d

        ' >[Editar] </a></td>";
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