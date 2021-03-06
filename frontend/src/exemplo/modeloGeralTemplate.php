<!HTML>

<!-- form_inserc_org.php
     formulario de insercao das organizaçoes
<!-- versao 3.1 - baseado em cadastro_bd_pdo (form-insercao.php) -->

<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="..\css\estilos.css" rel="stylesheet">

    <title> BSGI - Organização </title>

    </head>
    
    <body>
    <header>
        <!-- ATENÇÃO: ainda preciso achar um jeito de colocar os ícones em um bloco dimensionável -->
  	<div id="cab_esq">
            <img class="contain" src="..\img\BSGI-logo2c.png" align=left width="100%"></div>
        <!--<div id="cab_central"> 
            <a>Nome do Usuário</a>
        </div> -->
        <div id="cab_dir">
                <a href="../user"><img src="..\img\ic-users-b2-128.png" height="10%" ></a>
                <a href="../info"><img src="..\img\ic-information-b2-128.png" height="9%" ></a>
                <a href="https://www.instagram.com" target="_blank"><img src="..\img\ic-instagram-b2-128.png" height="8.1%" ></a>
                <a href="https://www.facebook.com/" target="_blank"><img src="..\img\ic-facebook-b2-128.png" height="8.1%"></a>
                <a href="../home"><img src="..\img\ic-home-256.png" height="9%"></a>
        </div></header>
    
    <section id="barra"> </section>
    <section id="main">
        <h1 class="titulo">Cadastro Organizacional</h1>
        
        <!-- *** FORMULÁRIO PARA INSERÇÃO DE DADOS *** -->

    <form id="formulario" action="insercao_organizacao-v1.2.php" method="GET">
        <style>
            /* não sei pra que */
            label {
                /* padding: 12px 12px 12px 0; */
                display: inline-block;
            }            
            
            /* botão de limpar  */
            /* Se não precisar do botão, retirar essa parte */
            input[type=reset] {
                background-color: red;  /* era #4CAF50 */
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                filter: drop-shadow(0 2px 2px rgb(160, 160, 160));
                float: right;
                margin-right: 1%;
            }
            input[type=reset]:hover {
                background-color: rgb(220,0,0); /* era #45a049 - ACERTAR COR EM HOVER */
            }            
            /* botão de salvar */
            /* Se não precisar do botão, retirar essa parte */
            input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                filter: drop-shadow(0 2px 2px rgb(160, 160, 160));
                float: right;
                margin-right: 14%;
            }
            input[type=submit]:hover {
                background-color: #45a049;
            }
            
            /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
            .col-25, .col-50, input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
            }
        </style>

        <div id="divform">
            <!-- área central da página -->
            
        </div>    
        
        
    <?php

        # cria conexão com banco de dados
        include_once "../inc/conectabd.php"; // ativar o database
        //include_once "../inc/funcoes_org.php";  //VERIFICAR
        
        ?>
        
        
    <!-- Se não precisar do botão, retirar essa parte -->
    <input type="submit" value="Cadastrar" class="btn btn-primary btn-sm">
    <input type="reset" value="Limpar" class="btn btn-primary btn-sm">
    </form>
        
</body>
</html>