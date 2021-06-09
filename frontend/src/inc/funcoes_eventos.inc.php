<?php  

function le_eventos($con, $id){

	try{
		$row = array();
		$query = "SELECT id_evento, id_organizacao, id_tipo_evento, titulo, date_format(data_evento,'%d-%m-%Y') as 
		data_evento, CEP_evento, id_cidade_evento, logradouro_evento, num_evento, complemento_evento, bairro_evento 
		FROM tb_evento where id_evento = :id;";
 
		$stmt = $con->prepare($query);
		$stmt->bindValue(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	} catch(PDOExeception $e){
		  echo "Erro: ".$e -> getMessage();
	}
}


?>  
