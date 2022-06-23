<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Loja de Carros - Patinhas Cars">
  <meta name="author" content="Raff Evald">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Loja de Carros - Patinhas Cars</title>
</head>

<?php
  session_start();
  include "UI_include.php";
  include INC_DIR . 'header.inc';
?>

<body>
  <div class="container">
    <?php
    include INC_DIR . 'menu.inc';
    ?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 3"></button>

  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./assets/imagens/1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption text-start">
        <h1>CONFORTO E <br>SEGURANÇA</h1>
        <p>Há mais de 20 anos no mercado, <br>somos especialistas no setor de <br> vendas de carros.</p>
        <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
      </div>
    </div>
    
    <div class="carousel-item">
      <img src="./assets/imagens/2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption text-start">
        <h1>Second slide label</h1>
        <p>Some representative placeholder content for the second slide.</p>
        <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./assets/imagens/3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption text-start">
        <h1>Third slide label</h1>
        <p>Some representative placeholder content for the third slide.</p>
        <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./assets/imagens/4.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption text-start">
        <h1>Third slide label</h1>
        <p>Some representative placeholder content for the third slide.</p>
        <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    
    
  </div>     

    <?php
    include INC_DIR . 'foot.inc';
    ?>
  </div>
</body>

</html>