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
    <body>
    <header>
        <!-- ATENÇÃO: ainda preciso melhorar o cabeçalho dimensionável -->
  	<div id="cab_esq">
            <img class="contain" src="..\img\BSGI-logo3c.png" align=left width="99%">
        </div>
        <!--<div id="cab_central"> 
            <a>Nome do Usuário</a>
        </div> -->
        <div id="cab_dir">
        <!-- novos icones azuis -->    
                <a href="../user"><img src="..\img\ic-users-b2-128.png" height="70px" ></a>
                <a href="../info"><img src="..\img\ic-information-b2-128.png" height="70px" ></a>
                <a href="https://www.instagram.com" target="_blank"><img src="..\img\ic-instagram-b2-128.png" height="70px" ></a>
                <a href="https://www.facebook.com/" target="_blank"><img src="..\img\ic-facebook-b2-128.png" height="70px"></a>
                <a href="../home"><img src="..\img\ic-home-b2-128.png" height="70px"></a>
        </div>
    </header>
    
    <section id="barra"> </section>
    <section id="main">
            <br>
            <div class="destaque1">
                <?php
                include_once "../inc/conectabd.php";

                $sql = 'SELECT * FROM tb_usuario';
                $stmt = $conn->query($sql);
                ?>
                <br>
                <br>
                <div class="row centralizar-div" style="margin-right: 20px;">
                    <div class="form-group col-sm-6">
                        <a href="../organizacao/manterOrganizacao.php"><input type="button" value="Cadastrar Organização" class="btn btn-sm form-control" style="background-color: #fea757; color: white; height: 50px; font-size: 20px;"></a>
                    </div>
                </div>
                <div class="row centralizar-div" style="margin-right: 20px;">
                    <div class="form-group col-sm-6">
                    <a href="../cadastroEventos/form_insercao.php"><input type="button" value="Cadastrar Atividade/Evento" class="btn btn-sm form-control" style="background-color: #fea757; color: white; height: 50px; font-size: 20px;"></a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>