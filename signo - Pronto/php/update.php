<?php session_start(); ?>

<?php

//Chama Conexao
include 'conexao.php';
	$conn = getConnection();

	 	
	 
//Chamada SQL            nome, bairro, endereco, cep, estado, email, telefone, revistinha, quantidade, atracao, aceito
 $sql = "UPDATE formulario SET nome = :nom, bairro = :bai, endereco = :end, estado = :est, email = :mail, telefone = :tel ,revistinha = :rev, quantidade = :qtd, atracao = :atr, aceito = :act   WHERE id = :id ";

$upnome = 'nome';
$upbairro = 'bairro';


	
$stmt = $conn->prepare($sql);
$stmt->bindParam(':nom', $upnome);
$stmt->bindParam(':bai', $upbairro);

if($stmt->execute()){
	echo'deu CERTO!';
}else{
	echo'deu erro';
}	

?>
