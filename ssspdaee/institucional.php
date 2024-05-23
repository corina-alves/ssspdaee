<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>DAEE - Portal Intranet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/logo/logo.png">
     <!--css-->
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="estilo/style.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link href="css/jquery-ui-1.10.4.custom.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
       <!--JAVA SCRIPT-->
    <script src="js/popper.min.js"  crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="elastislide/js/jquery.elastislide.js"></script>
    <script src="js/jquery.liquidcarousel.pack.js"></script><!--PMGP -->
    <script src="colorbox/jquery.colorbox-min.js"></script>
    <script defer src="js/jquery.flexslider-min.js"></script>
  <!-- jquery da busca estilizada -->
    <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
    <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="jqueryui/style.css">


    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      $(window).scroll(function() {    
          var scroll = $(window).scrollTop();

          if (scroll >= 100) {
              $(".top-nav").addClass("light-header");
          } else {
              $(".top-nav").removeClass("light-header");
          }
      });

      $(function(){
      var theYear = new Date().getFullYear();
      $('#year').html(theYear);
      });

    </script>
    
</head>
<body>
<?php include"navTop.php";?>

<!-- Carassel top-->
<!-- <section class="intro carousel slide bg-overlay-light h-auto" id="carossel">
    <div class="carousel-inner" role="listbox" style="height:45vh;">
      <div class="carousel-item active">
           <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="assets/mp4/ponte_nova.mp4" type="video/mp4" /></video>
        <div class="carousel-caption ">
        </div>
      </div>
    </div>
</section> -->
  <section id="institucional" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Institucional<span>.</span></h1>
          <!-- <h2>Segurança das barragens</h2> -->
        </div>
      </div>

      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-store-line"></i>
            <h3><a href="cada.php">CADA</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line"></i>
            <h3><a href="formularios_inst.php">Formulários</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line"></i>
            <h3><a href="atribuicao_principais.php">Atribuições</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-calendar-todo-line"></i>
            <h3><a href="legislacao.php">Legislação</a></h3>
          </div>
        </div>
  
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-calendar-todo-line"></i>
            <h3><a href="legislacao.php">Diretoria de Apoio</a></h3>
          </div>
        </div>
         <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-calendar-todo-line"></i>
            <h3><a href="legislacao.php">Consultoria Jurídica</a></h3>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End hidrico -->
<section class="info-section h-auto page-institucional">
<div class="container"> 
<!--   <h2>Institucional</h2>
 -->  <div class="row">
    <div class="col-sm-9">
        <h5 class="card-title"><strong>Missão</strong></h5><hr/>
            <p class="card-text">O DAEE existe para assegurar o desenvolvimento integral e sustentável das bacias hidrográficas no Estado de São Paulo, atendendo às necessidades dos municípios e da sociedade como um todo, planejando, executando, operando e controlando, de forma integrada, participativa e descentralizada:</p>
            <p class="card-text"><i class="fas fa-check-double"></i>  A utilização dos recursos hídricos;</p>
            <p class="card-text"><i class="fas fa-check-double"></i> A infra-estrutura hídrica;</p>
            <p class="card-text"><i class="fas fa-check-double"></i> A infra-estrutura de saneamento, em caráter supletivo;</p>
            <p class="card-text"><i class="fas fa-check-double"></i> A gestão dos efeitos dos eventos críticos.</p>
    </div>
   
    <div class="col-sm-3">
      
            <a href="sic.php" class="text-center">
              <p><img src="img/logo/logoSIC.png" class="img-fluid" width="70%"></p>
              <p>A Lei de Acesso à Informação, instituída pela Lei Federal nº 12.527... </p>
              <p class="text-center">  <a href="sic.php" type="button" class="btn btn-primary">Leia mais</a></p> 
            </a>
    
           
          <a href="ouvidoria.php" class="text-center">
              <p><img src="img/logo/ouvidoria.png" class="img-fluid" width="70%"></p></p>
              <p>O Ouvidor tem como função defender os direitos de manifestação do cidadão perante o orgão do setor público... </p>
              <p class="text-center"><a href="ouvidoria.php" type="button" class="btn btn-primary">Leia mais</a></p> 
          </a>
  
    </div>

</div>
</div>
</section>
<footer>
  <?php include("footer.php") ?>
</footer>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-ui.js"></script>



</body>
</html>