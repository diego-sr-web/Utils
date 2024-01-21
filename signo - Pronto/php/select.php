<?php include '../includes/cabecalho.php';?> 

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
		$id = $values['id'];
		$nome = $values['nome'];
		$telefone = $values['telefone'];
		$email = $values['email'];
		
		//print $id;
		
	}
?>










<div class="container">
<h4>Editar</h4>
<a class="btn btn-warning"  href="#"><i class="glyphicon glyphicon glyphicon-plus"></i>Cadastrar</a>
<a class="btn btn-secondary" href="#">Listar</a>
<hr>
<?php 
$action= '';
?>









































<?php include '../includes/rodape.php';?> 