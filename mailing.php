
 <?
require_once 'init.php';

/// mailing

$servername = "db624747361.db.1and1.com";
$username = "dbo624747361";
$password = "tomates";
$dbname = "db624747361";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query("SET NAMES 'utf8'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bolsa WHERE id =".$_SESSION["user"];
      $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
            $quants= $row['quants'];
            $products = $row['products'];
    }

	//Creamos los dos arreglos separados
	$ids = explode(',',$products);
	$cants = explode(',',$quants);

	$idslenght = count($ids);

    $codigoPHP ="";

	$total=0;
	for ($i=0; $i < $idslenght; $i++) {
		$stmt = $db->query('SELECT * FROM Producto WHERE id ='.$ids[$i]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$precio[$i] = $row['Precio'];
		$importe = $precio[$i]*$cants[$i];
		$total = $total+$importe;
	}

for ($i=0; $i < $idslenght; $i++) {
	$stmt = $db->query('SELECT * FROM Producto WHERE id ='.$ids[$i]);
	$db->query("SET NAMES 'utf8'");
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

   $price = $precio[$i]*$cants[$i];


    if($row["Categoria"]=="1"){ // Es paquete
        for($j=0; $j< $cants[$i]; $j++){ ///  for -- más de 1 paquete
            $quants= $row['quants'];
            $products = $row['products'];
            $ids_prod = explode(',',$products);
            $cants_prod = explode(',',$quants);
            $idslong = count($ids_prod);

            for ($k=0; $k < $idslong; $k++) { // Productos del paquete
               $consul = $db->query('SELECT * FROM Producto WHERE id ='.$ids_prod[$k]);
                $db->query("SET NAMES 'utf8'");
                $row_paq = $consul->fetch(PDO::FETCH_ASSOC);

                $stock = $row_paq["Stock"] - $cants_prod[$k];

                $db->query('
                    UPDATE Producto
                    SET Stock = "'.$stock.'"
                    WHERE id =
                    '.$row_paq["id"]);
            }
        }
     }

    $stock = $row["Stock"] - $cants[$i];
    $db->query('UPDATE Producto
                SET Stock = "'.$stock.'"
                WHERE id =
                '.$row["id"]);

    $codigoPHP = '<tr>
		<td><span>'.$row["Nombre"].'</span></td>
		<td><span></span>'.$row["Unidad"].'(s)</td>
		<td><span>'.$cants[$i].'</td>
		<td >$ <span>'.$price.'</span> MXN</td>
	    </tr>'.$codigoPHP;
}

$msg = null;
//if(isset($_POST["phpmailer"])){
    $nombre = "RED MACETA"; // htmlspecialchars($_POST["nombre"]);
    $email =  $_POST['stripeEmail'];   // htmlspecialchars($_POST["email"]);
   // $asunto = htmlspecialchars($_POST["asunto"]);
    $asunto= "Detalles de compra";

    $mensaje =  '
<!DOCTYPE html>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

      <style>
        body {word-wrap: break-word;font-family: "Open Sans", sans-serif;}
          .contenedor{
              -webkit-border-radius: 10px;
              -moz-border-radius: 10px;
              border-radius: 10px;
              box-shadow: 2px 2px 5px #999999;
              margin: auto;
              font-size: 14px;
          }
          .head{
              background-image: url(http://redmaceta.com/prueba/PHPMailer-master/imgs/patron.png);
              background-repeat:repeat-x;
              background-position:bottom;
              background-color: #DF5D5D;
              width: 100%;
              height: 300px;
              text-align: center;
          }
          .contenedor{
              word-wrap: break-word;
              width: 80%;
              position: relative;
              left: 5%;
              top: -200px;
              z-index: 10;
              padding: 10px;
              text-align: center;

          }
          .espan{
              display: block;
              background-color:limegreen;
              color: white;
              font-size: 14px;
              font-weight: bold;
          }
          h1{
              color: #DF5D5D;
          }
          img {
                max-width: 100%;
                height: auto;
            }
     </style>

</head>
<body>
<div class="head"> <img src="PHPMailer-master/imgs/logo_RM.png"> </div>
<div class="contenedor" style="
    word-wrap: break-word;">
    <img src="http://redmaceta.com/prueba/PHPMailer-master/imgs/foto_header.png" style="width:100%; height:auto;">
    <h1><strong>¡Saludos, responsable consumidor! </strong></h1>
<p style="
    word-wrap: break-word;">
Gracias por sembrar la diferencia a través de Red Maceta. Con tu compra no sólo
consumirás productos orgánicos, saludables y de la mejor calidad, también
apoyas la economía local y ayudas a mejorar los ingresos de los productores.

Para que no se te olvide, te dejamos una lista con las cosas que pediste: <br/> <br/>
           <table style="margin: 0 auto;">
                <thead>
                  <tr>
                      <th data-field="nombre" class="hide-on-small-only">Nombre</th>
                      <th data-field="cantidad">Unidad</th>
                      <th data-field="cantidad">Cantidad</th>
                      <th data-field="precio">Precio</th>
                  </tr>
                </thead>
                '.$codigoPHP.'
                </tbody>
            </table>

<br/>
<span style="font-size: 16px;font-weight: bolder;"> Código: '.$token.' </span>

<br/><br/>
<span class="espan">Recuerda que debes recogerlos este próximo 23 de julio a las 11:00 a.m. en el Huerto Roma Verde.</span> Nuestros productores  estarán muy contentos de platicar
contigo y entregarte tus deliciosos alimentos.

Sabemos que tienes GPS y podrás llegar, pero de todos modos te dejamos un mapa
con la ubicación de nuestra Primera Maceta para que lo tengas a la mano: <br/>
<img src="http://redmaceta.com/prueba/PHPMailer-master/imgs/icon_locacion.png"  height="auto" width="50" style="text-align:center;">


<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7525.949528598601!2d-99.15750565403415!3d19.413496303714215!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x503f6a2225f6d130!2sHuerto+Roma+Verde!5e0!3m2!1ses!2smx!4v1464117382705" width="100%" height="auto" frameborder="0" style="border:0" allowfullscreen>
<a href="https://www.google.com/maps/place/Huerto+Roma+Verde/@19.411189,-99.159614,14z/data=!4m5!3m4!1s0x0:0x503f6a2225f6d130!8m2!3d19.4111887!4d-99.1596136?hl=es-419"><img src="http://redmaceta.com/prueba/PHPMailer-master/imgs/mapa.jpg"  height="auto" width="100%" style="text-align:center;"></a>
</iframe>
 <br/>
 Calle Jalapa s/n, Cuauhtémoc,Roma Sur,06760 Ciudad de México, D.F.,México
<br/><br/>
 Los productores y Red Maceta estamos muy felices de que formes parte de nuestra
 comunidad. Tú puedes hacerla crecer compartiendo tu experiencia con tus amigos.

</p>
<img src="http://redmaceta.com/prueba/bulbasaur.jpg"  height="auto" width="420" style="text-align:center;">
<br/>
P.D.: Nos preocupa el planeta, por lo que no es necesario que imprimas este correo, sólo muestra tu código para recibir tus productos.
</div>

</body>
</html>';
    $adjunto = $_FILES["adjunto"];

    require "PHPMailer-master/PHPMailer-master/class.phpmailer.php";

    $mail = new PHPMailer;
    $mail->Host ="u81005991.1and1-data.host";
    $mail->From ="aloha@redmaceta.com";
    $mail->FromName =  "Red Maceta";
    $mail->Subject = $asunto;
    $mail->addAddress($email, $nombre);
    $mail->MsgHTML($mensaje);
    $mail->CharSet = 'UTF-8';

    if($adjunto["size"] > 0){
        $mail-> addAttachment($adjunto["tmp_name"], $adjunto["name"]);
    }
    if($mail->send()){
            $msg ="Enhorabuena, mensaje enviado a $email";
    }else{
        $msg ="Ha ocurrido un error";
    }
// }
     //////////// fin de mailing

     ?>
