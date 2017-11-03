<?
ob_start();
session_start();
?>
<?
include_once('clsSemestre.php');
include_once('clsDocente.php');
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>

    <title>Registro|Carrera</title>

    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/formularios.css">

    <script> 

    var miPopup 
    function abreBuscarSemestre(){ 
        miPopup = window.open("buscarSemestres.php","miwin","width=410,height=350,scrollbars=yes")
         miPopup.focus() 
    }

    var miPopup2
    function abreBuscarDocentes(){
        miPopup = window.open("buscarDocentes.php","miwin","width=410,height=350,scrollbars=yes")
         miPopup.focus() 
    }

    </script>


</head>
<body>
<?
    include_once('clsSemestre.php');
    include_once('clsGrupo.php');
    include_once('clsDocente.php')
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

    <main style="margin-top: 100px;">

        <section id="bienvenidos" ">
            <div class="contenedor">
                <h2>ASIGNACION DE GRUPOS DE ESTUDIO</h2>
            </div>
        </section>

        <section id="blog">

            <div class="contenedor">
                <article>
                    <form name="carrera" action="frmGrupo.php" method="POST">
                        <table  align="center" >

<!-- --------------------------- DATOS SEMESTRE ----------------------------------- -->
                            <tr>
                                <td colspan="2"><input type="hidden" name="txtidgrupo" value="<?
                                if($_GET['x_ngrupo'])
                                    echo $_GET['x_ngrupo'];
                                else
                                    echo $_POST['txtidgrupo'];?>" ></td>
                            </tr>

                            <tr>
                              <td width="80">Carrera: </td>

                                <td width="225">   

                                    <input name="txtcarrera" type="text" value="<? 
                                    if ($_GET['x_nombrec']) 
                                        echo $_GET['x_nombrec']; 
                                    elseif ($_SESSION["s_nombrec"])
                                        echo $_SESSION["s_nombrec"];
                                    else
                                        echo $_POST['txtcarrera'];?>" id="txtidcarrera" />

                                    

                                    <input name="txtidcarrera" type="hidden" size="3" value="<?
                                    if ($_GET['x_idcar']) 
                                        echo $_GET['x_idcar']; 
                                    elseif ($_SESSION["s_idcar"])
                                        echo $_SESSION["s_idcar"];
                                    else
                                        echo $_POST['txtidcarrera'];?>" id="txtidcarrera" />
                                </td>
                                
                            </tr>

                            <tr>
                              <td width="80">Materia : </td>

                                <td width="225">                
                                    <input name="txtmateria" type="text" value="<?
                                    if ($_GET['x_nombrem']) 
                                        echo $_GET['x_nombrem']; 
                                    elseif ($_SESSION["s_nombrem"])
                                        echo $_SESSION["s_nombrem"];
                                    else
                                        echo $_POST['txtmateria'];?>" id="txtmateria" />
                                <a href="#" onClick="abreBuscarSemestre()">Buscar</a> 
                                <input name="txtidmateria" type="hidden" size="3" value="<?
                                    if ($_GET['x_idmat']) 
                                        echo $_GET['x_idmat']; 
                                    elseif ($_SESSION["s_idmat"])
                                        echo $_SESSION["s_idmat"];
                                    else
                                        echo $_POST['txtidmateria'];?>" id="txtidmateria" />
                                </td>
                                
                            </tr>

<!------------------------------------------------------------------------------- -->
                            <tr>
                                <td><label for="txtFecha1"></label>Fecha de Inicio: </td>
                                <td><input name="txtFecha1" type="date" maxlength="8" size="8" value="<?
                                if($_GET['x_fechai'])
                                    echo $_GET['x_fechai'];
                                else
                                    echo $_POST['txtFecha1'];?>" id="txtFecha1" /></td>
                            </tr>

                            <tr>
                                <td><label for="txtFecha2"></label>Fecha Finalizacion: </td>
                                <td><input name="txtFecha2" type="date" maxlength="8" size="8" value="<?
                                if($_GET['x_fechaf'])
                                    echo $_GET['x_fechaf'];
                                else
                                    echo $_POST['txtFecha2'];?>" id="txtFecha2" /></td>
                            </tr>

                            <tr>
                                <td><label for="txtaño"></label>Gestion: </td>
                                <td><input name="txtaño" type="text" value="<?
                                if($_GET['x_gestion'])
                                    echo $_GET['x_gestion'];
                                else
                                    echo $_POST['txtaño'];?>" id="txtaño" /></td>
                            </tr>

