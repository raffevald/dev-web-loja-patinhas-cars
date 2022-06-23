<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
include "valida_sessao.inc";
include "UI_include.php";
include INC_DIR . 'header.inc';
?>

<body>
   <div class="container">
    <?php
    include INC_DIR . 'menu.inc';

    //Mostrar os dados do carros
    if(isset($_GET['id'])) :
        include "conecta_mysqli.inc";
        $id = mysqli_escape_string($conexao, $_GET['id']);
        $sql = "SELECT carros.id_carro, marcas.desc_marca, marcas.id_marca, carros.modelo, carros.descricao, carros.mod_fab,
        carros.cor, carros.placa, carros.valor FROM marcas, carros WHERE carros.marca = marcas.id_marca AND
        carros.id_carro=$id";
        $resultado = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_array($resultado);

        //Recupera os dados em variáveis
        $id_carro = $dados['id_carro'];
        $id_marca = $dados['id_marca'];
        $desc_marca = $dados['desc_marca'];
        $modelo = $dados['modelo'];
        $descricao = $dados['descricao'];
        $mod_fab = $dados['mod_fab'];
        $cor = $dados['cor'];
        $placa = $dados['placa'];
        $valor = $dados['valor'];

        mysqli_close($conexao);
    endif;
    ?>
    <h2>Fotos do carro:</h2>
    <div class="alert alert-dark" role="alert">
        <?php
        echo "<h5>$desc_marca $modelo $descricao $mod_fab $cor $placa $valor</h5>";
        ?>
    </div>
    <form action="php_action/include_foto.php" method="POST">
        <input type="hidden" name="id_carro" value="<?php echo $dados['id_carro'];?>">
        <button type="submit" name="btn-incluir-foto" class="btn btn-primary mb-3">Incluir nova foto</button>
    </form>

    <?php
    //Recuperando nomes dos arquivos das fotos de um carro
    if(isset($_GET['id'])) :
        include "conecta_mysqli.inc";
        $id_carro = mysqli_escape_string($conexao, $_GET['id']);
        $sql = "SELECT * FROM fotos WHERE f_carro = '$id_carro'";
        $resultado = mysqli_query($conexao, $sql);

        $linhas = mysqli_num_rows($resultado);

        if($linhas == 0) :
            echo "<p> </p>";
    ?>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.
                98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8
                5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>    
        </svg>

        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                Nenhuma imagem para este carro
            </div>
        </div>
        <?php
        else :
        ?>
        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
            <?php
            while ($dados = mysqli_fetch_array($resultado)) :

                //Recuperar os dados em variáveis de um array
                $f_id = $dados['f_id'];
                $f_imagem = $dados['f_imagem'];
                $f_destaque = $dados['f_destaque'];
            ?>
            <form action="php_action/update_foto.php" method="post" enctype="multipart/form-data" role="form">
                <div class="col mt-3 mb-3" style="text-align: center;">
                    <input type="hidden" name="f_id" value="<?php echo $f_id; ?>">
                    <input type="hidden" name="f_carro" value="<?php echo $id_carro; ?>">
                    <legend></legend>

                    <img src="./assets/imagens/carros/<?php echo "$f_imagem" ?>" width="300" class="img-responsive"/>
                    <p></p>

                    <input name="arquivo" type="file" class="form-control" id="arquivofoto" value="<?php echo "$f_imagem"?>"/>
                </div>
                <div class="btn-group">
                    <button type="submit" name="btn-alterar-foto" class="btn btn-sm btn-outline-secondary">
                        Alterar imagem
                    </button>
                    <?php if($f_destaque) : ?>
                        <button type="submit" name="btn-desmarcar-destaque" class="btn btn-sm btn-outline-secondary <?php echo 'active'; ?>">
                        Marcado como destaque
                        </button>
                    <?php else: ?>
                        <button type="submit" name="btn-marcar-destaque" class="btn btn-sm btn-outline-secondary">
                        Marcar como destaque
                        </button>
                        <?php endif; ?>
                        <button type="submit" name="btn-excluir-foto" class="btn btn-sm btn-outline-danger">
                        Excluir esta imagem
                        </button>
                </div>
            </form>
            <?php
            endwhile;
        endif;
        mysqli_close($conexao);
    endif;
            ?>       
        </div>
        <br/>
        <?php
        include INC_DIR . 'foot.inc';
        ?>
   </div> 
</body>
</html>