<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/86360ad239.js" crossorigin="anonymous"></script>
    <title>Loja - Home</title>
  </head>
  <body>
    <?php session_start(); ?>
    <div class="container">
    
      <div class="row">
      <div class="header navigation">
        <div class="col-xl-3 col-lg-2 col-sm-4 col-5">
          <a href="index.php">
            <img alt="Logo" class="img-fluid py-3 logo" src="https://raw.githubusercontent.com/solodev/shopping-cart-items-number/master/images/lunar-xp-logo.png" aria-role="logo">
          </a>
        </div>
        <div class="col-xl-9 col-lg-10 col-sm-8 col-7">

          <ul class="navbar-nav flex-row justify-content-end flex-wrap align-items-center mr-lg-4 mr-xl-0">

            <li class="nav-item px-3 text-uppercase mb-0 position-relative d-lg-flex">
              <a class="d-block w-100 h-100 text-black py-4 position-relative top-link" href="#"><strong>Locations</strong></a>

            </li>
            <li class="nav-item px-3 text-uppercase mb-0 position-relative d-lg-flex">
              <a class="d-block w-100 h-100 text-black py-4 position-relative top-link" href="#"><strong>Products</strong></a>

            </li>
            <li class="nav-item px-3 text-uppercase mb-0 position-relative d-lg-flex">
              <a class="d-block w-100 h-100 text-black py-4 position-relative top-link" href="#"><strong>Shop</strong></a>
            </li>
            <li class="nav-item px-3 text-uppercase mb-0 position-relative d-lg-flex">
              <a class="d-block w-100 h-100 text-black py-4 position-relative top-link" href="#"><strong>Contact</strong></a>
            </li>
            <li class="nav-item px-3 text-uppercase mb-0 position-relative d-lg-flex">
              <div id="cart" class="d-none">

              </div>
              <a href="carrinho.php" class="cart position-relative d-inline-flex" aria-label="View your shopping cart">
                <i class="fas fa fa-shopping-cart fa-lg"></i>
                <span class="cart-basket d-flex align-items-center justify-content-center">
                <!-- Verifica se tem algum produto no carrinho para poder fazer a contagem da quantidade -->
                  <?php echo isset($_SESSION['produto']) ? count($_SESSION['produto']) : 0?>
                </span>
              </a>
            </li>
           
          </ul>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php for ($i=0; $i < 9; $i++) { ?>
            <div class="card" style="float: left; margin: 2%; width: 18rem;">
            <img style="width: 17.9rem;height: 13rem;" src="img/img<?php echo ($i + 1)?>.jpg" class="card-img-top" alt="img<?php echo ($i + 1)?>">
              <div class="card-body">
                <h5 class="card-title">Produto <?php echo ($i + 1); ?></h5>
                <h6>R$ <?php echo (($i+1) * 10.23)?></h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <!-- URL para salvar produto no carrinho, parametros: 
                  nome - Nome do produto
                  valor - Valor do produto
                  codigo - código unico que não se repita para os produtos
                  foto - url da foto do produto
                  -->
                <a href="/lojasimples/adicionar_carrinho.php?nome=Produto%20<?php echo ($i + 1); ?>&valor=<?php echo (($i+1) * 10.23)?>&codigo=<?php echo ($i); ?>&foto=img<?php echo ($i + 1)?>.jpg" class="btn btn-primary">Adicionar no carrinho</a>
              </div>
            </div>
          <?php }?>
        </div>
      </div>
    
    </div>
    <footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Inicio</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Cursos</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Sobre nós</h5>
                    <ul>
                        <li><a href="#">Informações da Empresa</a></li>
                        <li><a href="#">Contato</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Suporte</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Telefones</a></li>
                        <li><a href="#">Chat</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 info">
                    <h5>Informações</h5>
                    <p> Se você deseja se tornar um programador de sucesso, acesse o site e aproveite os conteudos gratuitos e indicações de cursos de programação. </p>
                </div>
            </div>
        </div>
        <div class="second-bar">
           <div class="container">
                <h2 class="logo"><a href="#"> LOGO </a></h2>
                <div class="social-icons">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>