<!-- --------------------------- TXT DOCENTE ----------------------------------- -->
                            <tr>
                              <td width="80">Docente: </td>
                              <td width="225">                
                                <input name="txtdoc" type="text" value="<?
                                    if ($_GET['x_nombred']) 
                                        echo $_GET['x_nombred']; 
                                    elseif ($_SESSION["s_nombred"])
                                        echo $_SESSION["s_nombred"];
                                    else
                                        echo $_POST['txtdoc'];?>" id="txtdoc" />

                                <a href="#" onClick="abreBuscarDocentes()">Buscar</a> 

                                <input name="txtregdoc" type="hidden" size="3" value="<?
                                    if ($_GET['x_idoc']) 
                                        echo $_GET['x_idoc']; 
                                    elseif ($_SESSION["s_idoc"])
                                        echo $_SESSION["s_idoc"];
                                    else
                                        echo $_POST['txtregdoc'];?>" 
                                id="txtregdoc"/>
                             </td>
<!------------------------------------------------------------------------------- -->
                            </tr>

                            <tr>
                                 <td colspan="2">
                                    <input type="submit" name="botones" value="Nuevo"/>
                                    <input type="submit" name="botones" value="Guardar" />
                                    <input type="submit" name="botones" value="Modificar" />
                                    <input type="submit" name="botones" value="Eliminar" />
                                    <input type="submit" name="botones" value="Buscar" />
                                 </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <label>Busqueda por: </label>
                                    <input type="radio" name="grupo" value="1" <?php if (($_POST['grupo'])=='1') echo "checked";?> onclick="mostrar();" > Numero de Grupo |
                                    <input type="radio" name="grupo" value="2" <?php if (($_POST['grupo'])=='2') echo "checked";?> onclick="mostrar();" > Carrera y semestre  
                                    <script type="text/javascript">
                                        
                                    </script>


                                </td>
                            </tr>
                            <tr id="campos" style="display:none;" >
                                <td colspan="2">
                                    Carrera:
                                    <input type="text" name="b_carrera">
                                </td>
                                <td colspan="2">
                                    Semestre:
                                    <input type="text" name="b_semestre">
                                </td>
                            </tr>

                            <tr id="campo" style="display:none;">
                                <td colspan="2" >
                                    <input type="text" name="txtbuscar" size="45">                                    
                                </td>
                            </tr>

                        </table>
                    </form>
                 
                </article>
                
            </div>
        </section>

<script type="text/javascript">
function mostrar(){

if (document.carrera.grupo[1].checked == true) {

document.getElementById('campos').style.display='block';
document.getElementById('campo').style.display='none';

} else {

document.getElementById('campos').style.display='none';
document.getElementById('campo').style.display='block';
}
}
</script>
       
<?

function Guardar()
{

    if ($_POST['txtFecha1']) 
    {
        $new = new Grupo();
        $new->setfechaini($_POST['txtFecha1']);
        $new->setfechafin($_POST['txtFecha2']);
        $new->setGestion($_POST['txtaño']);
        $new->setRegDocente($_POST['txtregdoc']);
        $new->setCodCarrera($_POST['txtidcarrera']);
        $new->setSigla($_POST['txtidmateria']);
        
        if ($new->Guardar()) 
            echo "Se registro exitosamente  los datos";
        
        else
            echo "Error al registrar"."<br>";
        echo $new->getCodCarrera()."<br>";
        echo $new->getSigla()."<br>";
        echo $new->getfechaini()."<br>";
        echo $new->getfechafin()."<br>";
        echo $new->getGestion()."<br>";
        echo $new->getRegDocente()."<br>";
        

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
    $gru= new Grupo();

    switch ($_POST['grupo']) {
        case '1':
            $res=$gru->buscarxid($_POST['txtbuscar']);
            mostrar($res); 
            break;

        case '2':
            $res=$gru->buscarxcarrerasemestre($_POST['b_carrera'],$_POST['b_semestre']);
            mostrar($res);
            break;

       
    }

}

function mostrar($cod_carrera){
    echo "<table align='center'>";
    echo "<tr>  
                <td>Nro</td>
                <td>Fecha Inicio</td>
                <td>Fecha Final</td>
                <td>Gestion</td>
                <td>Docente</td>
                <td>Carrera</td>
                <td>Materia</td>

                <td><center>*</center></td>
          </tr>";
    while($fila=mysqli_fetch_object($cod_carrera))
    {
        echo "<tr>";

        echo        "<td>$fila->nro_grupo</td>";
        echo        "<td>$fila->fecha_inicio</td>";
        echo        "<td>$fila->fecha_final</td>";
        echo        "<td>$fila->gestion</td>";
        echo        "<td>$fila->nombres_d</td>";
        echo        "<td>$fila->nombre_c</td>";
        echo        "<td>$fila->nombre_m</td>";
        
        echo        "<td><a href='FrmGrupo.php? 
        x_ngrupo=$fila->nro_grupo&
        x_fechai=$fila->fecha_inicio&
        x_fechaf=$fila->fecha_final&
        x_gestion=$fila->gestion&
        x_nombred=$fila->nombres_d&
        x_idoc=$fila->reg_docente&
        x_nombrec=$fila->nombre_c&
        x_idcar=$fila->cod_carrera&
        x_nombrem=$fila->nombre_m&
        x_idmat=$fila->sigla

        '>[Editar] </a></td>";
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