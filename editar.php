<?php
include "valida_sessao.inc";
include "UI_include.php";
include INC_DIR . 'header.inc';
?>

<body>
    <div class="container">
        <?php
        include INC_DIR . 'menu.inc';

        if (isset($_GET['id'])) :
            include "conecta_mysqli.inc";
            $id = mysqli_escape_string($conexao, $_GET['id']);
            $sql = "SELECT carros.id_carro, marcas.desc_marca, marcas.id_marca, carros.modelo, carros.descricao,
            carros.mod_fab, carros.cor, carros.placa, carros.valor FROM marcas, carros WHERE carros.marca = marcas.id_marca 
            AND carros.id_carro=$id";
            $resultado = mysqli_query($conexao, $sql);
            $dados = mysqli_fetch_array($resultado);
        endif;

        $id_carro = $dados['id_carro'];
        $id_marca = $dados['id_marca'];
        $desc_marca = $dados['desc_marca'];
        $modelo = $dados['modelo'];
        $descricao = $dados['descricao'];
        $mod_fab = $dados['mod_fab'];
        $cor = $dados['cor'];
        $placa = $dados['placa'];
        $valor = $dados['valor'];
        ?>

        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br><br>
                <h3 style="text-align: center;">Editar carro</h3>
                <form action="php_action/update.php" method="POST">
                    <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group mt-3">
                            <label for="marca" class="form-label">Marca (selecione)</label>
                            <select name="marca" class="form-select form-select-sm" aria-label=".form-select-lg example">
                                <option value="<?php echo $id_marca; ?>"><?php echo $desc_marca; ?></option>
                                <?php
                                include "conecta_mysqli.inc";
                                $sql = "SELECT id_marca, desc_marca FROM marcas ORDER BY desc_marca ASC";
                                $resultado = mysqli_query($conexao, $sql);
                                while ($dados = mysqli_fetch_array($resultado)) :
                                ?>
                                    <option value="<?php echo $dados['id_marca']; ?>"><?php echo $dados['desc_marca']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                    </div>

            </div>
            <div class="form-group mt-3">
                <label for="marca" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" id="modelo" value="<?php echo $modelo; ?>">
            </div>
            <div class="form-group mt-3">
                <label for="descricao" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo $descricao; ?>">
            </div>
            <div class="form-group mt-3">
                <label for="mod_fab" class="form-label">Modelo/Fabricação</label>
                <input type="text" class="form-control" name="mod_fab" id="mod_fab" value="<?php echo $mod_fab; ?>">
            </div>
            <div class="form-group mt-3">
                <label for="cor" class="form-label">Cor</label>
                <input type="text" class="form-control" name="cor" id="cor" value="<?php echo $cor; ?>">
            </div>
            <div class="form-group mt-3">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control" name="placa" id="placa" value="<?php echo $placa; ?>">
            </div>
            <div class="form-group mt-3">
                <label for="valor" class="form-label">Valor (R$)</label>
                <input type="text" class="form-control" name="valor" id="valor" value="<?php echo $valor; ?>">
            </div>
        </div>
        <div style="text-align: center;" class="mt-3">
            <button type="submit" name="btn-alterar" class="btn btn-primary">Salvar alterações</button>
        </div>
        </form>
        <br><br>
        <?php
        include INC_DIR . 'foot.inc';
        ?>
    </div>
</body>