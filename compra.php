<?php

  session_start();
  require 'database.php';
  $compra=$_GET['compra'];

  if(isset($_SESSION['user_id'])){
  $var1 = $_SESSION['user_id'];
  }
	$sql = "SELECT user_name FROM users WHERE users_id=:users_id";
	$stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	$stmt -> bindParam(':users_id', $var1);
	$stmt -> execute();
  $result = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

    $sql2 = "SELECT name_day FROM day";
    $stmt2 = $conn->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt2 -> execute();

 ?>

<?php if($result == NULL) {
      header('Location: user_log.php'); }
      else { ?>
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
          <a href="historial.php">Mi lista</a>
          <a href="compra1.php">Reservar</a>
          <a href="logout.php">Salir</a>
      </nav>

    </div>
  </div>

  <section class="seccion contenedor">
    <h2>Reserva tus entradas</h2>
    <form id="registro" class="registro" method="post">
        <div id="paquetes" class="paquetes">
            <ul class="list-precios clearfix">
                    <?php if($compra == 1){?>
                      <h3>Elige numero de boletos</h3>
                      <li>
                      <div class="tabla-precio">
                        <h3>Pase por día</h3>
                        <p class="numero">$700</p>
                        <ul>
                          <li>Todos los escenarios</li>
                          <li>Todos los artistas del día</li>
                          <li>Acceso a FastFood</li>
                        </ul>
                        <div class="orden">
                                <label for="pase_dia">Boletos deseados:</label>
                                <input type="number" min="0" max="10" id="pase_dia" placeholder="0">
                        </div>
                      </div>
                    </li>
                    <?php } ?>
                    <?php if($compra == 2){?>
                      <h3>Elige numero de boletos</h3>
                    <li>
                        <div class="tabla-precio">
                          <h3>VIP por día</h3>
                          <p class="numero">$1,800</p>
                          <ul>
                            <li>Todos los escenarios y Artistas</li>
                            <li>Zona de comida</li>
                            <li>1 Meet&Greet</li>
                          </ul>
                          <div class="orden">
                              <label for="pase_vip">Boletos deseados:</label>
                              <input type="number" min="0" id="pase_vip" size="3" placeholder="0">
                          </div>
                        </div>
                      </li>
                      <?php } ?>
                    <?php if($compra == 3){?>
                      <h3>Elige numero de boletos</h3>
                    <li>
                        <div class="tabla-precio">
                          <h3>Pase completo</h3>
                          <p class="numero">$2,000</p>
                          <ul>
                          <li>Pase para todo el evento</li>
                          <li>Todos los artistas</li>
                          <li>Acceso a FastFood</li>
                          </ul>
                          <div class="orden">
                                <label for="pase_tres">Boletos deseados:</label>
                                <input type="number" min="0" id="completo" size="3" placeholder="0">
                            </div>
                        </div>
                      </li>
                      <?php } ?>
                      <?php if($compra == 4){?>
                        <h3>Elige numero de boletos</h3>
                      <li>
                        <div class="tabla-precio">
                          <h3>Pase completo VIP</h3>
                          <p class="numero">$5,000</p>
                          <ul>
                          <li>Pase VIP para todo el evento</li>
                          <li>Todos los artistas</li>
                          <li>1 Meet&Greet por día</li>
                          </ul>
                          <div class="orden">
                                <label for="pase_tres">Boletos deseados:</label>
                                <input type="number" min="0" id="vip" size="3" placeholder="0">
                            </div>
                        </div>
                      </li>
                      <?php } ?>

                      <!--Meet&Greet-->
                      <?php if($compra == 5){?>
                         <h3>Elige tus favoritos</h3>
                         <div class="caja">
                               <div id="viernes" class="contenido-dia clearfix">
                                   <h4>Viernes</h4>
                                       <div>
                                           <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time>10:00</time> Responsive Web Design</label>
                                           <label><input type="checkbox" name="registro[]" id="taller_02" value="taller_02"><time>12:00</time> Flexbox</label>
                                           <label><input type="checkbox" name="registro[]" id="taller_03" value="taller_03"><time>14:00</time> HTML5 y CSS3</label>
                                           <label><input type="checkbox" name="registro[]" id="taller_04" value="taller_04"><time>17:00</time> Drupal</label>
                                           <label><input type="checkbox" name="registro[]" id="taller_05" value="taller_05"><time>19:00</time> WordPress</label>
                                       </div>
                               </div> <!--#viernes-->
                               <div id="sabado" class="contenido-dia clearfix">
                                   <h4>Sábado</h4>
                                   <div>
                                         <label><input type="checkbox" name="registro[]" id="taller_06" value="taller_06"><time>10:00</time> AngularJS</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_07" value="taller_07"><time>12:00</time> PHP y MySQL</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_08" value="taller_08"><time>14:00</time> JavaScript Avanzado</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_09" value="taller_09"><time>17:00</time> SEO en Google</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_10" value="taller_10"><time>19:00</time> De Photoshop a HTML5 y CSS3</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_11" value="taller_11"><time>21:00</time> PHP Medio y Avanzado</label>
                                   </div>
                               </div> <!--#sabado-->
                               <div id="domingo" class="contenido-dia clearfix">
                                   <h4>Domingo</h4>
                                   <div>
                                         <label><input type="checkbox" name="registro[]" id="taller_12" value="taller_12"><time>10:00</time> Laravel</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_13" value="taller_13"><time>12:00</time> Crea tu propia API</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_14" value="taller_14"><time>14:00</time> JavaScript y jQuery</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_15" value="taller_15"><time>17:00</time> Creando Plantillas para WordPress</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_16" value="taller_16"><time>19:00</time> Tiendas Virtuales en Magento</label>
                                   </div>
                               </div> <!--#domingo-->
                           </div><!--.caja-->
                      <?php } ?>
                      <!--Fin-->
                  </ul>
        </div>

        <div id="eventos" class="eventos clearfix">
                        <?php if($compra == 1 || $compra == 2){ ?>
                        <h3>Elige tu día favorito</h3> <?php }?>
                        <?php if($compra == 3 || $compra == 4){ ?>
                        <h3>Todos los días son tus favoritos</h3> <?php }?>
                         <div class="caja">
                              <?php if($compra == 1){?>
                               <div id="pasepordia" class="contenido-dia clearfix">
                                   <h4>Pase por día</h4>
                                       <div>
                                           <p>Seleccione un día:</p>
                                           <label><select id="dia" required>
                                             <?php
                                             while ($row = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                                             <option value=""><?php print $row[0];?></option>
                                             <?php } ?>
                                            </select></label>
                                       </div>
                               </div> <!--Pase por día-->
                              <?php } ?>

                              <?php if($compra == 2){?>
                               <div id="vippordia" class="contenido-dia clearfix">
                                   <h4>VIP por día</h4>
                                   <div>
                                            <p>Seleccione un día:</p>
                                            <label><select id="vip" required>
                                             <?php
                                             while ($row = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                                             <option value=""><?php print $row[0];?></option>
                                             <?php } ?>
                                             </select></label>
                                   </div>
                               </div> <!--VIP por día-->
                              <?php } ?>

                           </div><!--.caja-->
        </div> <!--#eventos-->
        <input type="button" id="calcular" class="button" value="Listo">

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

<?php } ?>
