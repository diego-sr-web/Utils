<?php
session_start();
if(!empty($_SESSION['logado'])){

include'../view/cabecalho.php';		
?>
		<!--Corpo-->

<div class="container">
<br />




<!--Corpo-->
	<?php
		
		
		//DEFINE VARIAVEIS
		$matricula = $_SESSION['logado'];
		$nome		= $_SESSION['nome'];
        $entrada 	= addslashes($_POST["entrada"]);
        //data
		date_default_timezone_set('America/Sao_Paulo');
		$data = 	date ("d-m-y");
       	//hora 
        $hora = date('H:i');
		
		//ip
			function getUserIP(){
				$client  = @$_SERVER['HTTP_CLIENT_IP'];
				$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
				$remote  = $_SERVER['REMOTE_ADDR'];
			
				if(filter_var($client, FILTER_VALIDATE_IP))
				{
					$ip = $client;
				}
				elseif(filter_var($forward, FILTER_VALIDATE_IP))
				{
					$ip = $forward;
				}
				else
				{
					$ip = $remote;
				}
			
				return $ip;
			}
			
			
			$user_ip = getUserIP();
			
			
        
$local = 'Brasil';
	

	
	
//INSERE NO BANCO DE DADOS
include 'conexao.php';
//CHAMA CONEXAO
$conn = getConnection();

 $sql = "INSERT INTO ponto (usuario, numMatricula, ip, localizacao, horario, data, entr_saida)
VALUES ('$nome', '$matricula', '$user_ip', '$local', '$hora', '$data','$entrada') ";

	try{
	 $conn->exec($sql);
	echo '<div class="alert alert-primary" role="alert"><b>'.$entrada . '</b>, cadastrada com sucesso!
</div>';
	session_destroy();	
	exit;	
	
	
	}catch(PDOException $e)
    {
    echo $sql . "Algo deu errado!<br>" . $e->getMessage();
    }



//session
 }else{
	 header('Location: ../index.php?msg=erroacesso');
}
include'../view/rodape.php';	
?>
