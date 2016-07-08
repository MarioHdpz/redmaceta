<?php
require_once 'init.php';

if (isset($_POST['stripeToken'])){
   
    $token = $_POST['stripeToken'];


	try{
		Stripe_Charge::create([
          "amount" => $_SESSION['total'],
          "currency" => "mxn",
          "source" => $token, // obtained with Stripe.js
          "description" => $_POST['stripeEmail'].", ".$token
        ]);

        $email= $_POST["stripeEmail"];
        
		$db->query('
			UPDATE bolsa
			SET email = "'.$email.'"
			WHERE id =
			'.$_SESSION["user"]);
        
        $db->query('
			UPDATE bolsa
			SET pago = 1
			WHERE id =
			'.$_SESSION["user"]);
        
        $db->query('
			UPDATE bolsa
			SET token = "'.$token.'"
			WHERE id =
			'.$_SESSION["user"]);
        
        echo "success";
        include 'mailing.php'; // envia correo c/token
        
        
	} catch(Stripe_CardError $e){
        

	}

    unset($_SESSION['total']);

   ///session_destroy();
}




?>
