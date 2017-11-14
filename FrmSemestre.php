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
include_once('clsMateria.php');
include_once('clsCarrera.php');
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
    function abreBuscarMaterias(){ 
        miPopup = window.open("buscarMaterias.php","miwin","width=410,height=350,scrollbars=yes")
         miPopup.focus() 
    } 

    </script>


</head>
<body>
<?php 
    include_once('clsCarrera.php');
    include_once('clsMateria.php');
    include_once('clsSemestre.php');
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
                <h2>ASIGNACION DE CARRERAS Y MATERIAS SEMESTRALES</h2>
            </div>
        </section>

        <section id="blog">

            <div class="contenedor">
                <article>
                    <form name="carrera" action="frmSemestre.php" method="POST">
                        <table  align="center">
                            <tr>
                                <td><label for="sem">Semestre: </label></td>
                                <td><input type="text" name="sem" id="sem" value="<?php echo $_GET['x_semestre'];?>"></td>
                            </tr>

                            <tr>
                              <td width="80">Materia: </td>
                              <td width="225">                
                                <input name="txtNombreMat" type="text" value="<?php  if ($_GET['x_nmateria']) echo $_GET['x_nmateria']; 
                                else  
                                    echo $_SESSION["nombre_mat"]; ?>" id="txtNombreMat" />

                                <a href="#" onClick="abreBuscarMaterias()">Buscar</a> 

                                <input name="txtsigla" type="hidden" size="3" value="<?php 
                                        if ($_GET['x_sigla']) 
                                            echo $_GET['x_sigla']; 
                                        else 
                                            echo $_SESSION["id_sigla"]; ?>" 
                                id="txtsigla" />
                             </td>
                            </tr>

                            <tr>
                              <td width="80">Carrera: </td>
                              <td width="325">               
                                <?php     
                                $obj=new Carrera();
                                $reg=$obj->Buscar();
                             
                                    echo "<select name='cboIdCarrera' id='' value='$cod_carrera'/>";
                                while ($fila=mysqli_fetch_array($reg))
                                {
                                ?>
                                <option 
                                <?php  if($_GET['x_carrera']==$fila['nombre_c']) 
                                    echo "selected";  else ?>  
                                    value="<?php  echo $fila['cod_carrera']; ?>">
                                <?php  echo $fila['nombre_c'];  
                                echo "</option>";       
                              }
                              echo "</select>"; 
                              ?>
                             </td>
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
                                    <input type="radio" name="grupo" value="1" <?php if (($_POST['grupo'])=='1') echo "checked";?>> Semestre |
                                    <input type="radio" name="grupo" value="2" checked > Carrera  | 
                                    <input type="radio" name="grupo" value="3" <?php if (($_POST['grupo'])=='3') echo "checked";?>> Materia
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

    if ($_POST['sem']) 
    {
        $new = new CarreraMateria();
        $new->setSemestre($_POST['sem']);
        $new->setSigla($_POST['txtsigla']);
        $new->setCodCarrera($_POST['cboIdCarrera']);
        if ($new->Guardar()) 
            echo "Se registro exitosamente  los datos";
        
        else
            echo "Error al registrar";

    }
    else
        echo "Es obligatorio el Registro";
}

function Eliminar()
{
    if ($_POST['txtsigla']) 
    {

        $sem=new CarreraMateria();
        $sem->setSigla($_POST['txtsigla']);
        $sem->setCodCarrera($_POST['cboIdCarrera']);
        if ($sem->eliminar())
            echo "¡Se eliminaron los registros correctamente!";
        else
            echo "Error al Eliminar";

        echo "--".$sem->getSigla();
        echo "--".$sem->getCodCarrera()."--";
    }
    else
        echo "Se Necesita obligatoriamente un numero de Codigo";
}

function Modificar()
{
    if ($_POST['sem'])
     {
        $mod=new Carrera();
        $mod->setCod_carrera($_POST['sem']);
        $mod->setNombre($_POST['nomCarr']);
        if ($mod->Modificar()) 
            echo "Se modifico correctamente!";
        }
        else
            echo "Error, no se modificaron los Codigo";
    }


function Buscar(){
    $sem= new CarreraMateria();

    switch ($_POST['grupo']) {
        case '1':
            $res=$sem->buscarxsemestre($_POST['txtbuscar']);
            mostrar($res); 
            break;

        case '2':
            $res=$sem->buscarxcarrera($_POST['txtbuscar']);
            mostrar($res);
            break;

        case '3':
            $res=$sem->buscarxmateria($_POST['txtbuscar']);
            mostrar($res);
            break;

        default;
            $todo=$sem->buscar();
            break;
        
        /*default:
            
            break;*/
    }

}

function mostrar($cod_carrera){
    echo "<table align='center'>";
    echo "<tr>  
                <td>Carrera</td>
                <td>Materia</td>
                <td>Semestre</td>
                <td><center>*</center></td>
          </tr>";
    while($fila=mysqli_fetch_object($cod_carrera))
    {
        echo "<tr>";

        echo        "<td>$fila->nombre_c</td>";
        echo        "<td>$fila->nombre_m</td>";
        echo        "<td>$fila->semestre</td>";
        

        echo        "<td><a href='FrmSemestre.php?x_carrera=$fila->nombre_c&x_codCarr=$fila->cod_carrera&x_sigla=$fila->sigla&x_nmateria=$fila->nombre_m&x_semestre=$fila->semestre'>[Editar] </a></td>";
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