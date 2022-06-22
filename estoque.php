<?php 
        include "valida_sessao.inc"; 
        include "UI_include.php"; 
        include INC_DIR . 'header.inc'; 
    ?>
    <?php include INC_DIR . 'menu.inc'; ?>
    <body>
        <div class="container">
            <h3 style="text-align:center">Estoque de carros</h3>
            <table class="table">
                <thead>
                    <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Descrição</th>
                    <th>Mod/Fab</th>
                    <th>Cor</th>
                    <th>Placa</th>
                    <th>Preço</th>
                    <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "conecta_mysqli.inc";
                        $sql = "SELECT carros.id_carro, marcas.desc_marca, carros.modelo, carros.descricao,
                        carros.mod_fab, carros.cor, carros.placa, carros.valor FROM marcas,carros WHERE carros.marca =
                        marcas.id_marca ORDER BY carros.marca ASC, carros.modelo ASC,carros.mod_fab ASC;";
                        $resultado = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_array($resultado)) :
                    ?>
                    <tr>
                        <td><?php echo $dados['desc_marca']; ?></td>
                        <td><?php echo $dados['modelo']; ?></td>
                        <td><?php echo $dados['descricao']; ?></td>
                        <td><?php echo $dados['mod_fab']; ?></td>
                        <td><?php echo $dados['cor']; ?></td>
                        <td><?php echo $dados['placa']; ?></td>
                        <td><?php echo $dados['valor']; ?></td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn-sm btn-info">
                                <i class="material-icons">person</i>
                            </button>
                            <a href="editar.php?id=<?php echo $dados['id_carro']; ?>"><button type="button"
                            rel="tooltip" class="btn-sm btn-success">
                                <i class="material-icons">edit</i>
                            </button></a>
                            <a href="deletar.php?id=<?php echo $dados['id_carro']; ?>"><button type="button"
                            rel="tooltip" class="btn-sm btn-danger">
                                <i class="material-icons">close</i>
                            </button></a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php include INC_DIR . 'foot.inc'; ?>
        </div>
    </body>





