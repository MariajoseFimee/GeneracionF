<?php
    session_start();
    require 'database.php';

     if(!empty($_POST['name']) && !empty($_POST['password'])) {
       $sql = "SELECT * FROM admins WHERE admin_name=:name AND passwords=:password";
       $stmt = $conn->prepare($sql);
       $stmt -> bindParam(':name', $_POST['name']);
       $stmt -> bindParam(':password', $_POST['password']);
       $stmt -> execute();
       $results = $stmt->fetch(PDO::FETCH_ASSOC);

       $message = '';

       if($results != null){
           $message = 'Succesfully';
           $_SESSION['admin_id'] = $results['admins_id'];
           header('Location:planner.php');
          }else{
          $message = 'Ups! No eres administrador';
        }
      }
 ?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <div class="barra">
    <div class="contenedor clearfix">
      <div class="logo">
        <img src="img/logo1.png" alt="logo latinlive">
      </div>

      <div class="menu-movil">
          <span></span>
          <span></span>
          <span></span>
      </div>

      <nav class="navegacion-principal clearfix">
          <a href="index.php">Home</a>
          <a href="user_log.php">No Planner</a>
      </nav>

    </div>
  </div>

  <section class="seccion contenedor">
    <h2>Acceso para Administradores</h2>

    <?php if(!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>

    <form id="registro" class="registro" method="post">
        <div id="datos_usuario" class="registro caja clearfix">
            <div class="campo">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" placeholder="Tu Nombre">
            </div>
            <div class="campo">
                    <label for="password">Pass:</label>
                    <input type="password" name="password" id="password" placeholder="Tu Contraseña">
            </div>
            <div class="campo">
 								<input type="submit" value="Acceder"/>
            </div>
            <div id="error"></div>
        </div>
    </form>
  </section>

  
  <footer class="site-footer">
    <div class="contenedor clearfix">
      <div class="footer-informacion">
          <h3>Sobre<span> latinlive</span></h3>
          <p>Aquí podemos poner cualquier cosa que se nos ocurra. Por ejemplo, patrocinadores o información del evento.</p>
      </div>
      <div class="ultimos-tweets">
          <h3>Últimos<span> tweets</span></h3>
          <ul>
            <li>Aquí podemos poner cualquier cosa que se nos ocurra. Por ejemplo, patrocinadores o información del evento.</li>
            <li>Aquí podemos poner cualquier cosa que se nos ocurra. Por ejemplo, patrocinadores o información del evento.</li>
            <li>Aquí podemos poner cualquier cosa que se nos ocurra. Por ejemplo, patrocinadores o información del evento.</li>
          </ul>
      </div>
      <div class="menu">
          <h3>Redes<span> Sociales</span></h3>
          <nav class="redes-sociales">
          <a href="https://www.facebook.com/marijo.avi19"><i class="fab fa-facebook-f"></i></a>
              <a href="https://twitter.com/1903Guzman"><i class="fab fa-twitter"></i></a>
              <a href="https://www.pinterest.com.mx/pin/401875966739474515/"><i class="fab fa-pinterest-p"></i></a>
              <a href="https://www.youtube.com/watch?v=HjVEFk9H6gs"><i class="fab fa-youtube"></i></a>
              <a href="https://www.instagram.com/mariajose_19031/?hl=es-la"><i class="fab fa-instagram"></i></a>
          </nav>
      </div>
    </div>
    <p class="copyright">Todos los derechos Reservados LATINLIVE 2020.</p>
  </footer>

 <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.lettering.js"></script>
  <script src="js/main.js"></script>
  <script src="js/filtro.js"></script>

</body>

</html>
