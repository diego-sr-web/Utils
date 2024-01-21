<?php
//Chama Conexao
include 'conexao.php';
	$conn = getConnection();
	//Seleciona o formulario
	$sql ="SELECT * FROM formulario";
	//Prepara dados
	$stmt = $conn->prepare($sql);
	//Processa dados
	$stmt->execute();
	//Executa dados
	$result = $stmt->fetchAll();
	//exibe dados
	//linha para texte se esta executando os dados.
	//var_dump($result);
	
	foreach ($result as $values){
		echo 'nome:'.$values['nome'].'<br>';
	}
	
?>