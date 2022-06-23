<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<?php
include "valida_sessao.inc";
include "UI_include.php";
include INC_DIR . 'header.inc';
?>

<body>
    <div class="container">
        <?php
        include INC_DIR . 'menu.inc'; ?>
        <main>
            <section class="py-1 text-center container">
                <div class="row py-lg-3">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-ligh titprincipal">OFERTAS DO DIA</h1>
                        <p class="lead text-muted">
                            Bem-vindos à Auto Car!
                        </p>
                    </div>
                </div>
            </section> 
            <div class="album py-1 bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php
                        include "conecta_mysqli.inc";
                        $sql = "SELECT carros.id_carro, marcas.desc_marca, carros.modelo, carros.descricao, carros.mod_fab, 
                        carros.cor, carros.placa, carros.valor, fotos.f_imagem FROM marcas, carros, fotos WHERE carros.marca = marcas.id_marca
                        AND carros.id_carro = fotos.f_carro AND fotos.f_destaque;";
                        $resultado = mysqli_query($conexao, $sql);
                        while($dados = mysqli_fetch_array($resultado)) :
                        ?>

                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="./assets/imagens/carros/<?php echo $dados['f_imagem']; ?>" alt="">
                                <rect width="100%" height="100%" fill="#55595c" />
                                <div class="card-body">
                                    <p class="card-text">
                                        <p><?php echo $dados['desc_marca']; ?> - <?php echo $dados['modelo']; ?> - <?php echo $dados['mod_fab']; ?> <br>
                                    <?php echo $dados['descricao']; ?> <br>
                                    <?php echo $dados['cor']; ?> - <?php echo $dados['placa']; ?> <br>
                                    </p>
                                    <h3><?php echo $dados['valor']; ?></h3>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;?>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include INC_DIR . 'foot.inc'; ?>
    </div>
</body>

</html>