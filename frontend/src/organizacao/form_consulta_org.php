<!HTML>

<!-- form_consulta_org-v3.2.php 
     formulario de insercao das organizaçoes
<!-- versao 1.1 - baseado em cadastro_bd_pdo (form-insercao.php) e form_inserc_org-v4.1.php
     Script do CEP funcionando perfeitamente; Novo layout; 
     selects Tipo de Organização e cidade funcionando -->
<!-- Programas acessados: conectabd.php, estilos.css, consultaCEP.js, funcoes_org.php, 
     ALTERACAOinsercao_organizacao-v1.5.php -->
<!-- Aparece uma tela com as organizacoes listadas por nome, cidade e tipo -->


<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    
    <link href="..\css\estilos.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="consultaCEP.js"></script>

    <title> BSGI - Organização </title>

    </head>


<body>
    <header>
       
  	<div id="cab_esq">
		<img class="contain" src="..\img\BSGI-logo3c.png" align=left width="98%">
	</div> 
	<div id="cab_dir">
        <!-- novos icones azuis -->    
                <a href="../../src/perfil/form_lista_perfil.php"><img src="..\img\ic-users-b2-128.png" height="10%" ></a>
                <a href="http://www.bsgi.org.br/quemsomos/historia_da_soka_gakkai_no_brasil/" target="_blank"><img src="..\img\ic-information-b2-128.png" height="9%" ></a>
                <a href="https://www.instagram.com" target="_blank"><img src="..\img\ic-instagram-b2-128.png" height="8.1%" ></a>
                <a href="https://www.facebook.com/" target="_blank"><img src="..\img\ic-facebook-b2-128.png" height="8.1%"></a>
                <a href="../../index.php"><img src="..\img\ic-home-b2-128.png" height="9%"></a>

	</div>
    </header>
    

    <section id="barra"> </section>
    <section id="main"> 
        <h1 class="titulo">Cadastro Organizacional  -  Consulta</h1>

    
    <!-- *** FORMULÁRIO PARA INSERÇÃO DE DADOS *** -->
    <!-- <form id="formulario" action="ALTERACAOinsercao_organizacao-v1.5.php" method="GET"> -->
    <form id="formulario" action="manterOrganizacao.php" method="GET">
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
            input[type=reset] {
                background-color: red;  /* era #4CAF50 */
                color: white;
                padding: 12px 29px;     /* tamanho do botão */ 
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
            input[type=submit] {
                background-color: RGB(2, 130, 190); /*Azul BSGI */ /* era #4CAF50 */
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                filter: drop-shadow(0 2px 2px rgb(160, 160, 160));
                float: right;
                margin-right: 2%;      /* 21% alinha à direita; */
            }
            input[type=submit]:hover {
                background-color: dodgerblue; /* era #45a049 */
            }
            
            
            /* tamanho das colunas */
            .col-25 {
                float: left;
                width: 21.5%;   /* estava 25, depois 20% */
                margin-top: 2px;/* era 6px */
                padding: 5px;   /* espaço entre os campos */
            }
            .col-50 {
                float: left;
                width: 43%;     /* estava 50, depois 40% */
                margin-top: 2px;
                padding: 5px;   /* espaço entre os campos */
            } 
            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

        </style>
    

        <div class="row"> <!-- organiza os campos em blocos -->
            <?php
                include_once "../inc/conectabd.php"; // ativar o database
                include_once "../inc/funcoes_org.php";
            ?>

        
<?php 
//form_consulta_org-v1.1.php - lista de organizaçoes cadastradas 
#    
# importado de index.php do crud_contatos_aval1bim   
#
  try {
  include_once "../inc/conectabd.php"; // ativar o database

  // lista todo conteúdo cadastrado
  $query = 'SELECT * FROM tb_organizacao;';
  
  $stmt = $conn->prepare($query);
  $stmt->execute();
  

  echo "<table class='table table-bordered table-striped'>";
  echo "<style> tr{ padding: 0px; text-align: center; font-size: 13px }"."</style>";
  echo "<tr>
            <th>Id</th>
            <th>Tipo</th>
            <th>Organização-Pai</th>
            <th>Nome da Organização</th>
            
            <th>Tel fixo</th>
            <th>Celular</th>
            <th>E-mail</th>
            
            <th>CEP</th>
            <th>Cidade</th>
            <th>Logradouro</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Bairro</th>
            
            <th colspan='2'>Ações</th>
        </tr>";  
  
   // busca os dados lidos do banco de dados
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id_organizacao = $row["id_organizacao"];
            $id_tipo_org = $row["id_tipo_org"];
            $id_organizacao_pai = $row["id_organizacao_pai"];
            $nome_org = $row["nome_org"];
            
            $tel_fixo_org = $row["tel_fixo_org"];
            $tel_cel_org = $row["tel_cel_org"];
            $email_org = $row["email_org"];
            
            $CEP_org = $row["CEP_org"];
            $id_cidade_org = $row["id_cidade_org"];
            $logradouro_org = $row["logradouro_org"];
            $num_org = $row["num_org"];
            $complemento_org = $row["complemento_org"];
            $bairro_org = $row["bairro_org"];
            
		  
            echo "<tr>";
            echo "<style> td{ padding: 3px; text-align: center}"."</style>";
            echo "<td> $id_organizacao </td>";
            echo "<td> $id_tipo_org </td>";
            echo "<td> $id_organizacao_pai </td>";
            echo "<td> $nome_org </td>";
            
            echo "<td> $tel_fixo_org </td>";
            echo "<td> $tel_cel_org </td>";
            echo "<td> $email_org </td>";
            
            echo "<td> $CEP_org </td>";
            echo "<td> $id_cidade_org </td>";
            echo "<td> $logradouro_org </td>";
            echo "<td> $num_org </td>";
            echo "<td> $complemento_org </td>";
            echo "<td> $bairro_org </td>";            


            // cria link para ALTERACAO do respectivo id
            echo '<td><a href="form_alteracao_org.php?id='. $row['id_organizacao'] . '">Alterar</a></td>';  

            // cria link para EXCLUSAO do respectivo id
            echo '<td><a href="exclui_org.php?id='. $row["id_organizacao"] . '">Excluir</a></td>';
            echo "</tr>";
	  }
          
	  echo "</table>";
          echo "</div>";

          
  } catch (PDOException $e){
      echo "Erro: ". $e->getMessage();
      }
?> 
    
        </div>
    </div>

    <input type="submit" value="Novo cadastro" class="btn btn-primary btn-sm">

    <br>
    <br>
    </form>
       
</body>
</html>