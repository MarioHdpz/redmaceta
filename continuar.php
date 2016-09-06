<?php

require_once 'init.php';
require_once 'conex.php';

	//Recibimos el string
	$products = $_REQUEST["products"];
	$quants = $_REQUEST["quants"];
	//Creamos los dos arreglos separados
	$ids = explode(',',$products);
	$cants = explode(',',$quants);

	$idslenght = count($ids);
	$total=0;
	for ($i=0; $i < $idslenght; $i++) {
		$stmt = $db->query('SELECT * FROM Producto WHERE id ='.$ids[$i]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$precio[$i] = $row['Precio'];
		$importe = $precio[$i]*$cants[$i];
		$total = $total+$importe;
	}
	$_SESSION['total']=$total*100;

// Create connection
$conn = new mysqli($host_name, $user_name, $password, $database);
$conn->query("SET NAMES 'utf8'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fecha=  date("Y-m-d");
$hora =   date("H:i:s");


$sql = "INSERT INTO bolsa (id, products, quants, fecha, hora, total)
VALUES ('', '$products', '$quants', '$fecha', '$hora', '$total')";

$conn->query($sql);
$id = $conn->insert_id;


$_SESSION["user"] = $id;


for ($i=0; $i < $idslenght; $i++) {
	$stmt = $db->query('SELECT * FROM Producto WHERE id ='.$ids[$i]);
	$db->query("SET NAMES 'utf8'");
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
  ?>

	<!--  row  -->
	<tr >
		<td><span><?php echo $row['Nombre'] ?></span></td>
		<td><span><?php echo $cants[$i] ?></td>
		<td><span></span><?php echo $row['Unidad']."(s)" ?></td>
		<td >$ <span><?php echo $precio[$i]*$cants[$i]; ?></span> MXN</td>
	</tr>
	<!--  /row  -->


<?php
}
$conn->close();


?>
