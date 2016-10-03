<?php
    $productosURL = "http://pymesv.com/datos05w/gamestoreapi/productos/lista";
    $variable=file_get_contents($productosURL);
    $variable=json_decode($variable);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>GameStoreIP</title>
  <link rel="stylesheet" href="css/ratchet.min.css">
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="bar bar-nav">
  <h1 class="title">Valores</h1>
</header>


<article class="content" data-role="content" style="background:url('../imagenes/fondo1.jpg');color:white; 
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
      
       <header data-role="header">
        <h1>Valores</h1>
      </header>
      <article data-role="content">
        <br>
        <br>
        
        <p>
          RESPETO: Buscamos constantemente mantener la armonía en la relación con compañeros de trabajo, clientes y proveedores. </p>
          <br>
          <p>LEALTAD: Tenemos un fuerte compromiso y mostramos fidelidad. Hacemos con respeto nuestras responsabilidades y manifestamos confidencialidad en los aconteceres de la Organización.</p>
          <br> 
          <p>HONESTIDAD: Siendo íntegros para recibir a cambio la confianza de clientes internos y externos. </p>
          <br>
          <p>RESPONSABILIDAD: Cumplimos de manera oportuna y precisa con las actividades propias de cada puesto para escalar y llegar a las metas fijadas.</p> 
          <br>
          <p>COMPROMISO: Nos dedicamos a llegar al objetivo establecido y cumplimos responsablemente con las actividades propias del puesto. </p>
          <br>
          <p>INNOVADOR: Promovemos el cambio permanente en nuestros procesos, productos y servicios como el medio más importante para estar cumpliendo las expectativas de nuestros clientes.</p>
         
          <br>
      </article>


<div class="bar bar-tab">
  <a href="index.php" class="tab-item">
    <span class="icon icon-bars"></span>
    <span class="tab-label">
      Home
    </span>
  </a>
  <a href="vision.php" class="tab-item">
    <span class="tab-label">
      Visión
    </span>
  </a>
  <a href="mision.php" class="tab-item">
    <span class="tab-label">
      Misión
    </span>
  </a>
  <a href="#" class="tab-item">
    <span class="tab-label">
      Valores
    </span>
  </a>
  <a href="descripcion.php" class="tab-item">
    <span class="tab-label">
      Descripción
    </span>
  </a>
</div>  


<script src="ratchet.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>

  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="resources/js/custom.js"></script>
  <script>
    $(document).ready(function () {

      var total=0;
    $(".aa-add-card-btn").on("click",function(e){
    e.preventDefault();
    var _data = $(this).attr("data");
    console.log(_data);
    var jsonData = JSON.parse(_data);
    if(jsonData.client!==null){
        //ajax request.... 
    $.ajax({
      type: "POST",
      url: 'http://pymesv.com/datos05w/gamestoreapi/agregar_carrito/lista',
      data: {jsonData: jsonData},
      dataType: "json",
      success: function(data)
      {
    $('.error').html(data); 
        //add too checkout
    $(".aa-cartbox-summary ul").append('<li><a class="aa-cartbox-img" href="#"><img src="http://pymesv.com/datos05w/'+jsonData.imagen+'" alt="img">'+
                          '</a>  <div class="aa-cartbox-info">'+
                          '<h4><a href="#">'+jsonData.nombre+'</a></h4>'+
                          '<p>1 x '+jsonData.precio+'</p>'+
                        '</div>'+
                      '</li>');
    total=parseInt(total)+parseInt(jsonData.precio);
    $('.aa-cartbox-total-price').text('$'+total);
      },
      error: function(data)
      {
      $(".aa-cartbox-summary ul").append('<li><a class="aa-cartbox-img" href="#"><img src="http://pymesv.com/datos05w/'+jsonData.imagen+'" alt="img">'+
                          '</a>  <div class="aa-cartbox-info">'+
                          '<h4><a href="#">'+jsonData.nombre+'</a></h4>'+
                          '<p>1 x '+jsonData.precio+'</p>'+
                        '</div>'+
                      '</li>');
    $('.error').html(data);
      console.log(data);
        console.log("error");
      }

    });
    }
       
    });

    });
  </script>



</body>
</html>