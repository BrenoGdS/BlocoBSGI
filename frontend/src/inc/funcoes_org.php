<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * funcoes_org.php
 * Funçoes utilizadas p/ cadastro das organizações:
 * le_UF, le_cidade
 */


function le_UF($conn, $id_uf_sel=0){  
//function le_UF($conn){    
try { 
  #echo "<br>";  
  #echo "ckpnt funcoes_org1"."<br>";
  $row = array();
  //$query = "SELECT id_UF, nome_UF FROM tb_uf where id_UF = $id_uf;";
  $query = "SELECT id_UF, nome_UF FROM tb_uf ORDER BY id_UF;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {
      //echo "<select name=\"id_UF\" class='col-25' >";
      echo "<div class='col-25'>";
      echo "<select name=\"id_UF\" class='form-control mb-1 mr-sm-2'>";
      // class='form-control mb-1 mr-sm-2'
      //busca os dados no banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id_uf = $row["id_UF"];
          $id_uf_sel = $row["nome_UF"];
          
          if ($id_uf == $id_uf_sel) {
              $selected = "selected";
          }
          
      
      echo "<option value=\"$id_uf\" $selected>";
      echo  $id_uf_sel . '</option >';
  
      }
      $stmt->bindValue(":id_uf", $id_uf_sel, PDO::PARAM_STR);

  
      #echo "ckpnt funcoes_org2"."<br>";
  //$row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row;
      echo "</select>";
      #echo "</div>";
  }

    
  } catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}


/*
function le_UF1($conn, $id_uf){  
//function le_UF($conn){    
try { 
  echo "<br>";  
  echo "ckpnt funcoes_org1"."<br>";
  $row = array();
  $query = "SELECT id_UF, nome_UF FROM tb_uf where id_UF = $id_uf;";
  $stmt = $conn->prepare($query);
  $stmt->bindValue(":id_uf", $id_uf, PDO::PARAM_STR);
  $stmt->execute();

# echo "<select name=\"id_curso\" onchage=\"obterCurso(str)\">";    // ????? - p/ obter em Ajax
  
  echo "ckpnt funcoes_org2"."<br>";
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  return $row;  
    
  } catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}
*/


function le_cidade($conn, $id_cidade_sel=0){  
   
try { 

  $row = array();
  $id_uf_sel;
  //$query = "SELECT id_Cidade, desc_cidade FROM tb_cidade ORDER BY desc_cidade WHERE;";
  // tenho que fazer um join com tb_UF ($id_uf_sel)
  $query = "SELECT c.id_cidade, c.desc_cidade, c.id_UF
            FROM tb_cidade as c
            JOIN tb_uf as UF ON c.id_UF = UF.id_UF;";
  
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {

      echo "<div class='col-25'>";
      echo "<select name=\"idCidadeOrga\" class='form-control mb-1 mr-sm-2'>";

      //busca os dados no banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          //$id_cidade_org = $row["id_cidade"];   // funciona parcialmente
          //$id_cidade_org = $row["id_cidade_org"]; // deu erro
          $id_cidade = $row["id_cidade"];
          $id_cidade_sel = $row["desc_cidade"];
          
          //if ($id_cidade_org == $id_cidade_sel) {   // funciona parcialmente
          if ($id_cidade == $id_cidade_sel) { 
              $selected = "selected";
          }
      
      //echo "<option value=\"$id_cidade_org\" $selected>"; // funciona parcialmente
      echo "<option value=\"$id_cidade\" $selected>";
      echo  $id_cidade_sel . 'oi'. '</option >';
      $id_cidade_org = $id_cidade_sel;
      }
      
      $stmt->bindValue(":id_cidade_org", $id_cidade_org, PDO::PARAM_STR);
      return $row;
      echo "</select>";
      #echo "</div>";
  }

    
  } catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}





























?>