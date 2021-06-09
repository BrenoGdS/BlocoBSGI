<!DOCTYPE html>
<!-- cadastro.html -->
<html>
    <head>
        <title>Perfil</title>
        <!--<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link href="../css/estilos.css" rel="stylesheet">
        <style>

            .centralizar-div {
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center
            }
            .background-input{
                background-color: #e8f0fd;
            }
        </style>
    </head>
    <body id="main">
        <div class="container-fluid">
            <div style="height: 40px;"></div>
            <div>
                <img src="../img/BSGI-logo2c.png" width="15%"/>
            </div>
            <div>
                <nav id="navegar" style="background-color: white;">
                    <span style="margin-top: -40px; border: 1px solid; border-radius: 5px 5px 5px 5px; background-color: #cccccc;">&nbsp;&nbsp;<b>Alex Lobão</b>&nbsp;&nbsp;</span>
                    <a href="#" class="opcoes"><img src="../img/icon3-user.png" width="4%" style="margin-top: -40px; margin-right: -70px;"/></a>
                    <a href="#" class="opcoes"><img src="../img/icon3-information.png" width="4%" style="margin-top: -40px; margin-right: -60px;"/></a>
                    <a href="#" class="opcoes"><img src="../img/icon-instagram.png" width="4%" style="margin-top: -40px; margin-right: -60px;"/></a>
                    <a href="#" class="opcoes"><img src="../img/icon-facebook.png" width="4%" style="margin-top: -40px; margin-right: -60px;"/></a>
                    <a href="#" class="opcoes"><img src="../img/ic-home-b2-128.png" width="4%" style="margin-top: -40px;"/></a>
                </nav>
            </div>
            <div class="row">                
                <section id="barra" style="align-content: center;"></section>
            </div>
            <br>
            <div class="destaque1">
                <?php
                include_once "../inc/conectabd.php";

                $sql = "SELECT * FROM tb_usuario WHERE id_usuario = {$_GET['id']}";
                $stmt = $conn->query($sql);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>

                <form action="editar.php?id=<?= $_GET['id'] ?>" method="POST" class="form-horizontal">
                    <div class="container" style="align-content: center; margin-right: 10px;">
                        <div class="row">
                            <div class="form-group col-sm-8 centralizar-div" style="background-color: #5caed6; color: white; height: 60px; font-size: 22px; border-radius: 10px 10px 10px 10px;">
                                <span style="margin-top: 5px;"><b>Perfil</b></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <input type="text" name="nome" value="<?= $result['nome_usuario'] ?>" placeholder="Nome" required="required" class="form-control background-input">
                            </div>

                            <div class="form-group col-sm-4">
                                <input type="text" name="email" value="<?= $result['email_usuario'] ?>" required="required" placeholder="E-mail" class="form-control background-input">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <input type="text" name="confirmar_email" value="<?= $result['email_usuario'] ?>" required="required" placeholder="Confirmar E-mail" class="form-control background-input">
                            </div>

                            <div class="form-group col-sm-4">
                                <input type="text" name="cod_membro" value="<?= $result['cod_usuario'] ?>" placeholder="Cód. Membro (Opcional)" class="form-control background-input">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <input type="password" name="senha" value="<?= $result['senha_usuario'] ?>" required="required" placeholder="Senha" class="form-control background-input">
                            </div>

                            <div class="form-group col-sm-4">
                                <input type="submit" value="Salvar Alterações" class="btn btn-primary btn-sm form-control">
                            </div>
                        </div>       
                    </div>
                </form>
                <br>
                <br>
                <div class="row centralizar-div" style="margin-right: 20px;">
                    <div class="form-group col-sm-6">
                        <a href="../organizacao/manterOrganizacao.php"><input type="button" value="Cadastrar Organização" class="btn btn-sm form-control" style="background-color: #fea757; color: white; height: 50px; font-size: 20px;"></a>
                    </div>
                </div>
                <div class="row centralizar-div" style="margin-right: 20px;">
                    <div class="form-group col-sm-6">
                        <input type="button" value="Cadastrar Atividade/Evento" class="btn btn-sm form-control" style="background-color: #fea757; color: white; height: 50px; font-size: 20px;">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>