<html>
    <?php
        include "valida_sessao.inc";
        include "UI_include.php";
        include INC_DIR . 'header.inc'
    ?>

    <body>
        <div class="container">
            <?php include INC_DIR . 'menu.inc'; ?>
        </div>

        <div class="container">
            <h3 style="text-align: center">
                Adicionar carro
            </h3>

            <form action="php_action/create.php" method="POST">
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 ">
                    <div class="col">
                        <label for="marca" class="form-label"> Selecione a marca </label>
                        <select name="marca" id="" class="form-select-sm" arial-label=".form-select-lg example">
                            <option value=""> --selecione-- </option>
                            <?php
                                include "conecta_mysqli.inc";
                                $sql = "SELECT id_marca, desc_marca FROM marcas ORDER BY desc_marca ASC;";
                                $resultado = mysqli_query($conexao, $sql);
                                while ($dados = mysqli_fetch_array($resultado)) :
                            ?>
                            <option value=" <?php echo $dados['id_marca']; ?> "> <?php echo $dados['id_marca']; echo " - "; echo $dados['desc_marca']; ?> </option>
                            <?php endwhile;  mysqli_close($conexao); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="modelo" class="form-label"> Modelo </label>
                        <input type="text" class="form-control" id="modelo" name="modelo">
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label"> Descrição </label>
                        <input type="text" class="form-control" id="descricao" name="descricao"/>
                    </div>
                    <div class="mb-3">
                        <label for="mod_fab" class="form-label"> Ano Mdelo/Fabricação </label>
                        <input type="text" class="form-control" id="mod_fab" name="mod_fab"/>
                    </div>
                    <div class="mb-3">
                        <label for="cor" class="form-label"> Cor </label>
                        <input type="text" class="form-control" id="cor" name="cor"/>
                    </div>
                    <div class="mb-3">
                        <label for="placa" class="form-label"> Placa </label>
                        <input type="text" class="form-control" id="placa" name="placa"/>
                    </div>
                    <div class="mb-3">
                        <label for="valor" class="form-label"> Valor (R$) </label>
                        <input type="text" class="form-control" id="valor" name="valor"/>
                    </div>

                    <div style="text-align: center;" class="mt-3">
                        <button type="submit" name="btn-adicionar" class="btn-primary"> Adicionar</button>
                    </div>
                </div>
            </form>
            <br/> <br/>
            <?php include INC_DIR . 'foot.inc'; ?>
        </div>
    </body>
</html>