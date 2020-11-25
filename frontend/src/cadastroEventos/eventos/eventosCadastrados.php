
	
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

    <title> BSGI - Eventos Cadastrados </title>

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
        <h1 class="titulo">Eventos Cadastrados</h1>
        

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
    //cadastro.php
    // lista cursos cadastrados  

	try{
		include_once "../inc/conectabd.inc.php";

		

			// lista eventos já cadastrados
			$query = "SELECT id_evento, id_organizacao, id_tipo_evento, titulo, data_evento, CEP_evento, logradouro_evento, num_evento, complemento_evento, bairro_evento, id_cidade_evento, uf FROM tb_evento;";
			$stmt = $conn->prepare($query);
			$stmt->execute();

			echo "<table border='1'>";
			echo "<tr>
					<th>Id</th>
					<th>Organizacao</th>
					<th>Tipo Evento</th>
					<th>Titulo</th>
					<th>Data Evento</th>
					<th>Cep</th>			
					<th>Logradouro</th>
					<th>Numero</th>
					<th>Complemento</th>
					<th>Bairro</th>
					<th>Cidade</th>
					<th>Estado</th>
					
					<th colspan=\"2\">Ações</th>
				</tr>";
			// busca os dados lidos do banco de dados
			while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)) {
				$id_evento = $row["id_evento"];
				$id_organizacao = $row["id_organizacao"];
				$id_tipo_evento = $row["id_tipo_evento"];
				$titulo = $row["titulo"];
				$data_evento = $row["data_evento"];
				$CEP_evento = $row["CEP_evento"];			
				$logradouro_evento = $row["logradouro_evento"];
				$num_evento = $row["num_evento"];
				$complemento_evento = $row["complemento_evento"];
				$bairro_evento = $row["bairro_evento"];	
				$id_cidade_evento = $row["id_cidade_evento"];
				$uf = $row["uf"];
						
				echo "<tr>";
				echo      "<td> $id_evento </td>";
				echo      "<td> $id_organizacao </td>";				
				echo      "<td> $id_tipo_evento </td>";
				echo      "<td> $titulo </td>";
				echo      "<td> $data_evento </td>";
				echo      "<td> $CEP_evento </td>";			
				echo      "<td> $logradouro_evento </td>";
				echo      "<td> $num_evento </td>";
				echo      "<td> $complemento_evento </td>";
				echo      "<td> $bairro_evento </td>";
				echo      "<td> $id_cidade_evento </td>";
				echo      "<td> $uf </td>";
				
				
				// cria link para EXCLUSAO do respectivo id_curso
				echo '<td><a href="exclusao.php?id='. $row["id_evento"] . '">Excluir</a></td>';
				// cria link para ALTERACAO do respectivo id_curso
				echo '<td><a href="form_alteracao.php?id='. $row["id_evento"] . '">Alterar</a></td>';
				
				echo "</tr>";
			}
			echo "</table>";
		} catch(PDOExeception $e){
			echo "Erro: ".$e -> getMessage();
		}  
?>  
        
        
        

    </form>
        

<br>
<br>

	<a href="form_insercao.php">
	<button style="background: #4CAF50	; border-radius: 6px; 
	padding: 15px; cursor: pointer; color: #fff; border: none; font-size: 16px;">Cadastrar novo Evento</button></a>
	
	<a href="index.php">
	<button style="background: #FF0000	; border-radius: 6px; 
	padding: 15px; cursor: pointer; color: #fff; border: none; font-size: 16px;">Voltar ao início</button></a>
	
	
	</body>
</html>
