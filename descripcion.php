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
	<h1 class="title">Descripción de Juegos</h1>
</header>

  
</div>
<article class="content" data-role="content" style="background:url('../imagenes/fondo2.jpg');color:white; 
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
			
				<div class="aa-product-catg-body">
                       <ul class="aa-product-catg">
                        <?php
                        
                       
                        
                        foreach ($variable as $value) 
                          {
                            
                            echo '<!-- start single product item -->
                                      <li>
                                        <figure>
                                            <figcaption>
                                            <h4 class="aa-product-title"><a href="#">'.$value->nombre.'</a></h4>
                                            <p class="aa-product-descrip">'.$value->descripcion.'</p>
                                           
                                          
                                          </figcaption>
                                        </figure>                         
                                        <!-- product badge -->
                                        </li>';
                          }
                        ?>
                </ul>
              </div>

			 
			</article>





<div class="bar bar-tab ">
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
	<a href="valores.php" class="tab-item">
		<span class="tab-label">
			Valores
		</span>
	</a>
  <a href="#" class="tab-item">
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