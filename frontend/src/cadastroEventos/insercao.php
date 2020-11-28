

<!HTML>

<!-- modeloGeralTemplate.php
     Template do layout geral das páginas - RENOMEIE PARA O NOME DO ARQUIVO QUE VOCÊ FOR USAR
<!-- versao 4.0 - baseado no design feito no Figma -->

<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    
    <link href="..\css\estilos.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="consultaCEP.js"></script>    

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
                <a href="http://localhost/cadastroEventos/eventos/index.php"><img src="..\img\ic-home-b2-128.png" height="9%"></a>
        </div>
    </header>
    
    <section id="barra"> </section>
    <section id="main">
        <h1 class="titulo">Cadastro de eventos - Inclusão</h1>
        

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
// efetua inclusao do curso informado em cadatro_curso.html

  
  $organizacao = $_GET["organizacao"];
  $tipo = $_GET["tipo"];
  $tit = $_GET["tit"];
  $data = $_GET["data"];
  $cep = $_GET["cep"]; 
  $cidade = $_GET["cidade"];
  $logradouro = $_GET["logradouro"];
  $num = $_GET["num"];
  $complemento = $_GET["complemento"];
  $bairro = $_GET["bairro"];
  
  
  

  
  try{
  include_once "../inc/conectabd.php";
  

  $query = "INSERT INTO tb_evento 
      (id_organizacao, id_tipo_evento, titulo, data_evento, CEP_evento, id_cidade_evento,  
	  logradouro_evento, num_evento, complemento_evento, bairro_evento) 
	  values (:id_organizacao, :id_tipo_evento, :titulo, :data_evento, :CEP_evento, :id_cidade_evento, :logradouro_evento, :num_evento, :complemento_evento, :bairro_evento);";
	$stmt = $conn -> prepare($query);
	
	$stmt -> bindValue(":id_organizacao",$organizacao, PDO::PARAM_INT);
	$stmt -> bindValue(":id_tipo_evento",$tipo, PDO::PARAM_STR);
	$stmt -> bindValue(":titulo",$tit, PDO::PARAM_STR);
	$stmt -> bindValue(":data_evento",$data, PDO::PARAM_STR);
    $stmt -> bindValue(":CEP_evento",$cep, PDO::PARAM_STR);
    $stmt -> bindValue(":id_cidade_evento",$cidade, PDO::PARAM_STR);
	$stmt -> bindValue(":logradouro_evento",$logradouro, PDO::PARAM_STR);
	$stmt -> bindValue(":num_evento",$num, PDO::PARAM_STR);
	$stmt -> bindValue(":complemento_evento",$complemento, PDO::PARAM_STR);
	$stmt -> bindValue(":bairro_evento",$bairro, PDO::PARAM_STR);
	
	
	



	$stmt -> execute();

	echo "<h4>Inclusão efetuada com sucesso</h4>";
  
  } catch(PDOExeception $e){
    echo "Erro: ".$e -> getMessage();
  }  
    
 ?>     
         
        
   
    </form>
        <br>
		<br>
     
	<a href="eventosCadastrados.php">
	<button style="background: #FF0000	; border-radius: 6px; 
	padding: 15px; cursor: pointer; color: #fff; border: none; font-size: 16px;">Ver eventos cadastrados</button></a>
 


 

 
 </body>
</html>

