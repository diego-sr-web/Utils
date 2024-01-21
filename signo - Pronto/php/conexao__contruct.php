<?php
if(!class_exists('banco'))
{ class banco
	{
		private $linha; // contar o numero de registros encontrados
		private $array_dados;
		public $pdo;
		public $banco; 
		
		public function __construct()
		{
			try{
				//Servidor Local
				if($_SERVER['SERVER_NAME']=='localhost')
				{
				$host = 'localhost';
				$usuario = 'root';
				$senha = 'vertigo';
				$bd = 'signo';
				}else{
				//Banco Online
				$host = 'dns:';
				$user = 'banco_online';
				$pass = 'senha_online';
				$bd = 'signo';
				
				}
				
				$this->banco = $bd;
				$this->pdo = new PDO("mysql:dbname=".$bd.";host=".$host,$user,$senha);
				$this->pdo->exec("set names utf8");			
			}catch(PDOExeception $e){
				echo"vb". $e-> getMessage() ;
			
			}
			
		
		}
	}
}
$bd = new banco();
?>