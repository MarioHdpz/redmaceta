
    document.getElementById('boton_buscar').onclick = function() {
    var search = document.getElementById('busqueda').value;
    loadgaleria(search);
    }

    document.getElementById('formulario').addEventListener('submit', function(e) {
    loadgaleria(document.getElementById('busqueda').value);
    e.preventDefault();
    }, false);

    total();

    function loadgaleria(str) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                          document.getElementById("galeria").innerHTML = xhttp.responseText;
                          $('.modal-trigger').leanModal();
                          $('.tooltipped').tooltip({delay: 50});
                        }
                };
                xhttp.open("GET", "fichas.php?q=" + str, true);
                xhttp.send();
      }
      function categoria(str) {
          document.getElementById(str).style.color = "blue";
          
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                          document.getElementById("galeria").innerHTML = xhttp.responseText;
                          $('.modal-trigger').leanModal();
                          $('.tooltipped').tooltip({delay: 50});
                        }
                };
                xhttp.open("GET", "fichas.php?cat=" + str, true);
                xhttp.send();
      }
      var paramstr = window.location.search.substr(1);
      var paramarr = paramstr.split ("&");
      var params = {};
      for ( var i = 0; i < paramarr.length; i++) {
      var tmparr = paramarr[i].split("=");
      params[tmparr[0]] = tmparr[1];
      }
      if (params['cat']) {
      categoria(params['cat']);
      }
      else if (params['bsq']) {
      loadgaleria(params['bsq']);
      }
      else {
      loadgaleria("");
    }
      /*CARRITO*/
      function cantidad(id,n){
        if(n == 1){
          document.getElementById("cantidad"+id).stepUp();
        }
        else{
          document.getElementById("cantidad"+id).stepDown();
        }
        importe(id);
      }
      function agregar(str){
        var flag = 0;
        var ids = document.getElementsByClassName("idbolsa");
        for (var i = 0; i < ids.length; i++) {
          if (ids[i].innerText==str) {
              cantidad(str,1);
              Materialize.toast('Otro más', 4000,'tostada');
              return;
          }
        }
        var xhttp = new XMLHttpRequest();
        var id = [];
        var cantidades = [];
        var x = document.getElementsByClassName("quantity");
        for (var i = 0; i < x.length; i++) {
          cantidades[i] = x[i].value;
          id[i] = x[i].id;
        }
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                      document.getElementById("cont_bol").innerHTML += xhttp.responseText;
                      for (var i = 0; i < cantidades.length; i++) {
                        document.getElementById(id[i]).value = cantidades[i];
                      }
                      total();
                      Materialize.toast('Agregado', 4000,'tostada');
                    }
            };
            xhttp.open("GET", "bolsa.php?b=" + str, true);
            xhttp.send();
      }
      function agotado(){
              Materialize.toast('Producto Agotado! :/', 4000,'tostada');
        }
 function espere(){
              Materialize.toast('Espera la siguiente maceta.', 4000,'tostada');
        }
      function quitar(rowid)
      {
          var row = document.getElementById(rowid);
          row.parentNode.removeChild(row);
          total();
      }

      function importe(id)
      {
        str="importe"+id;
        a="cantidad"+id;
        b="precio"+id;
        document.getElementById(str).innerHTML =  document.getElementById(a).value * document.getElementById(b).innerHTML;
        document.getElementById(a).innerHTML = document.getElementById(a).value;
        total();
      }
      function total(){
        var tot=0;
        var x = document.getElementsByClassName("importe");
        for (var i = 0; i < x.length; i++) {
          tot += parseFloat(x[i].innerText);
        }
        document.getElementById("total").innerHTML =tot;
        return tot;
      }
      function pagar(){
        var products_bolsa=[];
        var cant=[];
        var x = document.getElementsByClassName("idbolsa");
        for (var i = 0; i < x.length; i++) {
          products_bolsa[i] = parseInt(x[i].innerText);

        }
        var y = document.getElementsByClassName("quantity");
        for (var i = 0; i < y.length; i++) {
          cant[i] = parseInt(y[i].value);
        }
        lista_str = products_bolsa.toString();
        cant_str = cant.toString();
        //SEND POST
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
              document.getElementById("tabla_confirmar").innerHTML = xhttp.responseText;
            }
            };
            xhttp.open("GET", "continuar.php?products="+lista_str+"&quants="+cant_str, true);
            xhttp.send();
        //ABRIR MODAL LOGIN
        $('#login').openModal();
      }
      function checkpass(){
        var pass1 = document.getElementById('password1');
        var pass2 = document.getElementById('password2');
        if(pass1.value == pass2.value){
          pass2.className = "validation valid";
        } else{
          pass2.className = "validation invalid";
        }
      }
      function activar_reg(){
        if (document.getElementById('termcheck').checked) {
          document.getElementById('estraip').className = "";
          document.getElementById('estraip').className = "modal-action modal-close waves-effect waves-red btn green";
        }
        else {
          document.getElementById('estraip').className = "";
          document.getElementById('estraip').className = "btn disabled green";
        }
      }
      function hoverimg(x){
         x.src="img/png/btn_canasta_over.png";
      }
      function mouseaway(x){
          x.src = "img/png/btn_canasta_compra.png";
      }
      function press(x){
          x.src = "img/png/btn_canasta_press.png";
      }
