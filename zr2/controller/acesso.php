<?php include 'conexao.php';
	$id = ($_POST["id"]);
	$senha = ($_POST["senha"]);
	
	if(empty($id)){
		header('Location: ../index.php');
		exit;
	}else{
		
		
		 try{
		 $conn = getConnection();
		  $sql = "SELECT * FROM cadastro WHERE matricula = :id AND senha = :senha ";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':id', 	$id, PDO::PARAM_STR);
				$stmt->bindParam(':senha', 	$senha, PDO::PARAM_STR);
				$stmt->execute();
				$num_registro = $stmt->rowCount();
				if($num_registro !=0){
					session_start();
					$_SESSION['logado'] = $id;
					header('Location:../ponto.php');
					
				
				}else{
					header('Location:../index.php?msg=erro');
		exit;
				}
		 } catch (Exception $e) {
			echo 'Erro de detectado: ',  $e->getMessage(), "\n";
		}
	}
 
?>