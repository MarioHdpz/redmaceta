<?php
require_once 'conex.php';
?>
<!DOCTYPE html>
<html>
<body>
  <?php
    header("Content-Type: text/html;charset=utf-8");
    $conn = mysqli_connect($host_name, $user_name, $password, $database);
    $conn->query("SET NAMES 'utf8'");
    if(mysqli_connect_errno())
    {
        echo '<p>Error al conectar a base de datos: '.mysqli_connect_error().'</p>';
    }

    mysql_select_db($database, $conn);

    $rowid = $_REQUEST["p"];

    $aux_id = explode("_", $rowid);

    $id_productor = $aux_id[1];

    $sql = "SELECT * FROM productors WHERE id = ".$id_productor;

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
    ?>
    <div class="oops white-text"><?php echo $row["alias"]; ?></div>
    <img class="responsive-img" src="img/img_productors/<?php echo $row["foto_productor"]; ?>.jpg" alt="" />
    <div class='copy_productores'><?php echo $row["descripcion"] ?> </div>

    <?php

    }
    ?>
</body>
</html>
