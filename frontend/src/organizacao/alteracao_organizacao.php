<!HTML>
<!-- alteracao_organizacao-v1.2.php -->
	
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="..\css\estilos.css" rel="stylesheet">
    
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js" ></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    
    <title> BSGI - Organização </title>
    </head>
    
<body>
    <header>
  
  	<div id="cab_esq">
		<img class="contain" src="..\img\BSGI-logo3c.png" align=left width="99%">
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
        <h1 class="titulo">Cadastro Organizacional  -  Alteração</h1>    
    
            
<?php 
// efetua alteração do cadastro da organização informado em form_alteracao.php
    //$id_organizacao = $_GET["id"];
    $id_tipo_org = $_GET["id_tipo_org"];
    
    $id_organizacao_pai = $_GET["id_organizacao_pai"];
    $nome_org = $_GET["nome_org"];
    
    $id_lider_org1 = $_GET["Id_Lider_Organizacional1"];      // ESTÁ FALTANDO
    $id_lider_org2 = $_GET["Id_Lider_Organizacional2"];      // ESTÁ FALTANDO    
    
    $tel_fixo_org = $_GET["tel_fixo_org"];
    $tel_cel_org = $_GET["tel_cel_org"];
    $email_org = $_GET["email_org"];
        #INSERIR VALIDAÇÃO
    $CEP_org = $_GET["CEP_org"];
    $id_cidade_org = $_GET["id_cidade_org"];
    $logradouro_org = $_GET["logradouro_org"];
    $num_org = $_GET["num_org"];
    $complemento_org = $_GET["complemento_org"];
    $bairro_org = $_GET["bairro_org"];
    $id_organizacao = $_GET["id"];

    
  try {
    include_once "../inc/conectabd.php";

  $query = "UPDATE tb_organizacao 
        SET id_tipo_org = :id_tipo_org,
            
            id_organizacao_pai = :id_organizacao_pai

            nome_org = :nome_org,
            tel_fixo_org = :tel_fixo_org,
            tel_cel_org = :tel_cel_org,
            email_org = :email_org,
            CEP_org = :CEP_org,
            id_cidade_org = :id_cidade_org,
            logradouro_org = :logradouro_org,
            num_org = :num_org,
            complemento_org = :complemento_org,
            bairro_org = :bairro_org 
            WHERE id_organizacao = :id;";

    //id_organizacao_pai = :id_organizacao_pai,
    $stmt = $conn->prepare($query);

    echo "chkp1";    
    $stmt->bindValue(":id_tipo_org", $id_tipo_org, PDO::PARAM_INT);
    
    $stmt->bindValue(":id_organizacao_pai", $id_organizacao_pai, PDO::PARAM_INT);
    $stmt->bindValue(":nome_org", $nome_org, PDO::PARAM_STR);
    $stmt->bindValue(":tel_fixo_org", $tel_fixo_org, PDO::PARAM_INT);
    $stmt->bindValue(":tel_cel_org", $tel_cel_org, PDO::PARAM_INT); 
    $stmt->bindValue(":email_org", $email_org, PDO::PARAM_STR);
    $stmt->bindValue(":CEP_org", $CEP_org, PDO::PARAM_INT);
    $stmt->bindValue(":id_cidade_org", $id_cidade_org, PDO::PARAM_INT);
    $stmt->bindValue(":logradouro_org", $logradouro_org, PDO::PARAM_STR);
    $stmt->bindValue(":num_org", $num_org, PDO::PARAM_INT);
    $stmt->bindValue(":complemento_org", $complemento_org, PDO::PARAM_STR);
    $stmt->bindValue(":bairro_org", $bairro_org, PDO::PARAM_STR);
    $stmt->bindValue(":id_organizacao", $id_organizacao, PDO::PARAM_INT);

    // Lider 1 e 2
    //$stmt->bindValue(":variavel1", $variavel1, PDO::PARAM_STR);
    $stmt->execute();

    echo "Alteração efetuada com sucesso";
  
  } catch (PDOException $e){
      echo "Erro: ". $e->getMessage();
  }
  
?>  
 <br>
 <a href="form_consulta_org.php">Retornar para consulta</a>
 
 </body>
</html>