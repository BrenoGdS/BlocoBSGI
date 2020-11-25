<!DOCTYPE html>
<!-- alteracao.php -->
<html>
	<head>
	  <title>Cadastro de eventos - Alteração</title>
	  <meta charset="utf-8">
	</head>
	<body>
<?php 
// efetua alteração dos eventos informados em form_alteracao.php
$evento = $_GET["evento"];
$organizacao = $_GET["organizacao"];
$tipo = $_GET["tipo"];
$tit = $_GET["tit"];
$data = $_GET["data"];
$cep = $_GET["cep"];


$logradouro = $_GET["logradouro"];
$num = $_GET["num"];
$complemento = $_GET["complemento"];
$bairro = $_GET["bairro"];
$cidade = $_GET["cidade"];
$estado = $_GET["estado"];

  try {
  include_once "../inc/conectabd.inc.php";

  $query = "UPDATE tb_evento 
  SET   id_evento = :evento,
        id_organizacao = :organizacao,
        id_tipo_evento = :tipo,
		titulo = :tit,
        data_evento = :data,
        CEP_evento = :cep,   
		logradouro_evento = :logradouro,
        num_evento = :num,
		complemento_evento = :complemento,
		bairro_evento = :bairro,
		id_cidade_evento = :cidade,
		uf = :estado
  WHERE id_evento = :evento;";
    
  # echo $query.'<br>';
  $stmt = $conn->prepare($query);	
	$stmt -> bindValue(":id_evento",$evento, PDO::PARAM_STR);
	$stmt -> bindValue(":id_organizacao",$organizacao, PDO::PARAM_INT);
	$stmt -> bindValue(":id_tipo_evento",$tipo, PDO::PARAM_STR);
	$stmt -> bindValue(":titulo",$tit, PDO::PARAM_STR);
	$stmt -> bindValue(":data_evento",$data, PDO::PARAM_STR);
	$stmt -> bindValue(":CEP_evento",$cep, PDO::PARAM_STR);
	$stmt -> bindValue(":logradouro_evento",$logradouro, PDO::PARAM_STR);
	$stmt -> bindValue(":num_evento",$num, PDO::PARAM_STR);
	$stmt -> bindValue(":complemento_evento",$complemento, PDO::PARAM_STR);
	$stmt -> bindValue(":bairro_evento",$bairro, PDO::PARAM_STR);
	$stmt -> bindValue(":id_cidade_evento",$cidade, PDO::PARAM_STR);
	$stmt -> bindValue(":uf",$estado, PDO::PARAM_STR);
	$stmt->bindValue(":evento", "evento", PDO::PARAM_INT); 

  $stmt->execute();

  echo"Alteração efetuada com sucesso";

  } catch (PDOException$e) {
  echo"Erro: ".$e->getMessage();
  }
?>  
 <br>
 <a href="eventosCadastrados.php">Ver eventos cadastrados</a>
 
 </body>
</html>

