<?php
session_start();

if (isset($_SESSION['s_usuario'])) {
    $user=$_SESSION['s_usuario'];

}
else
    header("location: login.php");
    
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8, user-scalable=no"/>
    
    <title>FINOR | PRINCIPAL</title>
    
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/carreras.css">

    
</head>

<body>
    <header>
        <div class="contenedor">
            <h1><strong>FINOR</strong> | <i>Principal</i></h1>
            
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
        <section id="banner">
            <img src="images/infra.jpg">
            <div class="contenedor">
                <h2>FACULTAD INTEGRAL DEL NORTE</h2>
                <p>
                    SISTEMA PRINCIPAL 
                </p>
                <a id="linktohome" href='logout.php'>SALIR</a>
            </div>
        </section>

        <section id="bienvenidos">
            <div class="contenedor">
                <h2>Hola  <?php echo $user;?>!! Bienvenido al panel Principal del Sistema de la FINOR</h2>
            </div>
        </section>

        <section id="blog">

            <div class="contenedor">
                <article>
                    <p>INSCRIPCIONES</p>
                    <ul>
                        <li class="icon-medicina"><a href="frmRegistrarse.php" class="selda"> INSCRIPCION</a></li>
                        <li class="icon-medicina"><a href="frmRetiros.php" class="selda"> RETIROS</a></li>
                        <li class="icon-medicina"><a href="frmNotas.php" class="selda"> NOTAS</a></li
                    </ul>
                   
                </article>
                 <article>
                    <p>REGISTRAR NUEVO:</p>
                    <ul>
                        <li class="icon-educacion"><a href="frmEstudiante.php" class="selda"> ESTUDIANTE</a></li>
                        <li class="icon-educacion"><a href="frmDocente.php" class="selda"> DOCENTE</a></li>
                        <li class="icon-educacion"><a href="frmGrupo.php" class="selda"> GRUPO</a></li>
                        <li class="icon-educacion"><a href="frmMateria.php" class="selda"> MATERIA</a></li>
                        <li class="icon-educacion"><a href="frmSemestre.php" class="selda"> SEMESTRE</a></li>
                        <li class="icon-educacion"><a href="frmCarrera.php" class="selda"> CARRERA</a></li>

                    </ul>
                    
                          
                </article>
                
            </div>
        </section>

        <section id="info">
            <h3><?php echo "<strong>$user</strong>";?> aqui tienes unos opciones que te pueden interesar:</h3>
               <div class="contenedor">
               <div class="info-uni">
                   <a href="historia.html"><img src="images/historia.jpg" alt="">
                    </a>
                    <h4>Informacion de General de la Universidad</h4>
                </div>
                <div class="info-uni">
                    <a href="mision-vision.html"><img src="images/mision.png" alt=""></a>
                    <h4>Cambiar contraseña</h4>
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