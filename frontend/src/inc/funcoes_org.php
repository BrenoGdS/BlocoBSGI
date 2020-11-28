<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * funcoes_org-v1.5.php
 * Funçoes utilizadas p/ cadastro das organizações:
 * le_tipo_org, le_cidade, le_org_pai
 */






#########
// função para ler a organização
function le_organizacao($conn, $id_organizacao_sel=0){

try {
  $row = array();

  $query = "SELECT * FROM tb_organizacao ORDER BY nome_org;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {
        
      echo "<select name=\"idNomeOrg\" class='col-50'>";     // insere o conteúdo dentro do campo
      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_organizacao"];
          $nome_org = $row["nome_org"]; 
          if ($id == $id_organizacao_sel) {
              $selected = "selected";
          }
          
      echo "<option value=\"$id\" $selected>";
      echo  $nome_org . '</option >';
    }
    $stmt->bindValue(":id_organizacao", $id, PDO::PARAM_INT);      
          return $row;
          echo "</select>";
  }   
    
    
    
        
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}








#########
// função para ler o tipo da organização e inserir no cadastro
function le_tipo_org($conn, $id_tipo_org_sel=0){
    
try {
  $row = array();

  $query = "SELECT id_tipo_org, desc_tipo_org FROM tb_tipo_organizacao;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {
        
      echo "<select name=\"id_tipo_org\" class='col-25'>";     // insere o conteúdo dentro do campo
      echo '<option default value="">Tipo de Organização</option>';
      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_tipo_org"];
          $desc_tipo = $row["desc_tipo_org"]; 
          if ($id == $id_tipo_org_sel) {
              $selected = "selected";
          }
          
      echo "<option value=\"$id\" $selected>";
      #echo "Tipo de organização"; // aparece, mas fica esquisito
      echo  $desc_tipo . '</option >';
    }
    $stmt->bindValue(":id_tipo_org", $id, PDO::PARAM_INT);      
          return $row;
          echo "</select>";
  }
    
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}




#########
// função para ler a organização_pai e inserir no cadastro
function le_organização_pai($conn, $id_organizacao_pai_sel=0){
    
try {
  $row = array();

   /*  *AQUI FICA O AUTO-RELACIONAMENTO DA TB_ORGANIZAÇÃO*  */
  $query = "SELECT id_organizacao, id_tipo_org, id_organizacao_pai, nome_org FROM tb_organizacao ORDER BY nome_org;";  
  $stmt = $conn->prepare($query);
  
  $stmt->execute();
        
      echo "<select name=\"id_organizacao_pai\" class='col-25'>";     // insere o conteúdo dentro do campo
      echo '<option default value="">Organização-Pai</option>';
      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          #$selected = "";
          $id_organizacao = $row["id_organizacao"];
          $id_tipo_org = $row["id_tipo_org"];          
          $id = $row["id_organizacao_pai"];
          $nome_org = $row["nome_org"]; 
          #$id_pai = $row["id_organizacao_pai"];
          
      echo "<option value=\"$id\" $selected>";
      echo  $nome_org . '</option >';
    }
          #echo "</select>";
  
    
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}







#########
// função para ler as cidades da tb_cidade e inserir no cadastro
function le_cidade($conn, $id_cidade_sel=0){

try {
  $row = array();

  $query = "SELECT id_cidade, desc_cidade FROM tb_cidade ORDER BY desc_cidade;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {
        
      echo "<select name=\"cidade\" class='col-50'>";     // insere o conteúdo dentro do campo
      echo '<option default value="">Cidades</option>';
      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_cidade"];
          $desc_cidade = $row["desc_cidade"]; 
          if ($id == $id_cidade_sel) {
              $selected = "selected";
          }
          
      echo "<option value=\"$id\" $selected>";
      echo  $desc_cidade . '</option >';
    }
    $stmt->bindValue(":id_cidade", $id, PDO::PARAM_INT);      
          return $row;
          echo "</select>";
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}







