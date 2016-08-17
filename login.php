<?php
session_start();

require_once "recaptchalib.php";
// tu clave secreta
$secret = "6LcWqB8TAAAAAGnW4DE6kC5STPH_2suSwGsXSDb8";

// respuesta vacía
$response = null;

// comprueba la clave secreta
$reCaptcha = new ReCaptcha($secret);

// si se detecta la respuesta como enviada
if ($_POST["g-recaptcha-response"]) {
$response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null && $response->success) {



if (isset($_POST['user']) && !empty($_POST['user'])
&&
isset($_POST['pass']) && !empty($_POST['pass']))
{

    $nom = $_POST['user'];
          $contra= $_POST['pass'];
    $pwd = md5($contra);


    $con = mysql_connect($host_name,$user_name,$password)or die ('Ha fallado la conexi&oacute;n: '.mysql_error());



    mysql_select_db($database)or die ('Error al seleccionar la Base de Datos: '.mysql_error()); 

    $query1 = mysql_query("select * from usuarios where user='".$nom."' and password='".$pwd."'");

    $Result1= mysql_fetch_row($query1);

    if(!$Result1){
        echo "<script>alert('Nombre o password Incorrecto, verifique...');window.location='login_user.php';</script>";
        session_destroy();
    }else{

    $_SESSION['user']=$_POST['user'];

    echo "<script>window.location='login_user.php';</script>";

    }
}else
{
	echo "<script type=\"text/javascript\">alert(\"Debes de ingresar tu Email y Contraseña para iniciar sesion...\");</script>";
echo "<script language=javascript>location.href=\"login_user.php\"; </script>";
}


}else{
	echo "<script>alert('Por favor, resuelva el captacha para verificar que no es un robot');window.location='login_user.php';</script>";
}
?>
