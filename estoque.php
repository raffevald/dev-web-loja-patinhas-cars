<?php
include "valida_sessao.inc";
include "UI_include.php";
include INC_DIR . 'header.inc';
?>

<body>
    <div class="container">
        <?php
        include INC_DIR . 'menu.inc'; ?>

        <?php
        if (isset($_GET['incsucesso'])) :
            echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
            <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
            <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06
            1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
            </symbol>
            </svg><div class='alert alert-success d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use 
            xlink:href='#check-circle-fill'/></svg>
            <div>
            Novo carro incluído com sucesso
            </div>
            </div>";
        endif;

        if (isset($_GET['altsucesso'])) :
            echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
            <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
            <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06
            1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
            </symbol>
            </svg><div class='alert alert-success d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use 
            xlink:href='#check-circle-fill'/></svg>
            <div>
            Novo carro alterado com sucesso
            </div>
            </div>";
            /*echo "CARRO ALTERADO COM SUCESSO";
            echo "</div>";*/
        endif;

        if (isset($_GET['delsucesso'])) :
            echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
            <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
            <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06
            1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
            </symbol>
            </svg><div class='alert alert-success d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use 
            xlink:href='#check-circle-fill'/></svg>
            <div>
            Carro excluído com sucesso
            </div>
            </div>";
            //echo "<div class='alert alert-sucess' role='alert'>";
            /*echo "CARRO EXCLUÍDO COM SUCESSO";
            echo "</div>";*/
        endif;

        if (isset($_GET['erro'])) :
            echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
            <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
            <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.438-.99.98-1.
            767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0
            1 1 0 2 1 1 0 0 1 0-2z'/>
            </symbol>
            </svg>
            <div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use 
            xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
            Erro detectado!
            </div>
            </div>";
        endif;
        ?>

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
                    <th class="text-right">Preço</th>
                    <th class="text-right">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include "conecta_mysqli.inc";
                $sql = "SELECT carros.id_carro, marcas.desc_marca, carros.modelo, carros.descricao, carros.mod_fab, carros.cor, carros.placa, carros.valor 
                    FROM marcas, carros WHERE carros.marca = marcas.id_marca ORDER BY carros.marca ASC, carros.modelo ASC, carros.mod_fab ASC;";
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
                        <a href="fotos.php?id=<?php echo $dados['id_carro']?>"><button type="button" rel="tooltip" class="btn-sm btn-secondary">
                            <i class="material-icons">person</i>
                        </button></a>
                        <a href="editar.php?id=<?php echo $dados['id_carro']; ?>"><button type="button" rel="tooltip" alt="editar" 
                        class="btn-sm btn-success">
                                <i class="material-icons">edit</i>
                            </button></a>
                        <a href="#modal<?php echo $dados['id_carro']; ?>">
                            <button alt="excluir" type="button" rel="tooltip" class="btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal<?php echo $dados['id_carro']; ?>">
                                <i class="material-icons">close</i>
                            </button></a>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $dados['id_carro']; ?>" tabindex="-1" 
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir este carro?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><?php echo $dados['desc_marca']; ?> - <?php echo $dados['modelo']; ?> - <?php echo $dados['descricao']; ?>
                                            - <?php echo $dados['mod_fab']; ?> - <?php echo $dados['cor']; ?> - <?php echo $dados['placa']; ?></p>        
                                    </div>
                                    <div class="modal-footer">
                                        <form action="php_action/delete.php" method="POST">
                                            <input type="hidden" name=id value="<?php echo $dados['id_carro']; ?>">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não excuir</button>
                                            <button type="submit" name="btn-deletar" class="btn btn-primary">Confirmar exclusão</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <!--Fim modal-->  
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php
        include INC_DIR . 'foot.inc'
        ?>
    </div>
</body>