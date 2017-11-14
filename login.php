
<?php
session_start();

if (isset($_SESSION['s_usuario']))
  {
    header("location: panel.php");
  }  
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.8, user-scalable=no"/>
  <title>FINOR | Login</title>
  
  <link rel="stylesheet" href="css/fontello.css">
  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
  <link rel="stylesheet" type="text/css" href="css/index.css">

      <link rel="stylesheet" href="css/style.css">

 
</head>


<body>

	<header>
        <div class="contenedor">
            <h1><strong>FINOR</strong> | <i>Ingreso</i></h1>
            
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
                <a href="index.html" class="icon-inicio">Inicio</a>
            </nav>
        </div>
    </header>

    <div class="wrapper" style="margin-top: 160px;">
    <form class="form-signin" action="control.php" method="POST">       
      <h2 class="form-signin-heading">Bienvenido</h2>
      <input type="text" class="form-control" name="user" placeholder="Usuario" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Contraseña" required=""/>      
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar</button>   
    </form>
  </div>
  
  
</body>
</html>
