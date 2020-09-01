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
    <?php session_start();
    ?>
    <script>
    // Função para fazer calculo do valor do carrinho
      function total() {
        var total = 0;
        // pega todos selects existente na tela 
        $('.custom-select').each(function () {
          // calculo a valor de cada item que tem no atributo data-valor e multiplica pela quantidade
          var vlr = $(this).attr('data-valor') * $(this).val();
          total += vlr;
        })
        $('#vlr_total').text(total.toFixed(2));
      }
      // exibe ou não o campo de troco dependendo da forma da pagamento
      function trocodinheiro(e) {
        console.log(e.value);
        if (e.value == 'd') {
          $('#div_troco').css("display","block");
        }else{
          $('#div_troco').css("display","none")
        }
      }
    </script>
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
      <form action="enviarpedido.php" method="post">
        <div class="row">
            <div class="col-md-12">
            <?php
                // verifica se o carrinho tem algum produto
                if (isset($_SESSION['produto']) ? count($_SESSION['produto']) : false) {
                    ?>
                    <hr size="100%">
                    <?php
                    $total = 0;
                    // percorre todos os produtos que estão salvos no array de produtos e exibe em tela
                    foreach ($_SESSION['produto'] as $key => $value) {
                      $total += $value['valor'];
                    ?>
                        <div style="margin-top: 5%;" class="row">
                            <div class="col col-md-3">
                                <img  src="img/<?php echo $value['foto']?>" class="card-img-top" alt="img<?php echo ($key)?>">
                            </div>
                            <div class="col" style="align-self: center;">
                                <?php echo $value['nome'] . ' - R$ ' . $value['valor']?>
                            </div>
                            <div class="col col-md-2" style="align-self: center;">
                                <select onchange="total()" name="produto[<?php echo $key?>]" data-valor="<?php echo $value['valor']; ?>" class="custom-select">
                                    <option selected value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col col-md-1" style="align-self: center;">
                                <a style="text-decoration: none;color: red;" href="remover.php?id=<?php echo $key; ?>">X</a>
                            </div>
                        </div>
                        <hr size="100%">
                    <?php
                            }

                    ?>
            <div class="form-group" style="text-align: right;">
              <span style="font-weight: bold;">Total: R$ <span id="vlr_total"><?php echo $total; ?></span></span>
            </div>

            <div class="form-group">
              <label for="nome" class="required">Nome</label>
              <div class="input-group mb-3">
                  <input type="text" required class="form-control" placeholder="Nome" name="nome" id="nome">
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="cep" class="required">CEP</label>
                  <div class="input-group mb-3">
                      <input type="text" required class="form-control" placeholder="01001-000" name="cep" id="cep">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <label for="endereco" class="required">Edereço</label>
                  <div class="input-group mb-3">
                      <input type="text" required class="form-control" placeholder="Rua X, 123 - Sé" name="endereco" id="endereco">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="telefone" class="required">Telefone</label>
              <div class="input-group mb-3">
                  <input type="text" required class="form-control" placeholder="(12) 34567-8901" name="telefone" id="telefone">
              </div>
            </div>
            <div class="form-group">
              <label for="forma_pagamento" class="required">Forma de Pagamento</label>
              <div class="input-group mb-3">
                <select onchange="trocodinheiro(this)" name="forma_pagamento" id="forma_pagamento" data-valor="<?php echo $value['valor']; ?>" class="custom-select">
                    <option selected value="">Selecione</option>
                    <option value="c">Cartão</option>
                    <option value="d">Dinheiro</option>
                </select>
              </div>
            </div>
            <div class="form-group" style="display: none;" id="div_troco">
              <label for="troco" >Troco Para</label>
              <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="50,00" name="troco" id="troco">
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3">
                  <label for="observacoes">Observações</label>
                  <textarea class="form-control" id="observacoes" name="observacoes" placeholder="Exemplo: X-Burguer: sem maionese e sem mostarda" ></textarea>
              </div>
            </div>
            <div class="row" style="margin-bottom: 3%;">
                <div class="col">
                    <button class="btn btn-primary" type="submit">Finalizar Compra</button>
                </div>
            </div>
            <?php
                } else {
                ?>
                    <h5 style="text-align: center;">Carrinho Vazio</h5>
                <?php
                }
                ?>
            </div>
        </div>
      </form>
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