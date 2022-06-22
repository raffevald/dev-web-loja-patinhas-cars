<?php 
    session_start(); 
    include "UI_include.php"; 
    include INC_DIR . 
    'header.inc'; 
    $msg = ""; 
?>
<body>
    <div class="container">
        <?php include INC_DIR . 'menu.inc'; ?>
        <div class="form">
        <div class="new">
        <?php if (isset($_GET['new'])) echo 'CONTA CRIADA COM SUCESSO'; ?>
    </div>
    <div class="heading">
        <i class="material-icons">account_box</i>
        <h4 class="modal-title">Faça o login na sua conta</h4>
    </div>
    <form action="loginp.php" method="post" class="form-horizontal">
        <div class="form-group top"><i class="material-icons">face</i>
            <label class="control-label">Usuário</label>
            <div>
                <input type="text" class="form-control" name="usuario">
            </div>
        </div>
        <div class="form-group"><i class="material-icons">vpn_key</i>
            <label class="control-label">Senha</label>
            <div>
                <input type="password" class="form-control" name="senha">
            </div>
        </div>
        <div class="formerror"><?php echo $msg; ?></div>
            <div class="form-group">
                <div>
                    <center><button type="submit" name="submit" class="btn btn-primary btn-lg">Log
                    In</button></center>
                </div>
            </div>
        </div>
    </form>
</body>