<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * funcoes_org-v1.4.php
 * Funçoes utilizadas p/ cadastro das organizações:
 * le_tipo_org, le_org_pai
 */



// função para ler a organização
function le_organizacao($conn, $id_org_sel=0){

try {
  $row = array();

  $query = "SELECT * FROM tb_tipo_organizacao;";
  $stmt = $conn->prepare($query);
  $stmt->execute();  
    
    
    
    
        
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}




// função para ler o tipo da organização
function le_tipo_org($conn, $id_tipo_org_sel=0){
    
try {
  $row = array();

  $query = "SELECT id_tipo_org, desc_tipo_org FROM tb_tipo_organizacao;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {
        
      echo "<select name=\"id_tipo_org\" class='col-25'>";     // insere o conteúdo dentro do campo
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