<?php
require_once 'init.php';
?>
<!DOCTYPE html>
<html>
    <head>
      <meta http-equiv="content-Type" content="text/html; ISO-8859-1">
      <meta name="DC.Language" SCHEME="RFC1766" content="Spanish">
      <meta name="AUTHOR" content="Equipo Red Maceta">
      <meta name="REPLY-TO" content="aloha@redmaceta.com">
      <link rev="made" href="mailto:aloha@redmaceta.com">
      <link rel=”image_src” href="https://www.redmaceta.com/img/png/logorojo.png" />
      <meta property="og:image" content="https://www.redmaceta.com/img/png/fb1.png"/>
      <meta property="og:image" content="https://www.redmaceta.com/img/png/fb2.png"/>
      <meta property="og:image" content="https://www.redmaceta.com/img/png/fb3.png"/>
      <meta name="DESCRIPTION" content="Es una plataforma que brinda productos locales de primera calidad. Además los consumidores pueden recibirlos de la mano de los productores.">
      <meta name="KEYWORDS" content="productos locales,pequeños productores,comercio local,organico">
      <meta name="Resource-type" content="Catalog">
      <meta name="DateCreated" content="Mon, 16 May 2016 00:00:00 GMT-6">
      <meta name="robots" content="ALL">
      <meta http-equiv="content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
      <title>Red Maceta</title>
      <link rel="icon" href="img/favicon.png" type="image/png">
      <!-- CSS  -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800italic,400italic,600,600italic,700,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <link href="css/materialize_custom.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <script src='https://www.google.com/recaptcha/api.js'></script>
      <script src="https://checkout.stripe.com/checkout.js"></script>
    </head>
    <body>
    <!--Navegador-->
    <div class="navbar-fixed green">
      <nav class="green">
      <div class="nav-wrapper">
        <a href="index.html" class="brand-logo"><img src="img/png/red.png" alt="" /></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <div class="white-text hide-on-med-and-down whatsapp"><img style="height: 1em; margin-bottom: -3px;" src="img/png/whatsapp.png" alt="" />  55 24 12 18 98</div>
        <ul class="right hide-on-med-and-down">
          <li><a href="index.html">Inicio</a></li>
          <li><a href="funcionamiento.html">Así funciona</a></li>
          <!--<li><a href="conocenos.html">¡Conócenos!</a></li>-->
          <li><a href="index.html#productores">Soy productor</a></li>
          <li class="active"><a href="#">Llévele</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="index.html">Home</a></li>
          <li><a href="funcionamiento.html">Así funciona</a></li>
          <!--<li><a href="conocenos.html">¡Conócenos!</a></li>-->
          <li><a href="index.html#productores">Soy productor</a></li>
          <li class="active"><a href="#">Llévele</a></li>
        </ul>
      </div>
      </nav>
    </div>
    <!--/Navegador-->
    <!-- Inicio -->
    <div class="inicio">
      <!--Encabezado-->
      <div class="encabezado conocenos green valign-wrapper">
        <div class="quees2 encabezado valign-wrapper">
          <div class="container center-align white-text valign">
              <h2>
                Espera nuestra siguiente Maceta para comprar.
              </h2>
              <br>
                <a href="#detalles" class="modal-trigger waves-effect waves-teal btn red">Más detalles</a>
          </div>
        </div>
        <div class="slider center-align">
          <ul class="slides">
                 <li>
                  <img src="img/jpgs/slider1.jpg">
                </li>
                <li>
                  <img src="img/jpgs/slider2.jpg">
                </li>
                <li>
                  <img src="img/jpgs/slider3.jpg">
                </li>
                <li>
                  <img src="img/jpgs/slider4.jpg">
                </li>
                <li>
                  <img src="img/jpgs/slider5.jpg">
                </li>
          </ul>
        </div>

      </div>

      <!--/Encabezado-->

      <!--Galeria-->
      <div class="green galeria">
      <br><br>
      <div class="container">
        <form id="formulario" class="row">
        <div class="input-field white col l11 m11 s12 center-align">
          <input id="busqueda" name="busqueda" placeholder="aguacate, pollo, huevo, duraznos, tortilla" type="text" class="validate">
        </div>
        <div class="col l1 m1 s12 center-align">
          <a id="boton_buscar" class="btn-floating btn-large waves-effect waves-light red" ><i class="material-icons">search</i></a>
        </form>
        </div>
      </div>
      <div class="categorias center">
          <a id="1" onclick="categoria(this.id)"><img src="img/png/categoria1_paqt.png"></a>
          <a id="2" onclick="categoria(this.id)"><img src="img/png/categoria6_horneados.png"></a>
          <a id="3" onclick="categoria(this.id)"><img src="img/png/categoria3_fyv.png"></a>
          <a id="5" onclick="categoria(this.id)"><img src="img/png/categoria4_bebidas.png"></a>
          <a id="6" onclick="categoria(this.id)"><img src="img/png/categoria5_derivadosanim.png" ></a>
          <a id="7" onclick="categoria(this.id)"><img src="img/png/categoria7_condim.png"></a>
          <a id="8" onclick="categoria(this.id)"><img src="img/png/categoria8_tradi.png"></a>
          <a id="4" onclick="categoria(this.id)"><img src="img/png/categoria4_todos.png"></a>
      </div>
      <!-- Contenido galería-->
      <div id="galeria" class="container center-align green">
        <div id="overlay" class="green">
            <div class='oops white-text'>Tus productos locales se estan cargando...</div>
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>
      </div>
      <!-- /Contenido galería-->

      <!--Numeración
      <div class="paginas center-align">
              <ul class="pagination text-white">
              <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
              <li class="active"><a href="#!">1</a></li>
              <li class="waves-effect"><a href="#!">2</a></li>
              <li class="waves-effect"><a href="#!">3</a></li>
              <li class="waves-effect"><a href="#!">4</a></li>
              <li class="waves-effect"><a href="#!">5</a></li>
              <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
              </ul>
      </div>
      /Numeración-->
      </div>
      <!--/Galeria-->
      <!--Canasta-->
       <!-- Modal Trigger -->
       <div class="canasta">
       <a class="modal-trigger" href="#canasta"><img src="img/png/btn_canasta_ir.png" class="responsive-img waves-effect waves-light" alt="" /></a>
       <h6 class="white-text">Ver canasta</h6>
       </div>
       <!-- Modal Structure -->
       <div id="canasta" class="modal bottom-sheet">
         <div class="modal-content red-text">
           <h4>Mi canasta</h4>
           <p>
             NOTAS:
           <br>
            - Espera nuestra siguiente Maceta para ayudar a sembrar la diferencia.
            <!-- -Compra mínima de $30 MXN
           <br>
             -Recuerda que tu compra la podrás recoger este 5 de Junio en el Huerto Roma Verde.-->
           </p>
           <table>
                <thead>
                  <tr>
                      <th data-field="id">Producto</th>
                      <th data-field="nombre" class="hide-on-small-only">Nombre</th>
                      <th data-field="precio">Precio</th>
                      <th data-field="cantidad">Cantidad</th>
                      <th data-field="importe">Importe</th>
                      <th data-field="importe">Eliminar</th>
                  </tr>
                </thead>
                <tbody id="cont_bol">
                </tbody>
            </table>
         </div>

         <div class="modal-footer">
           <div class="total red-text">
             TOTAL: $ <span id="total" ></span> MXN
           </div>
           <button id="continuar" class="modal-action modal-close waves-effect waves-red btn red" href="#login" onclick="pagar()">CONTINUAR</button>
         </div>
       </div>

      <!--/Canasta-->
      <!--Login-->
       <!-- Modal Trigger -->
       <!-- El modal se activa cuando se va a pagar -->
       <!-- Modal Structure -->
       <div id="login" class="modal login" style="max-height: 85%;">
         <div class="modal-content">
           <h4 class="red-text">Confirmar pedido</h4>
            <div class="row">
              <form class="" action="premium_charge.php" method="post">
                <div class="row">
                  <p>
                    Estás a un paso de sembrar la diferencia, este es tu pedido.
                  </p>
                </div>
                <div class="row">
                  <table>
                       <thead>
                         <tr>
                             <th data-field="id">Producto</th>
                             <th data-field="cantidad">Cantidad</th>
                             <th data-field="cantidad">Unidad</th>
                             <th data-field="importe">Importe</th>
                         </tr>
                       </thead>
                       <tbody id="tabla_confirmar">
                       </tbody>
                   </table>
                </div>
                <p>
                  <input type="checkbox" id="termcheck" onclick="activar_reg()"/>
                  <label for="termcheck">Acepto <a href="/legal.html" target="_blank">Términos y Condiciones</a></label>
                </p>
              <button type="submit" id="estraip" class="btn disabled red">Pagar</button>
              </form>
            </div>
         </div>
       </div>

      <!--/Login-->
      <!--Registro-->
       <!-- Modal Trigger -->
       <!-- El modal se activa cuando se va a pagar -->
       <!-- Modal Structure -->
       <div id="exito" class="modal login">
         <div class="modal-content">
              <h4 class="red-text">¡Gracias por sembrar la diferencia!</h4>
              <br/>
              <p style="text-align: justify;">En breve recibirás un correo con la confirmación de tu compra (si no está en tu bandeja principal revisa en Spam, por si acaso).<br> Nuestros productores estarán felices de entregarte tus alimentos en nuestra próxima Maceta. <br>Te invitamos a seguir apoyando la economía local compartiendo Red Maceta con tus amigos.
                <br>En caso de que no te llegue la confirmación, avísanos a <a href="mailto:aloha@redmaceta.com">aloha@redmaceta.com</a> para solucionarlo.
              </p>
              <br>
              <a style="text-align: center;" href="#!" onClick="window.location.reload()" class=" modal-action modal-close waves-effect waves-green btn green">¡Entendido!</a>
        </div>
      <!--/Login-->
      </div>
    <!-- Procesando pago -->
    <!-- Modal Structure -->
    <div id="procesando" class="modal login">
      <div class="modal-content center-align">
         <h4 class="red-text">Estamos procesando tu pago...</h4>
         <div  class="preloader-wrapper active">
           <div class="spinner-layer spinner-red-only">
             <div class="circle-clipper left">
               <div class="circle"></div>
             </div><div class="gap-patch">
               <div class="circle"></div>
             </div><div class="circle-clipper right">
               <div class="circle"></div>
             </div>
           </div>
         </div>
     </div>
   </div>
   <!-- /Procesando pago -->
   <!-- /Modal Structure -->
   <!-- Pago fallido -->
   <!-- Modal Structure -->
   <div id="pago_fail" class="modal login">
     <div class="modal-content">
       <h4 class="red-text">Oops, tuvimos problemas con tu pago</h4>
      <p>
        ¿Tienes otra opción de pago?
        <br>
        Si continuas teniendo problemas por favor comunícate con nosotros a <a href="mailto:aloha@redmaceta.com">aloha@redmaceta.com</a> para solucionarlo.
      </p>
    </div>
  </div>
  <!-- /Pago fallido -->
  <!-- /Modal Structure -->
  <!-- Pago fallido -->
  <!-- Modal Structure -->
      <div id="detalles" class="modal login" style="max-height: 90%;">
        <div class="modal-content">
          <h4 class="red-text">Nuestra Maceta</h4>
         <p style="text-align: justify;">
           Los productos que compres aquí los podrás recoger en alguna de nuestras Macetas.
           <br>
           Una Maceta es un evento dedicado a la comunidad que funciona como punto de distribución.
           <br>
           ¿Te gustaría hacer uno en tu comunidad? Escríbenos a <a href="mailto:aloha@redmaceta.com">aloha@redmaceta.com</a>
           <!--<span class="hide-on-large-only red-text"><a href="https://www.google.com.mx/maps/place/Huerto+Roma+Verde/@19.4111937,-99.1618023,17z/data=!3m1!4b1!4m5!3m4!1s0x85d1ff3daa4ba98d:0x503f6a2225f6d130!8m2!3d19.4111887!4d-99.1596136"><i class="material-icons">pin_drop</i></a></span>
           <br>
        </p>
        <p>
         <iframe style="display:block; margin: 0 auto;" class="hide-on-med-and-down" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.028055484004!2d-99.16180228540216!3d19.411193746395448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff3daa4ba98d%3A0x503f6a2225f6d130!2sHuerto+Roma+Verde!5e0!3m2!1ses!2smx!4v1464818257354" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
       -->
        </p>
        <p style="text-align: justify;">
          <span class="red-text" style="font-weight: 600;">¿Por qué comprar antes?</span>
          <br>
          La preventa ayuda al productor a saber cuánto cosechar y evita el desperdicio de comida. Además puedes estar seguro de que ese producto ha sido cosechado para ti.
        </p>
        <p style="text-align: center;">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn green">¡Entendido!</a>
        </p>
       </div>
     </div>
 <!-- /Pago fallido -->
 <!-- Pago fallido -->
 <!-- Modal Structure -->
     <div id="cerrado" class="modal login" style="max-height: 90%;">
       <div class="modal-content">
         <h4 class="red-text">¡Oops, llegaste un poco tarde!</h4>
        <p style="text-align: justify;">
          Nuestra tienda está cerrada. De cualquier manera, te invitamos a que conozcas a los productos y a los productores. Síguenos en redes para enterarte de la siguiente Maceta. ¡Gracias por ayudarnos a sembrar la diferencia!
          <!--<span class="hide-on-large-only red-text"><a href="https://www.google.com.mx/maps/place/Huerto+Roma+Verde/@19.4111937,-99.1618023,17z/data=!3m1!4b1!4m5!3m4!1s0x85d1ff3daa4ba98d:0x503f6a2225f6d130!8m2!3d19.4111887!4d-99.1596136"><i class="material-icons">pin_drop</i></a></span>
          <br>
       </p>
       <p>
        <iframe style="display:block; margin: 0 auto;" class="hide-on-med-and-down" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.028055484004!2d-99.16180228540216!3d19.411193746395448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff3daa4ba98d%3A0x503f6a2225f6d130!2sHuerto+Roma+Verde!5e0!3m2!1ses!2smx!4v1464818257354" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        -->
       </p>
       <p style="text-align: center;">
         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn green">¡Entendido!</a>
       </p>
      </div>
    </div>
 <!-- /Pago fallido -->


 <!-- /Inicio -->


    <footer class="page-footer green">
        <div class="row">
              <div class="col l4 push-l4 m4 push-m4 s12">
                <img class="img-responsive" src="img/png/ilus_red.png" alt="Únete" />
                <p class="white-text">Únete a la red</p>
              </div>
              <div class="col l4 pull-l4 pull-m4 m4 s12">
                <a href="https://www.youtube.com/channel/UCgfJfuLthCYz6ojpH8xHq1g" target="_blank"><img class="img-responsive" src="img/png/redes_youtube.png" alt="Canal de youtube" /></a>
                <a href="https://www.youtube.com/channel/UCgfJfuLthCYz6ojpH8xHq1g" target="_blank"><img class="img-responsive" src="img/png/redes_insta.png" alt="Instagram" /></a>
                <a href="https://www.facebook.com/redmaceta/?fref=ts" target="_blank"><img class="img-responsive" src="img/png/redes_face.png" alt="Facebook" /></a>
                <a href="https://twitter.com/RedMaceta" target="_blank"><img class="img-responsive" src="img/png/redes_twitter.png" alt="Twitter" /></a>
              </div>
              <div class="col l4 m4 s12 patron">
              </div>
        </div>
      <div class="footer-copyright white">
        <div class="container center-align term">
          <h6 class="black-text"><a href="legal.html">Aviso de privacidad</a> | <a href="legal.html">Términos y condiciones</a></h6>
        </div>
      </div>
    </footer>
    <!--/Footer-->
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/galeria.js"></script>
    <script src="https://checkout.stripe.com/v2/checkout.js"></script>
    <script>
    $('#cerrado').openModal({
       dismissible: false, // Modal can be dismissed by clicking outside of the modal
         });
      var handler = StripeCheckout.configure({
        //key: 'pk_test_7Hli1EdDwN0BMP3VI4t4Ytzb',
        key: 'pk_live_7zVF7HnpsFQsamuOlZCKMruB',
        image: 'img/png/logorojo.png',
        locale: 'auto',
        billingAddress: 'true',
        token: function(token) {
          console.log(token);
          var stripeToken = token.id;
          var stripeEmail = token.email;
          $.post(
              "/premium_charge.php",
              { stripeToken: token.id, stripeEmail: stripeEmail},
              function(data) {
                if (data == 'success') {
                $('#procesando').closeModal();
                $('#exito').openModal({
                   dismissible: false, // Modal can be dismissed by clicking outside of the modal
                     });
                      }
                      else {
                        $('#procesando').closeModal();
                        $('#pago_fail').openModal();
                      }
              }
          );

        }
      });

      $('#estraip').on('click', function(e) {
        $('#login').closeModal();
        $('#procesando').openModal();
        // Open Checkout with further options:
        handler.open({
          name: 'Red Maceta',
          description: 'Siembra la diferencia',
          currency: "MXN",
          amount: total()*100
        });
        e.preventDefault();
      });

      // Close Checkout on page navigation:
      $(window).on('popstate', function() {
        handler.close();
      });
    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-77722516-1', 'auto');
      ga('send', 'pageview');
    </script>
    <script src="js/init.js"></script>
    </body>
</html>
