<!DOCTYPE html>
<html>
<body>
  <?php
    header("Content-Type: text/html;charset=utf-8");
    $host_name  = "db624747361.db.1and1.com";
    $database   = "db624747361";
    $user_name  = "dbo624747361";
    $password   = "tomates";

    $conn = mysqli_connect($host_name, $user_name, $password, $database);
    $conn->query("SET NAMES 'utf8'");
    if(mysqli_connect_errno())
    {
    echo '<p>Error al conectar a base de datos: '.mysqli_connect_error().'</p>';
    }

    $cat = 0;
    $cat = $_REQUEST["cat"];
    $q = $_REQUEST["q"];

    if ($cat != 0){
      if ($cat = 1){
      $sql = "SELECT * FROM Producto";
      }
      else{
      $sql = "SELECT * FROM Producto WHERE Categoria LIKE '%$cat%'";
      }
    }
    elseif ($q == ""){
      echo "<div class='oops white-text'>Te recomendamos...</div>";
      $sql = "SELECT * FROM Producto WHERE recomendados = '1'";
    }
    else{
      $sql = "SELECT * FROM Producto WHERE nombre LIKE '%$q%' OR tags LIKE '%$q%'";
      $sql_busq = "INSERT INTO Busquedas (IdCliente, Palabras)
              VALUES ('', '$q')";
      mysqli_query($conn, $sql_busq);
    }
    $result = mysqli_query($conn, $sql);
    $rowcount=mysqli_num_rows($result);
    if ($rowcount==0){
      echo "<div class='oops white-text'>Oops, no encontramos lo que buscabas, pero mira lo que tenemos...</div>";
      $sql = "SELECT * FROM Producto";
      $result = mysqli_query($conn, $sql);
    }
    echo '<div class="row">';
    while($row = mysqli_fetch_assoc($result)){
    $sql_productor = "SELECT * FROM productors WHERE id LIKE ".$row['IDProductor'];
    $result_productor  = mysqli_query($conn, $sql_productor);
    $row2 = mysqli_fetch_assoc($result_productor);
    ?>
      <!--  card <?php echo $x ?> -->
      <div class="col l4 m6 s12">
          <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="img/productos/<?php echo $row["Imagen"] ?>.jpg" onerror="this.src='img/productos/Default.jpg'">
              </div>
              <div class="card-content">
                <p class="card-title activator"><?php echo $row["Nombre"] ?></p>
                <p class="card-subtitle activator"><?php echo $row2["lugar"]; ?></p>
                <p class="precio activator">$<?php echo $row["Precio"] ?> MXN - <?php echo $row["Unidad"] ?></p>
              </div>
              <!-- Productor -->
              <a class="modal-trigger" href="#productor<?php echo $row["id"] ?>">
                <div class="foto-productor">
                  <img src="img/img_productors/<?php echo $row2["foto_productor"]; ?>.jpg" class="circle responsive-img" alt="" />
                  <p><?php echo $row2["alias"]; ?></p>
                </div>
              </a>
              <!-- Productor Modal Structure -->
              <div id="productor<?php echo $row["id"] ?>" class="modal modal-productor">
                    <div class="modal-content">
                      <div class="row">
                        <div class="col l6 m6 s12">
                          <img src="img/img_productors/<?php echo $row2["foto_productor"]; ?>.jpg" class="circle responsive-img" alt="" />
                        </div>
                        <div class="col l6 m6 s12 ">
                            <h4><?php echo $row2["alias"]; ?></h4>
                            <h5><?php echo $row2["lugar"]; ?></h5>
                            <p><?php echo $row2["descripcion"] ?> </p>
                            <div class="row">
                            <div class="medallas">
                                <!--<span class="left">Medallas:</span>-->
                                <a class="tooltipped <?php if ($row2["local"] == 0) {echo "hide"; } ?>" data-position="top" data-delay="50" data-tooltip="Local"><img class="responsive-img" src="img/png/local.png" alt=""/></a>
                                <a class="tooltipped <?php if ($row2["organico"] == 0) {echo "hide"; } ?>" data-position="top" data-delay="50" data-tooltip="Orgánico"><img class="responsive-img" src="img/png/organico.png" alt=""/></a>
                                <a class="tooltipped <?php if ($row2["vulnerable"] == 0) {echo "hide"; } ?>" data-position="top" data-delay="50" data-tooltip="Vulnerable"><img class="responsive-img" src="img/png/vulnerable.png" alt=""/></a>
                                <a class="tooltipped <?php if ($row2["urbano"] == 0) {echo "hide"; } ?>" data-position="top" data-delay="50" data-tooltip="Urbano"><img class="responsive-img" src="img/png/urbano.png" alt=""/></a>
                            </div>
                            </div>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn green">¡Entendido!</a>
                        </div>
                    </div>
                </div>

              </div>
              <!-- /Productor Modal Structure -->
              <!-- /Productor -->
              <!-- Atrás card -->
              <div class="card-reveal">
                <span class="card-title"><?php echo $row["Nombre"] ?><i class="material-icons right">close</i></span>
                <div class="row" style="margin: 0;">
                  <span class="precio_grande red-text left">$<?php echo $row["Precio"] ?> MXN</span>
                </div>
                <div class="row" style="margin: 0;">
                  <span class="unidad_grande red-text left"><?php echo $row["Unidad"] ?></span>
                </div>
                <p class="descripcion"><?php echo $row["Descripcion"] ?></p>
                <div class="compra">
                        <a onclick="agregar('<?php echo $row["id"]?>')" class="waves-effect waves-light btn red">A la canasta</a>
                </div>
              </div>
              <!-- /Atrás card -->
              <!-- Botón delantero -->
              <div class="boton-delantero">
                <img src="img/png/btn_canasta_compra.png" onclick="agregar('<?php echo $row["id"]?>')" onmouseover="hoverimg(this)" onmouseout="mouseaway(this)" class="waves-effect waves-light botond" alt="" />
              </div>
              <!-- /Botón delantero -->
          </div>
          </div>
      <!--  /card <?php echo "$x" ?> -->
      <?php
        $x++;
        }
      ?>
      </div>
</body>
</html>
