<?php
function getConnection(){
	
define('SERVER', 'localhost');
define('BANCO', 'login');
define('SENHA', 'vertrigo');
define('USER', 'root');

try{

$conn = new pdo('mysql:host=' . SERVER . ';dbname=' . BANCO, USER, SENHA);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		return $conn;

}catch(PDOException $e){
echo "Erro gerado " . $e->getMessage(); 
}
}
//essa é a chamadada da função
//$conn = getConnection();

?>