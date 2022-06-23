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
    include INC_DIR . 'menu.inc'; ?>
   </div> 

   <div class="container">
    <?php 
    if(isset($_GET['delsucesso'])) :
        echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
        <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
        <path d= 'M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06
        1.06L6.97 11.03a.75.75 0 0 0-1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z' />
        </symbol>
        </svg><div class='alert alert-sucess d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Sucess:'><use
            xlink:href='#check-circle-fill'/></svg>
            <div>
            Usuário excluído com sucesso
            </div>
        </div>";
    endif;
    if(isset($_GET['altsucesso'])) :
        echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
        <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
        <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06
        1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
        </symbol>
        </svg><div class='alert alert-success d-flex align-items-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use 
        xlink:href='#check-circle-fill'/></svg>
        <div>
        Usuário alterado com sucesso
        </div>
        </div>";
    endif;
    if(isset($_GET['erro'])) :
        echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
        <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
        <path d= 'M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.
        767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0
        1 1 0 2 1 1 0 0 1 0-2z' />
        </symbol>
        </svg><div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use
            xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
            Erro detectado!
            </div>
        </div>";
    endif;
    ?>

    <h3 style="text-align: center">Administração de usuários</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Usuário</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>e-mail</th>
                <th>categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "conecta_mysqli.inc";
            $sql = "SELECT u_usuario, u_nome, u_sobrenome, u_email, u_cat, u_avatar FROM usuarios ORDER BY u_nome ASC";
            $resultado = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_array($resultado)) :
            ?>
            <tr>
                <td>
                    <div class="circle"><img src='./assets/imagens/usuarios/<?php echo $dados['u_avatar']; ?>'></div>
                </td>
                <td><?php echo $dados['u_usuario']; ?></td>
                <td><?php echo $dados['u_nome']; ?></td>
                <td><?php echo $dados['u_sobrenome']; ?></td>
                <td><?php echo $dados['u_email'];?></td>
                <td><?php if ($dados['u_cat'] == "a") : echo "administrador";
                    endif;
                    if($dados['u_cat'] == "u") : echo "usuário";
                endif; 
                ?>
                </td>
                <td class="td-actions text-right">
                    <a href="editar_avatar.php?id=<?php echo $dados['u_usuario']; ?>"><button type="button" rel="tooltip"
                    class="btn-sm btn-secondary">
                        <i class="material-icons">person</i>
                    </button></a>
                    <a href="editar_usuario.php?id=<?php echo $dados['u_usuario']; ?>"><button alt="editar" type="button" 
                    rel="tooltip" class="btn-sm btn-success">
                        <i class="material-icons">edit</i>
                    </button></a>
                    <a href="#modal<?php echo $dados['u_usuario']; ?>">
                    <button alt="excluir" type="button" rel="tooltip" class="btn-sm btn-danger" data-bs-toggle="modal"
                    data-bs-target="#exampleModal<?php echo $dados['u_usuario']; ?>">
                    <i class="material-icons">close</i>
                </button></a>

                <!--Modal-->
            <div class="modal fade" id="exampleModal<?php echo $dados['u_usuario']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tem certeza que quer excluir este usuário?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><?php echo $dados['u_usuario']; ?> - <?php echo $dados['u_nome']; ?> <?php echo $dados['u_sobrenome']; ?></p>
                        </div>
                        <div class="modal-footer">
                            <form action="php_action/delete_user.php" method="POST">
                                <input type="hidden" name="usuario" value="<?php echo $dados['u_usuario']; ?>">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não excluir</button>
                                <button type="submit" name="btn-deletar-usuario" class="btn btn-primary">Confirmar exclusão</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
   </div>
   <br><br>
   <?php
   include INC_DIR . 'foot.inc';
   ?>
   </div>
</body>
</html>