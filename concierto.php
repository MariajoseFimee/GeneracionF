<?php
  session_start();
  require 'database.php';

  if(isset($_SESSION['user_id'])){
  $var1 = $_SESSION['user_id'];
  }
	$sql = "SELECT user_name FROM users WHERE users_id=:users_id";
	$stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	$stmt -> bindParam(':users_id', $var1);
	$stmt -> execute();
  $result = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

    $sql2 = "SELECT * FROM itinerary_view";
    $stmt2 = $conn->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt2 -> execute();

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
<header class="site-header">
    <div class="hero3">
      <div class="contenido-header">
        <nav class="redes-sociales">
            <a href="https://www.facebook.com/marijo.avi19"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-pinterest-p"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>
        <div class="informacion-evento">
            <div class="clearfix">
              <p class="fecha"><i class="fas fa-calendar-alt"></i>19-03-20</p>
              <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Salamanca</p>
            </div>
              <h1 class="nombre-sitio">LatinLive</h1>
              <p class="slogan">Vive la musica <samp>latina</samp></p>
              <div><p class="slogan"><?php echo $result[0]; ?> </p></div>
        </div>
      </div>
    </div>
  </header>

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
        <?php if($result[0] == NULL){?>
          <a href="index.php">Home</a>
          <a href="meet.php">Meet&Greet</a>
          <a href="user_log.php">Reservar</a>
        <?php } ?>
        <?php if($result[0] != NULL){?>
          <a href="index.php" id="">Home</a>
          <a href="historial.php">Mi lista</a>
          <a href="compra1.php">Reservar</a>
          <a href="logout.php">Salir</a>
        <?php } ?>
      </nav>

    </div>
  </div>

  <section class="contenedor">
    <h2>Programa</h2>
    <section class="caja-lista">
 									<div class="table-wrapper">
 												<p class="p-titulo">
 													<th>Nombre</th>
 													<th>Escenario</th>
                          <th>Dia</th>
                        </p>
                        <?php
                        // ****************************************** AQUÍ EDITA ROCCI
                        while ($row = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
 												<p>
                            <th><?php print $row[1];?> &nbsp&nbsp&nbsp</th>
                            <th><?php print $row[2];?> &nbsp&nbsp&nbsp</th>
                            <th><?php print $row[3];?> &nbsp&nbsp&nbsp</th>
                        </p>
                      <?php } ?>
                   </div>
    </section>
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
