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
   <!-- <script src="script.js"></script> -->

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
                <a href="http://www.bsgi.org.br/quemsomos/historia_da_soka_gakkai_no_brasil/"><img src="..\img\ic-information-b2-128.png" height="9%" ></a>
                <a href="https://www.instagram.com" target="_blank"><img src="..\img\ic-instagram-b2-128.png" height="8.1%" ></a>
                <a href="https://www.facebook.com/" target="_blank"><img src="..\img\ic-facebook-b2-128.png" height="8.1%"></a>
                <a href="http://localhost/frontend/index.php"><img src="..\img\ic-home-b2-128.png" height="9%"></a>
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
            input[type=submit] {
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
            input[type=submit]:hover {
                background-color: rgb(220,0,0); /* era #45a049 - ACERTAR COR EM HOVER */
            }            
            /* botão de salvar */
            /* Se não precisar do botão, retirar essa parte */
            input[type=submit] {
                background-color: #1a66e0;
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
                background-color: #e0e1dd;
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
  include_once "../inc/conectabd.php";
  include "../inc/funcoes_eventos.inc.php";
  $id = $_GET["id"];
  $linha = le_eventos($conn, $id);
?>
        <form action="alteracao.php" method="GET" style="margin: 6%">        
        
		<div class="row">				
	
			


        <input type="hidden" name="id" value="<?php echo $linha["id_evento"];?>">

		<div class="col-sm-3">
        <label class="label-index" for="organizacao" id="organizacao">
                        Organizacao:
                        </label>
                        <?php  
                        try{
                          include_once "../inc/conectabd.php";
                          $query = "SELECT id_organizacao , nome_org FROM tb_organizacao ORDER BY nome_org;";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            echo "<select name=\"organizacao\">";
                            echo '<option default value="">SELECIONE</option>';
                            // busca os dados lidos do banco de dados
                            while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)) {
                                $id = $row["id_organizacao"];
                                $curso = $row["nome_org"];
                                        // <option value="1">Anal. Des. Sist</option> 
                                echo "<option value=\"$id\">";
                                echo  $curso . '</option>';
                            }
                            echo "</select>";
                        } catch(PDOExeception $e){
                            echo "Erro: ".$e -> getMessage();
                        }  
                        ?>
          </div>		


		   <div class="col-sm-3">
           <label class="label-index" for="tipo" id="tipo">
                        Tipo de Evento:
                        </label>
                        <?php  
                        try{
                          include_once "../inc/conectabd.php";
                            $query = "SELECT id_tipo_evento , desc_tipo_evento FROM tb_tipo_evento ORDER BY desc_tipo_evento;";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            echo "<select name=\"tipo\">";
                            echo '<option default value="">SELECIONE</option>';
                            // busca os dados lidos do banco de dados
                            while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)) {
                                $id = $row["id_tipo_evento"];
                                $curso = $row["desc_tipo_evento"];
                                        // <option value="1">Anal. Des. Sist</option> 
                                echo "<option value=\"$id\">";
                                echo  $curso . '</option>';
                            }
                            echo "</select>";
                        } catch(PDOExeception $e){
                            echo "Erro: ".$e -> getMessage();
                        }  
                        ?>
           </div>


		  <div class="col-sm-2">
          <label for="titulo">Titulo</label>
          <input type="text" class="form-control" name="tit" id="tit"  value="<?php echo $linha["titulo"];?>"><br>
          </div>

		  <div class="col-sm-3">
          <label for="data_evento">Data do Evento</label>
          <input type="datetime-local" class="form-control" name="data" id="data" value="<?php echo $linha["data_evento"];?>"><br>
           </div>
			
			<div class="col-sm-3">
            <label for="CEP_evento">CEP</label>
			<input type="number" class="form-control" name="cep" id="cep" value="<?php echo $linha["CEP_evento"];?>"><br>
            </div>  
            <div class="col-sm-3">
            <label class="label-index" for="cidade" id="cidade">
                        Cidade:
                        </label>
                        <?php //cadastro.php
                        // lista Alunos cadastrados  
                        try{
                          include_once "../inc/conectabd.php";
                            $query = "SELECT id_cidade, desc_Cidade FROM tb_cidade ORDER BY desc_Cidade;";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            echo "<select name=\"cidade\">";
                            echo '<option default value="">SELECIONE</option>';
                            // busca os dados lidos do banco de dados
                            while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)) {
                                $id = $row["id_cidade"];
                                $curso = $row["desc_Cidade"];
                                        // <option value="1">Anal. Des. Sist</option> 
                                echo "<option value=\"$id\">";
                                echo  $curso . '</option>';
                            }
                            echo "</select>";
                        } catch(PDOExeception $e){
                            echo "Erro: ".$e -> getMessage();
                        }  
                        ?>
		  </div>	     
			 
          <div class="col-sm-4">
          <label for="logradouro_evento">Endereço</label>
          <input type="text" class="form-control" name="logradouro" id="logradouro" value="<?php echo $linha["logradouro_evento"];?>"><br>
          </div>



		  <div class="col-sm-1">
          <label for="num_evento">Nº</label>
          <input type="number: min=0 max=99" class="form-control" name="num" id="num" value="<?php echo $linha["num_evento"];?>"><br>
          </div>


		  <div class="col-sm-4">
          <label for="complemento_evento">Complemento</label>
          <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo $linha["complemento_evento"];?>"><br>
          </div>
          

	
          <div class="col-sm-4">
          <label for="bairro_evento">Bairro</label>
          <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $linha["bairro_evento"];?>"><br>          
          </div>
        </div>
          
        <input type="submit" value="Alterar" class="btn btn-primary btn-sm">

  
             
          
        </form>

	</body>
</html>