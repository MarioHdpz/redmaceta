<?

require_once 'init.php';
require_once 'conex.php';

$token = "tok_18ILOfIWJMGOT41RFti7RNLC";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query("SET NAMES 'utf8'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$consul = "SELECT * FROM `bolsa` WHERE `pago`= 1 ORDER BY `id` ASC";
      $result2 = mysqli_query($conn, $consul);
    while($row2 = mysqli_fetch_assoc($result2)){   //// WHILE PAGADOS

$sql = "SELECT * FROM bolsa WHERE id =".$row2["id"];
      $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
            $quants= $row['quants'];
            $products = $row['products'];
            $token = $row['token'];
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


    //$email = $row2["email"]; ////
        $email= "";


    //$email =  $_POST['stripeEmail'];   // htmlspecialchars($_POST["email"]);
   // $asunto = htmlspecialchars($_POST["asunto"]);
    $asunto= "Recordatorio Domingo 5 Junio";

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
              font-size: 15px;
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
              text-align: left;

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
    <img src="http://redmaceta.com/prueba/PHPMailer-master/imgs/Mail_seguim.png" style="width:100%; height:auto;">
    <h1><strong> ¡Hola responsable consumidor! </strong></h1>

      <br/>



Nos gustaría informarte que la fecha de nuestra primera Maceta ¡está muy cerca!     <br/>

Nuestros productores ya están trabajando en tu pedido y lo tendrán muy fresco para el día del
 evento. <br/><br/>

Este 05 de junio podrás recoger tus productos de la mano del productor de las 10:00 am a las    <br/>
 12:00 pm. ¡Si no puedes asistir en este horario no te preocupes! El equipo de Red Maceta    <br/>
 guardará tu pedido hasta que finalice el evento a las 15:00 pm.    <br/><br/>


Tu compra es un pase de entrada a cualquiera de nuestras actividades, ¿te gustaría formar parte
 de alguna de ellas? Responde a este correo y te garantizamos la entrada a tu actividad
 favorita.    <br/><br/>


10:00 am - Inauguración - Plática "¿Qué es Red Maceta? Consumo Colaborativo"
    <br/><span style="margin-left:20px;"><strong>Comienza la entrega de productos de la mano de nuestros productores</strong></span><br/>

11:00 am - Clase de yoga - "Llénate de energía sólo necesitas traer tu tapete"    <br/>

12:00 pm - Taller de "Bolitas de Vida" - con Huerto Roma Verde    <br/>

    <span style="margin-left:20px;"> <strong>Termina la entrega de productos de la mano de productores</strong></span><br/>

13:00 pm - Curso de Slackline (cuerda foja) Básico    <br/>

14:00 pm - Elabora un instrumento con Orquesta Basura    <br/>
           <span style="margin-left:20px;">- Cocina colectiva con Chef. Roberto Lozano (Elabora tu alimento a partir de los sobrantes de los productores)</span><br/>

15:00 pm - Presentación del Coro de Moscas con Orquesta Basura    <br/>

    <span style="margin-left:20px;">   - Conferencia sobre Alimentación Sustentable y Generación de Redes</span><br/><br/>


Nuestros productores y el equipo de Red Maceta estamos más que felices de poder conocerte.     <br/><br/>



Sigamos #SembrandoLaDiferencia
    <br/><br/>
<img src="http://redmaceta.com/prueba/PHPMailer-master/imgs/brief_junio_final.png"  height="auto" width="100%" style="text-align:center;">
<br/><br/>
    Para que no te nos pierdas, te dejamos un mapa y el programa de nuestra Maceta:
    <br/>
    <br/>

<a href="https://www.google.com/maps/place/Huerto+Roma+Verde/@19.411189,-99.159614,14z/data=!4m5!3m4!1s0x0:0x503f6a2225f6d130!8m2!3d19.4111887!4d-99.1596136?hl=es-419"><img src="http://redmaceta.com/prueba/PHPMailer-master/imgs/mapita-02.png"  height="auto" width="100%" style="text-align:center;"></a>

 <br/>
 Calle Jalapa s/n, Cuauhtémoc,Roma Sur,06760 Ciudad de México, D.F.,México
<br/><br/>


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
    $mail->AddCC('hugui_95@hotmail.com');

    $mail->MsgHTML($mensaje);
    $mail->CharSet = 'UTF-8';

    if($adjunto["size"] > 0){
        $mail-> addAttachment($adjunto["tmp_name"], $adjunto["name"]);
    }
    if($mail->send()){
            $msg ="Enhorabuena mensaje enviado a $email";
    }else{
        $msg ="ah ocurrido un error";
    }
}
    echo $msg;


?>
