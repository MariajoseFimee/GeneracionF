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
  
    //CONSULTA PARA LOS BOLETOS 
    $sql2 = "SELECT ticket_id, ticket_name, price, descr FROM ticket";
    $stmt2 = $conn->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt2 -> execute();

    //CONSULTA PARA LOS FAMOSOS 
    $sql3 = "SELECT count(*) FROM artist";
    $stmt3 = $conn->prepare($sql3, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt3 -> execute();
    $famoso = $stmt3->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

    //CONSULTA PARA LOS ESCENARIO
    $sql4 = "SELECT count(*) FROM stage";
    $stmt4 = $conn->prepare($sql4, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt4 -> execute();
    $escenario = $stmt4->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

    //CONSULTA PARA LOS DIAS
    $sql5 = "SELECT count(*) FROM day";
    $stmt5 = $conn->prepare($sql5, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt5 -> execute();
    $dias = $stmt5->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

    //CONSULTA PARA LOS MEET
    $sql6 = "SELECT count(*) FROM meet";
    $stmt6 = $conn->prepare($sql6, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt6 -> execute();
    $meet = $stmt6->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

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
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
        <a href="https://www.facebook.com/marijo.avi19"><i class="fab fa-facebook-f"></i></a>
              <a href="https://twitter.com/1903Guzman"><i class="fab fa-twitter"></i></a>
              <a href="https://www.pinterest.com.mx/pin/401875966739474515/"><i class="fab fa-pinterest-p"></i></a>
              <a href="https://www.youtube.com/watch?v=HjVEFk9H6gs"><i class="fab fa-youtube"></i></a>
              <a href="https://www.instagram.com/mariajose_19031/?hl=es-la"><i class="fab fa-instagram"></i></a>
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
          <a href="artistas.php">Artistas</a>
          <a href="user_log.php">Acceso</a>
          <a href="planners_log.php">Planners</a>
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

  <section class="seccion contenedor">
    <h2>La mejor música latina reunida en un sólo lugar</h2>
    <p>Aquí podemos poner cualquier cosa que se nos ocurra. Por ejemplo, patrocinadores o información del evento.
    </p>
  </section>

  <section class="programa">
    <div class="contenedor-img">
      <img src="img/img7.jpg">
    </div>

    <div class="contenido-programa">
        <div class="contenedor">
          <div class="programa-evento">
            <h2>Programa del evento</h2>
            <nav class="menu-programa">
              <a href="#conciertos"><i class="fas fa-music" aria-hidden="true"></i> Conciertos</a>
              <a href="#meet"><i class="fas fa-star" aria-hidden="true"></i> Meet&Greet</a>
            </nav>

            <div id="conciertos" class="info-conci ocultar clearfix">
              <div class="detalle-evento">
                <h3>Zoé</h3>
                <p><i class="fas fa-clock" aria-hidden="true"></i>16:00 hrs</p>
                <p><i class="fas fa-calendar" aria-hidden="true"></i>19 de Marzo</p>
              </div>
              <div class="detalle-evento">
                <h3>Caifanes</h3>
                <p><i class="fas fa-clock" aria-hidden="true"></i>20:00 hrs</p>
                <p><i class="fas fa-calendar" aria-hidden="true"></i>19 de Marzo</p>
              </div>
              <div class="detalle-evento">
                <h3>DLD</h3>
                <p><i class="fas fa-clock" aria-hidden="true"></i>16:00 hrs</p>
                <p><i class="fas fa-calendar" aria-hidden="true"></i>20 de Marzo</p>
              </div>
              <div class="detalle-evento">
                <h3>Miranda</h3>
                <p><i class="fas fa-clock" aria-hidden="true"></i>20:00 hrs</p>
                <p><i class="fas fa-calendar" aria-hidden="true"></i>20 de Marzo</p>
              </div>
              <a href="concierto.php" class="button float-right">Ver todos</a>
            </div>

            <div id="meet" class="info-conci ocultar clearfix">
              <div class="detalle-evento">
                <h3>DLD</h3>
                <p><i class="fas fa-clock" aria-hidden="true"></i>20:00 hrs</p>
                <p><i class="fas fa-calendar" aria-hidden="true"></i>20 de Marzo</p>
              </div>
              <div class="detalle-evento">
                <h3>Café Tacuba</h3>
                <p><i class="fas fa-clock" aria-hidden="true"></i>21:00 hrs</p>
                <p><i class="fas fa-calendar" aria-hidden="true"></i>20 de Marzo</p>
              </div>
              <div class="detalle-evento">
                <h3>Zoé</h3>
                <p><i class="fas fa-clock" aria-hidden="true"></i>20:00 hrs</p>
                <p><i class="fas fa-calendar" aria-hidden="true"></i>21 de Marzo</p>
              </div>
              <div class="detalle-evento">
                <h3>Miranda</h3>
                <p><i class="fas fa-clock" aria-hidden="true"></i>21:00 hrs</p>
                <p><i class="fas fa-calendar" aria-hidden="true"></i>21 de Marzo</p>
              </div>
              <a href="meet.php" class="button float-right">Ver todos</a>
            </div>
          </div>
        </div>
      </div>
  </section>
  <section class="invitados contenedor seccion" id="artistas">
    <h2>Artistas</h2>
    <ul class="lista-invitados clearfix">
      <li>
        <div class="invitado">
          <img src="imgArtistas/invitado1.jpg" alr="imagen invitado">
          <p>León Larregui</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="imgArtistas/invitado2.jpg" alr="imagen invitado">
          <p>Caifanes</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="imgArtistas/invitado3.jpg" alr="imagen invitado">
          <p>Café Tacuba</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="imgArtistas/invitado4.jpg" alr="imagen invitado">
          <p>Miranda</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="imgArtistas/invitado5.jpg" alr="imagen invitado">
          <p>DLD</p>
        </div>
      </li>
      <li>
          <div class="invitado">
            <img src="imgArtistas/invitado6.jpg" alr="imagen invitado">
            <p>Los claxons</p>
          </div>
        </li>
    </ul>
    <a href="artistas.php" class="button">Ver todos</a>
  </section>

  <div class="contador parallax">
    <div class="contenedor">
      <ul class="resumen-evento clearfix">
        <li><p class="numero"><?php echo $famoso[0]; ?></p>Artistas</li>
        <li><p class="numero"><?php echo $escenario[0]; ?></p>Escenarios</li>
        <li><p class="numero"><?php echo $dias[0]; ?></p>Días</li>
        <li><p class="numero"><?php echo $meet[0]; ?></p>M&G</li>
      </ul>
    </div>
  </div>

  <section class="precios seccion" id="precios">
    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista-precios clearfix">
          <?php
          while ($row = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
            <li>
            <div class="tabla-precio">
            <h3><?php print $row[1];?></h3>
            <p class="numero"><?php print $row[2];?></p>
            <ul>
              <li><?php print $row[3];?></li>
            </ul>
            <?php $valor = $row[0]; ?>
            <a href="compra.php?compra=<?php echo $valor; ?>" class="button hollow">Comprar</a>
            </div>
            </li>
            <?php } ?>
      </ul>
    </div>
  </section>

  <?php if($result[0] == NULL){?>
  <div id="mapa" class="mapa"></div>

  <section class="seccion">
    <h2>Relleno</h2>
      <div class="rellenos contenedor clearfix">
          <div class="relleno">
              <blockquote>
                <p>Aquí podemos poner cualquier cosa que se nos ocurra. Por ejemplo, patrocinadores o información del evento.</p>
                <footer class="info-relleno clearfix">
                  <img src="img/testimonial.jpg" alt="imagen relleno">
                  <cite>Fulanito Aponte Escobedo <span>Patrocinador</span></cite>
                </footer>
              </blockquote>
            </div>
            <div class="relleno">
                <blockquote>
                  <p>Aquí podemos poner cualquier cosa que se nos ocurra. Por ejemplo, patrocinadores o información del evento.</p>
                  <footer class="info-relleno clearfix">
                    <img src="img/testimonial.jpg" alt="imagen relleno">
                    <cite>Fulanito Aponte Escobedo <span>Patrocinador</span></cite>
                  </footer>
                </blockquote>
              </div>
              <div class="relleno">
                  <blockquote>
                    <p>Aquí podemos poner cualquier cosa que se nos ocurra. Por ejemplo, patrocinadores o información del evento.</p>
                    <footer class="info-relleno clearfix">
                      <img src="img/testimonial.jpg" alt="imagen relleno">
                      <cite>Fulanito Aponte Escobedo <span>Patrocinador</span></cite>
                    </footer>
                  </blockquote>
                </div>
      </div>
  </section>
  
  <div class="newsletter parallax">
    <div class="contenido contenedor">
      <p>Registrate gratis en</p>
      <h3>LATINLIVE</h3>
      <a href="agregar_user.php" class="button transparente">Registro</a>
    </div>
  </div>
  <?php } ?>

  <section class="seccion">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva contenedor">
      <ul class="clearfix">
        <li><p id="dias" class="numero"></p>Días</li>
        <li><p id="horas" class="numero"></p>Horas</li>
        <li><p id="minutos" class="numero"></p>Minutos</li>
        <li><p id="segundos" class="numero"></p>Segundos</li>
      </ul>
    </div>
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