#########
// função para exclusão da organização
function exclui_org($conn, $id_tipo_org_sel=0){
    
try {
  $row = array();

  $query = "SELECT id_organizacao FROM tb_organizacao WHERE id_organizacao = $id;";
  
  $stmt = $conn->prepare($query);
  $stmt->bindValue(":id_organizacao", $id, PDO::PARAM_INT);
  $stmt->execute();
  
    echo "Exclusão efetuada com sucesso";
    
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}






#########
// função para ler os estados da tb_UF em Consulta  --  VOU PRECISAR? 
function busca_UF($conn, $id_uf_sel=0){

try {
  $row = array();

  $query = "SELECT id_UF, nome_UF FROM tb_uf ORDER BY nome_UF;";
  $stmt = $conn->prepare($query);
  $stmt->execute();
        
      echo "<select name=\"estado\" >";     // insere o conteúdo dentro do campo
      echo '<option default value="">SELECIONE</option>';
      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          #$selected = "";
          $id_uf = $row["id_UF"];
          $nome_UF = $row["nome_UF"]; 
          
          echo "<option value=\"$id\" $selected>";
          echo  $nome_UF . '</option >';
      }

          echo "</select>";
 
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}







#########
// função para ler as cidades da tb_cidade em Consulta  --  VOU PRECISAR? 
function busca_cidade($conn, $id_cidade_sel=0){

try {
  $row = array();

  $query = "SELECT id_cidade, desc_cidade FROM tb_cidade ORDER BY desc_cidade;";
  $stmt = $conn->prepare($query);
  $stmt->execute();
        
      echo "<select name=\"cidade\" >";     // insere o conteúdo dentro do campo
      echo '<option default value="">SELECIONE</option>';
      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          #$selected = "";
          $id = $row["id_cidade"];
          $desc_cidade = $row["desc_cidade"]; 
          
      echo "<option value=\"$id\" $selected>";
      echo  $desc_cidade . '</option >';
    }

          echo "</select>";
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}








/*
#########
// função para ler a organização_pai e inserir no cadastro
function le_organização_pai($conn, $id_organizacao_pai_sel=0){
    
try {
  $row = array();

   /*  *AQUI FICA O AUTO-RELACIONAMENTO DA TB_ORGANIZAÇÃO*  */
/*  $query = "SELECT id_organizacao, id_tipo_org, id_organizacao_pai, nome_org FROM tb_organizacao;";  
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {
        
      echo "<select name=\"id_organizacao_pai\" class='col-25'>";     // insere o conteúdo dentro do campo
      echo '<option default value="">Organização-Pai</option>';
      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id_organizacao = $row["id_organizacao"];
          $id_tipo_org = $row["id_tipo_org"];          
          $id = $row["id_organizacao_pai"];
          $nome_org = $row["nome_org"]; 
          #$id_pai = $row["id_organizacao_pai"];
          
          if ($id == $id_organizacao_pai_sel) {
              $selected = "selected";
          }
          
      echo "<option value=\"$id\" $selected>";
      echo  $id . '</option >';
    }
    $stmt->bindValue(":id_organizacao_pai", $id_pai, PDO::PARAM_INT);      
          return $row;
          echo "</select>";
  }
    
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}
*/



/*
// função para ler a organização_pai - deixar adormecido
// baseado em function le_tipo_org de funcoes_org-v1.4.php
function le_org_pai($conn, $id_organizacao_pai=0){
    
try {
  $row = array();

  $query = "SELECT id_organizacao_pai, desc_tipo_org FROM tb_tipo_organizacao;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {
        
      echo "<select name=\"id_organizacao_pai\" class='col-25'>";     // insere o conteúdo dentro do campo
      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_organizacao_pai"];
          $desc_tipo = $row["desc_tipo_org"]; 
          if ($id == $id_organizacao_pai) {
              $selected = "selected";
          }
          
      echo "<option value=\"$id\" $selected>";
      #echo "Tipo de organização"; // aparece, mas fica esquisito
      echo  $desc_tipo . '</option >';
    }
    $stmt->bindValue(":id_organizacao_pai", $id, PDO::PARAM_INT);      
          return $row;
          echo "</select>";
  }
    
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}
*/



?>