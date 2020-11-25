<!HTML>

<!-- modeloGeralTemplate.php
     Template do layout geral das páginas - RENOMEIE PARA O NOME DO ARQUIVO QUE VOCÊ FOR USAR
<!-- versao 4.0 - baseado no design feito no Figma -->

<html lang="pt-br">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>

    <!-- Link estilos-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="..\css\estilos.css" rel="stylesheet">

    <!--CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title> BSGI - Eventos </title>

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
                <a href="../user"><img src="..\img\ic-users-b2-128.png" height="10%" ></a>
                <a href="../info"><img src="..\img\ic-information-b2-128.png" height="9%" ></a>
                <a href="https://www.instagram.com" target="_blank"><img src="..\img\ic-instagram-b2-128.png" height="8.1%" ></a>
                <a href="https://www.facebook.com/" target="_blank"><img src="..\img\ic-facebook-b2-128.png" height="8.1%"></a>
                <a href="../home"><img src="..\img\ic-home-b2-128.png" height="9%"></a>
        </div>
    </header>
    
    <section id="barra"> </section>
    <section id="main">
        <h1 class="titulo">Alteração de Eventos</h1>
        
    <!-- *** FORMULÁRIO PARA INSERÇÃO DE DADOS *** -->
  <!--  <form id="formulario" action="insercao_organizacao-v1.4.php" method="GET">-->
        <style>
            input[type=text], select, textarea {
                width: 100%; 
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                /* margin-left: 10px; */
                resize: vertical;
            }            
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
                background-color: #FF0000	;
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

            
            /* tamanho das colunas */
            .col-25 {
                float: left;
                width: 20%;
                margin-top: 2px;/* era 6px */
                padding: 5px;   /* espaço entre os campos */
            }
            .col-50 {
                float: left;
                width: 40%;
                margin-top: 2px;
                padding: 5px;   /* espaço entre os campos */
            } 
            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
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
  include "../inc/conectabd.inc.php";
  include "../inc/funcoes.inc.php";
  $id = $_GET["id"];
  $linha = le_eventos($conn, $id);
?>
		<form action="alteracao.php" method="GET" style="margin: 6%">
		<div class="row">				
	
			
		<div class="col-sm-2">
          <label for="id_evento">Id </label>
          <input type="number" class="form-control" name="evento" id="evento" value="<?php echo $linha["id_evento"];?>"><br>
        </div>

		<div class="col-sm-2">
          <label for="id_organizacao">Organização</label>
          <input type="number" class="form-control" name="organizacao" id="organizacao" value="<?php echo $linha["id_organizacao"];?>"><br>
          </div>		


		   <div class="col-sm-2">
           <label for="id_tipo_evento">Tipo de Evento</label>
           <input type="number" class="form-control" name="tipo" id="tipo" value="<?php echo $linha["id_tipo_evento"];?>"><br>
           </div>


		  <div class="col-sm-2">
          <label for="titulo">Titulo</label>
          <input type="text" class="form-control" name="tit" id="tit"  value="<?php echo $linha["titulo"];?>"><br>
          </div>

		  <div class="col-sm-3">
          <label for="data_evento">Data do Evento</label>
          <input type="date" class="form-control" name="data" id="data" value="<?php echo $linha["data_evento"];?>"><br>
           </div>
			
			<div class="col-sm-3">
            <label for="CEP_evento">CEP</label>
			<input type="number" class="form-control" name="cep" id="cep" value="<?php echo $linha["CEP_evento"];?>"><br>
			</div>     
			 
          <div class="col-sm-4">
          <label for="logradouro_evento">Endereço</label>
          <input type="text" class="form-control" name="logradouro" id="logradouro" value="<?php echo $linha["logradouro_evento"];?>"><br>
          </div>



		  <div class="col-sm-1">
          <label for="num_evento">Nº</label>
          <input type="number" class="form-control" name="num" id="num" value="<?php echo $linha["num_evento"];?>"><br>
          </div>


		  <div class="col-sm-4">
          <label for="complemento_evento">Complemento</label>
          <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo $linha["complemento_evento"];?>"><br>
          </div>
          </div>

		  <div class="row">
          <div class="col-sm-4">
          <label for="bairro_evento">Bairro</label>
          <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $linha["bairro_evento"];?>"><br>          
          </div>

          <div class="col-sm-4">
          <label for=id_cidade_evento>Cidade</label>
          <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $linha["id_cidade_evento"];?>"><br>
		  </div>	  
			

		  <div class="col-sm-1">
          <label for=uf>Estado</label>
          <input type="text" class="form-control" name="estado" id="estado"value="<?php echo $linha["uf"];?>"><br>
          </div>
          </div>
		  <input type="submit" value="Alterar" class="btn btn-primary btn-sm">
          
		</form>
	</body>
</html>