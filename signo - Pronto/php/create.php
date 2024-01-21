<?php session_start(); 

//Valida Formulario Esta com erro.
//if(isset($_SESSION["fnome"])){
//    header("Location: index.php");
//	   exit();
//	}else{
//		echo'deu';
//}
?>

<?php

//Chama Conexao
include 'conexao.php';
	$conn = getConnection();


//Chama variaveis de sessão
     $nome 			= $_SESSION['fnome'];
	 $endereco 		= $_SESSION['fendereco'];
	 $bairro		= $_SESSION['fbairro'];
	 $cep			= $_SESSION['fcep'];
	 $estado 		= $_SESSION['festado'];
	 $email 		= $_SESSION['femail'];
	 $fone 			= $_SESSION['ffone'];
	 $revistinha 	= $_SESSION['ftipo'];
	 $quantidade 	= $_SESSION['fquantidade'];
	 $atracao 		= $_SESSION['fatracao'];
	 $aceito		= $_SESSION['faceito'];
	 	
	 
//Chamada SQL 
 $sql = "INSERT INTO formulario (nome, bairro, endereco, cep, estado, email, telefone, revistinha, quantidade, atracao, aceito )
VALUES ('$nome', '$endereco', '$bairro', '$cep', '$estado','$email' , '$fone', '$revistinha', '$quantidade', '$atracao', '$aceito') ";

	try{
	 $conn->exec($sql);
	 //pode ser feito com BindValue
	 header('Location:../index.php?msg=enviado');
	 session_destroy();
	 exit;
	
	
	}catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    } 

?>
