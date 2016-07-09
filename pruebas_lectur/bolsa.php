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
    $b = $_REQUEST["b"];
    $sql = "SELECT * FROM Producto WHERE id = $b ";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
    ?>
      <!--  row  -->
      <tr id="row<?php echo $b ?>">
        <td><span class="idbolsa hide"><?php echo $b ?></span><img  src="img/productos/<?php echo $row["Imagen"] ?>.jpg" class="img-canasta"alt="" /></td>
        <td class="hide-on-small-only"><span><?php echo $row["Nombre"] ?></span></td>
        <td>$<span id="precio<?php echo $b ?>"><?php echo $row["Precio"] ?></span> MXN <?php echo $row["Unidad"] ?></td>
        <td>
        <i class="controles material-icons green-text" onclick="cantidad('<?php echo $b ?>',0)">remove_circle</i>
        <input class="quantity validate" id="cantidad<?php echo $b ?>" value="1" type="number" min="1" max="20" onchange="importe('<?php echo $b ?>',0)">
        <i class="controles material-icons green-text" onclick="cantidad('<?php echo $b ?>',1)">add_circle</i>
        </td>
        <td >$ <span id="importe<?php echo $b ?>" class="importe"><?php echo $row["Precio"] ?></span> MXN</td>
        <td>
        <i class="controles material-icons red-text" onclick="quitar('row<?php echo $b ?>')">cancel</i>
        </td>
      </tr>
      <!--  /row  -->
      <?php } ?>
</body>
</html>
