<?php
//Link vem pela URL 
if(!empty($_GET['action']))
	{
		$action = $_GET['action'];
	}
//FORMULARIO DE CADASTRO VIA URL
//http://localhost/signo/?pagina=home&action=add
if($action == 'insert')
	{//CHAMA CONEXÂO	
	$conn = getConnection();
	//Seleciona o formulario
	
	
    //recebe variaveis de index. 
        $nome 		= addslashes($_POST["nome"]);
        $endereco 	= addslashes($_POST["endereco"]);
        $bairro 	= addslashes($_POST["bairro"]);
        $cep 		= addslashes($_POST["cep"]);
        $estado 	= addslashes($_POST["uf"]);
        $email 		= addslashes($_POST["email"]);
        $fone 		= addslashes($_POST["fone"]);
    //------------------------------------------	
        $revistinha =addslashes($_POST["tipo"]);
        $quantidade =addslashes($_POST["quantidade"]);
        $atracao	=addslashes($_POST["atracao"]);	
		$aceito		=addslashes($_POST["aceito"]);
       
	   
    echo
	 '<h6 class="alert alert-success" role="alert">Atualizado com sucesso! </h6>	
     <h6>',
     'Nome: ',			$nome,		'<br/>',
     'Endereço: ',		$endereco,	'<br/>',
     'Bairro: ',		$bairro,	'<br/>',
     'Cep: ',			$cep,		'<br/>', 
     'Estado: ',		$estado,	'<br/>',
     'E-mail: ',		$email,		'<br/>', 
     'Telefone: ',		$fone,		'<br/>',
     //------------------------------------------
     'Revistinha: ',	$revistinha,'<br/>',
     'Quantidade: ',	$quantidade,'<br/>',
     'Atração: ',		$atracao,	'<br/>', 
     'Alterar capa? ',	$aceito,	
     '</h6>';
   
//Chamada SQL
 $sql = "INSERT INTO formulario (nome, bairro, endereco, cep, estado, email, telefone, revistinha, quantidade, atracao, aceito )
VALUES ('$nome', '$endereco', '$bairro', '$cep', '$estado','$email' , '$fone', '$revistinha', '$quantidade', '$atracao', '$aceito') ";

	try{
	 $conn->exec($sql);
	 exit;
	
	
	}catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
}
/////////////////////////////////////////////////////////////
?>