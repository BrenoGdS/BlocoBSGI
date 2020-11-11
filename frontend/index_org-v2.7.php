<!HTML>

<!-- form_inserc_org.php 
     formulario de insercao das organizaçoes
<!-- versao 2.7 - baseado em cadastro_bd_pdo (form-insercao.php) -->


<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="estilo1-base.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title> BSGI - Organização </title>
  <!--
                
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	-->
        
    </head>

<body>
    <header>
        <!-- ATENÇÃO: ainda preciso achar um jeito de colocar os ícones em um bloco dimensionável
             NÃO está alinhando corretamente com o texto abaixo dos ícones (que é capaz de nem ter) -->
  
  	<div id="cab_esq">
		<img class="contain" src="..\src\img\BSGI-logo2c.png" align=left width="70%">
	</div> 
	<div id="cab_dir">

            <style>
                #cab_dir{
                    display: inline-block;
                }
            </style>
                    
            <span>
                <i><img src="..\src\img\icon3-user.png" height="75" ></i> <!-- Tenho achado os ícones muito GRANDES -->
                <img src="..\src\img\icon3-information.png" height="75">
                <img src="..\src\img\icon-instagram.png" height="75">
                <img src="..\src\img\icon-facebook.png" height="75">
                <img src="..\src\img\icon-facebook.png" height="75">
                <!-- <img src="..\src\img\icon3-user.png" height="8%" > --> <!-- align="right" ENORME -->
            </span>            
	</div>
    </header>

    <nav id="navegar"> 
	<a href="#" class="opcoes">Perfil</a>
	<a href="#" class="opcoes">Info</a>
	<a href="#" class="opcoes">Instagram</a>
	<a href="#" class="opcoes">Facebook</a>
	<a href="#" class="opcoes">Home</a>
    </nav>
   

    <section id="barra"> </section>
    <section id="main"> 
        <h1 class="titulo">Cadastro Organizacional</h1>

    
    <!-- *** FORMULÁRIO PARA INSERÇÃO DE DADOS *** -->
    
    <form id="formulario" action="insercao_organizacao-v1.2.php" method="GET">
        <style>

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

        <div>
            <!-- área central da página -->
            
        </div>    
        
        
<?php

    # cria conexão com banco de dados
    //include_once "../../inc/conectabd.php"; // ativar o database
        //include_once "../inc/funcoes.inc.php";  //VERIFICAR
        //monta_organizacao($conn);               // CRIAR FUNÇAO
 

    ?>
    <!-- Se não precisar do botão, retirar essa parte -->
    <input type="submit" value="Cadastrar" class="btn btn-primary btn-sm">
    <input type="reset" value="Limpar" class="btn btn-primary btn-sm">
    </form>
       
        
        
</body>
</html>