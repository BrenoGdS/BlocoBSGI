<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    
    <title> BSGI - Organização </title>
    </head>
</html>


<?php 
  //insercao_organizacao-v1.5.php
  //efetua inclusao na tabela Organizacao informado em form_insercao.php
  // nova organização de acordo com layout v4


  $nome_org = $_GET["nome_org"];
  $id_tipo_org = $_GET["id_tipo_org"];  

  //$id_lider_org1 = $_GET["id_lider_organizacional"];      // ESTÁ FALTANDO, mas NÃO É NESSA TABELA QUE INSERE (só SELECIONA)
  $id_lider_org2 = $_GET["Id_Lider_Organizacional2"];      // ESTÁ FALTANDO, mas NÃO É NESSA TABELA QUE INSERE (só SELECIONA)

  $tel_fixo_org = $_GET["tel_fixo_org"];
  $tel_cel_org = $_GET["tel_cel_org"];  
  $email_org = $_GET["email_org"];

    if(!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email_org)){
    echo "E-mail inválido.";
    }

    
  $CEP_org = $_GET["cep_org"];
  $id_cidade_org = $_GET["id_cidade_org"];
  $logradouro_org = $_GET["logradouro_org"];
  $num_org = $_GET["num_org"];
  $complemento_org = $_GET["complemento_org"];
  $bairro_org = $_GET["bairro_org"];
  
  
  try {
  include_once "../inc/conectabd.php";
  

  $query = "INSERT INTO tb_organizacao 
      (nome_org, id_tipo_org, tel_fixo_org, tel_cel_org, email_org, 
      cep_org, id_cidade_org, logradouro_org, num_org, complemento_org, bairro_org) 
      values (:nome_org, :id_tipo_org, :tel_fixo_org, :tel_cel_org, :email_org,  
      :CEP_org, :id_cidade_org, :logradouro_org, :num_org, :complemento_org, :bairro_org);";   

  
  $stmt = $conn->prepare($query);
  $stmt->bindValue(":nome_org", $nome_org, PDO::PARAM_STR);  
  #$stmt->bindValue(":id_organizacao_pai", $id_organizacao_pai, PDO::PARAM_INT);
  //$stmt->bindValue(":id_lider_organizacional", $id_lider_org1, PDO::PARAM_INT);
  $stmt->bindValue(":id_tipo_org", $id_tipo_org, PDO::PARAM_INT);  

  $stmt->bindValue(":tel_fixo_org", $tel_fixo_org, PDO::PARAM_INT);
  $stmt->bindValue(":tel_cel_org", $tel_cel_org, PDO::PARAM_INT);
  $stmt->bindValue(":email_org", $email_org, PDO::PARAM_STR);  

  $stmt->bindValue(":CEP_org", $CEP_org, PDO::PARAM_INT);
  $stmt->bindValue(":id_cidade_org", $id_cidade_org, PDO::PARAM_INT);
  $stmt->bindValue(":logradouro_org", $logradouro_org, PDO::PARAM_STR);
  $stmt->bindValue(":num_org", $num_org, PDO::PARAM_INT);
  $stmt->bindValue(":complemento_org", $complemento_org, PDO::PARAM_STR);
  $stmt->bindValue(":bairro_org", $bairro_org, PDO::PARAM_STR);

  
  $stmt->execute();
  
  echo "<div><style> div { padding: 10px;}"."</style>";
  echo "<h5>Inclusão efetuada com sucesso</h5>";
  echo "<br>";
  echo "<a href='manterOrganizacao.php'>Retornar à tela de cadastro organizacional</a>";
  
  } catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
	  
  
?>