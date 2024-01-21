<?php 
function getConnection(){
	
	$servername = "mysql:host=localhost;dbname=signo;charset=utf8";
	$username = "root";
	$password = "";
	try {
		$pdo = new PDO($servername, $username, $password);
		// set the PDO error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		return $pdo;
		 }
	catch(PDOException $e)
		{
		echo "Erro de conexão: " . $e->getMessage();
		}

}
?>
