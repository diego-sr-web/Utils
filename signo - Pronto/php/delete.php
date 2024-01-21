<?php

//Chama Conexao
include 'conexao.php';
	$conn = getConnection();

	 	
	 
//Chamada SQL            nome, bairro, endereco, cep, estado, email, telefone, revistinha, quantidade, atracao, aceito
 $sql = "DELETE FROM formulario WHERE id = :id ";


//numero do formulario pra deletar
$id = 44;



	
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);

if($stmt->execute()){
	echo'deu CERTO!';
}else{
	echo'deu erro';
}	

?>
