<?php include 'php/conexao.php'; //Chama Conexao?>
<p class="display-4"></p>
<a href="?pagina=home&action=add" class="btn btn-primary"> Cadastrar </a>
<a href="?pagina=home&action=listar" class="btn btn-primary"> Lista </a>

<!--Quebra de linha-->
<br/>&nbsp;
<?php 
//Pucha o codigo pela action para economizar espaço.
$action = '';
?>
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



//UPDATE//////////////////////////////////////
if($action == 'update'){
	$id = addslashes($_POST["id"]); 
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
		

//Conexao
	$conn = getConnection();
//Chamada SQL            nome, bairro, endereco, cep, estado, email, telefone, revistinha, quantidade, atracao, aceito
 $sql = "UPDATE formulario SET nome = :nom, bairro = :bai, endereco = :end, estado = :est, email = :mail, telefone = :tel ,revistinha = :rev, quantidade = :qtd, atracao = :atr, aceito = :act   WHERE id = :id ";
	
$stmt = $conn->prepare($sql);
$stmt->bindParam(':nom', 	$nome);
$stmt->bindParam(':bai', 	$bairro);
$stmt->bindParam(':end', 	$endereco);
$stmt->bindParam(':est', 	$estado);
$stmt->bindParam(':mail', 	$email);
$stmt->bindParam(':tel', 	$fone);
$stmt->bindParam(':rev', 	$revistinha);
$stmt->bindParam(':qtd', 	$quantidade);
$stmt->bindParam(':atr', 	$atracao);
$stmt->bindParam(':act', 	$aceito);
$stmt->bindParam(':id', 	$id);

if($stmt->execute()){
	echo'<h6 class="alert alert-success" role="alert">Dados atualizados com Sucesso! </h6>	
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
}else{
	echo'deu erro';
}

	 
	
}
//UPDATE//////////////////////////////////////
if($action == 'edit'){
	$id = $_GET['id'];
	//CHAMA CONEXÂO	
	$conn = getConnection();
//Seleciona o formulario
	$sql ='SELECT * FROM formulario  WHERE id = :id';
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	
	$result = $stmt->fetchAll();
	  foreach ($result as $dados)
	  $id = $dados['id'];
	  
	

 	
	?>
    <p class="display-4">Editar Cadastro</p>
    <form action="?action=update" method="post" name="formCadastro" id="formCadastro">
  <div class="form-group">
   	
    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>" >
    
    <label for="exampleFormControlInput1">Nome</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" value="<?php echo $dados['nome']; ?>" required minlength="3" maxlength="80">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Endereço</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="endereco" value="<?php echo $dados['endereco']; ?>" placeholder="rua Batista Sabin " maxlength="80">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Bairro</label>
    <input type="text" class="form-control" name="bairro" id="exampleFormControlInput1" value="<?php echo $dados['bairro']; ?>" placeholder="Hauer" maxlength="80">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Cep</label>
    <input type="text" class="form-control" name="cep" placeholder="83.605-000" value="<?php echo $dados['cep']; ?>" onkeypress="$(this).mask('00.000-000')"  m>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Estado</label>
    <input type="text" class="form-control" name="uf" id="exampleFormControlInput1" value="<?php echo $dados['estado']; ?>" placeholder="Paraná"maxlength="50">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">E-mail</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value="<?php echo $dados['email']; ?>" placeholder="name@example.com" required maxlength="100">
  </div>
  <div class="form-group">
   <label for="exampleFormControlInput1" >Telefone</label>
    <input type="text" class="form-control" name="fone"  placeholder="(41)3392-3238" value="<?php echo $dados['telefone']; ?>" onkeypress="$(this).mask('(00) 0000-00009')" required >
        
  </div>

 
	
    <div class="col-auto"><h3>Dados para Produção</h3> </div>

<p>

   <h4> tipo de revistinha</h4>
	<?php echo'<p class="alert alert-primary" role="alert"> Você havia marcado o campo <i>('. $dados['revistinha'].')</i>   anteriormente, marque o campo desejado! <p/>' ;?>
    <div class="form-check">
    	<input type="radio" name="tipo" id="convite" value="Convite"/><label for="convite">&nbsp;Convite &nbsp;</label> 
        <input type="radio" name="tipo" id="lembranca" value="Lembrança"/><label for="lembranca">&nbsp;Lembrança &nbsp;</label> 
        <input type="radio" name="tipo" id="lembrancaconvite" value="Lembrança e Convite"/><label for="lembrancaconvite" >&nbsp;Lembrança-Convite &nbsp;
		<input type="radio" name="tipo" id="nenhum" value="Nenhum" c /><label for="nenhum"  >&nbsp;Nenhum &nbsp;</label>        
</label> 
    </div>
      <div class="form-group col-md-6">
      <label for="inputEmail4">Quantidade</label>
      <input type="number" class="form-control" min="0" id="inputEmail4" value="<?php echo $dados['quantidade']; ?>" name="quantidade" placeholder="500">
    </div>
</p>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Atrações do Evento</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="atracao" placeholder="<?php echo $dados['atracao']; ?>" rows="3"></textarea>
  </div>
  
  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="aceito" id="sim" value="Aceitar sugestão de foto para capa." >
  <input class="form-check-input" type="hidden" name="aceito" id="não" value="Não alterar foto da capa." checked> 
  
  <label class="form-check-label">
    Aceitar sugestão de foto para capa
  </label>
</div>
  
  
    <div class="form-group">
    <label for="exampleFormControlFile1">Imagens</label>
    <input type="file" class="form-control-file" placeholder="Arquivo" name="img" id="exampleFormControlFile1">
  </div>
  

  <input type="submit" class="btn btn-success" name="enviado" value="Atualizar"/>
  <a href="?pagina=home&action=listar" class="btn btn-secondary">Cancelar</a>
</form>	
<?php
}
//////////////////////////////////////////////








//DELETAR//////////////////////////////////////
if($action=='delete'){
	$id = $_GET['id'];
//CHAMA CONEXÂO
	$conn = getConnection();  

	 	
	 
//Chamada SQL            
 $sql = "DELETE FROM formulario WHERE id = :id ";
//numero do formulario pra deletar
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);

if($stmt->execute()){
	echo'<h6 class="alert alert-danger" role="alert">Dados excluidos com Sucesso! </h6>';
}else{
	echo'deu erro';
}
	
	 $action=='';
}
///////////////////////////////////////////////






//Listar/////////////////////////////////////////////////////
if($action == 'listar'){
//CHAMA CONEXÂO	
	$conn = getConnection();
//Seleciona o formulario
	$sql ="SELECT * FROM formulario";
	//Prepara dados
	$stmt = $conn->prepare($sql);
	//Processa dados
	$stmt->execute();
	//Lista todos os campos do banco
	$array_dados = $stmt->fetchAll();
	//Envia o numero de resultados do banco
	$result = $stmt->rowCount();
	
	$total = $result ;
	
	if($total=='')
	{
		echo '<h6 class= "alert alert-warning" role="alert" >Nenhum arquivo encontrado!</h6>';
	
	
	}else{?>
	<table class="table table-striped">	
		<thead>	
		<tr>
        
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th align="center">Opções</th>
        </tr>
        </thead>
        <tbody>
       		<?php	
            //exibe dados
            foreach ($array_dados as $dados){?>
             
            <tr>
             
            <td><?php echo $dados['nome']; ?></td>
            <td><?php echo $dados['telefone']; ?></td>
            <td><?php echo $dados['email']; ?></td>            	
                <td><a class="btn btn-success btn-sm" href="?action=edit&id=<?php echo $dados['id'] ?>" role="button">Editar</a></td>
                <td><a class="btn btn-danger btn-sm" href="?action=delete&id=<?php echo $dados['id'] ?>" role="button">Excluir</a></td>
            </tr>
			<?php
                
                $nome = $dados['nome'];
                $telefone = $dados['telefone'];
                $email = $dados['email'];
                }
            }?>
	 </tbody>
	
    </table>
	
	<?php }
//////////////////////////////////////////////////////////////////
	
	
	
	
	
	
	
	
	
	
	
	
//ADICIONAR//////////////////////////////////////////////////////	
//FORMULARIO DE CADASTRO VIA URL
//http://localhost/signo/?pagina=home&action=add

if($action == 'add')
	{?>
<p class="display-4">Cadastro</p>
    <form action="?action=insert" method="post" name="formCadastro" id="formCadastro">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nome</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" placeholder="Miguel Sousa" required minlength="3" maxlength="80">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Endereço</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="endereco" placeholder="rua Batista Sabin " maxlength="80">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Bairro</label>
    <input type="text" class="form-control" name="bairro" id="exampleFormControlInput1" placeholder="Hauer" maxlength="80">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Cep</label>
    <input type="text" class="form-control" name="cep" placeholder="83.605-000"onkeypress="$(this).mask('00.000-000')"  m>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Estado</label>
    <input type="text" class="form-control" name="uf" id="exampleFormControlInput1" placeholder="Paraná"maxlength="50">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">E-mail</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com" required maxlength="100">
  </div>
  <div class="form-group">
   <label for="exampleFormControlInput1" >Telefone</label>
    <input type="text" class="form-control" name="fone"  placeholder="(41)3392-3238" onkeypress="$(this).mask('(00) 0000-00009')" required >
        
  </div>

 
	
    <div class="col-auto"><h3>Dados para Produção</h3> </div>

<p>

   <h4> tipo de revistinha</h4>

    <div class="form-check">
    	<input type="radio" name="tipo" id="convite" value="Convite"/><label for="convite">&nbsp;Convite &nbsp;</label> 
        <input type="radio" name="tipo" id="lembranca" value="Lembrança"/><label for="lembranca">&nbsp;Lembrança &nbsp;</label> 
        <input type="radio" name="tipo" id="lembrancaconvite" value="Lembrança e Convite"/><label for="lembrancaconvite" >&nbsp;Lembrança-Convite &nbsp;
		<input type="radio" name="tipo" id="nenhum" value="Nenhum" checked/><label for="nenhum"  >&nbsp;Nenhum &nbsp;</label>        
</label> 
    </div>
      <div class="form-group col-md-6">
      <label for="inputEmail4">Quantidade</label>
      <input type="number" class="form-control" min="0" id="inputEmail4" name="quantidade" placeholder="500">
    </div>
</p>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Atrações do Evento</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="atracao" rows="3"></textarea>
  </div>
  
  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="aceito" id="sim" value="Aceitar sugestão de foto para capa." >
  <?php $_SESSION['logado'] = true; ?> 
  <input class="form-check-input" type="hidden" name="aceito" id="não" value="Não alterar foto da capa." checked> 
  
  <label class="form-check-label">
    Aceitar sugestão de foto para capa
  </label>
</div>
  
  
    <div class="form-group">
    <label for="exampleFormControlFile1">Imagens</label>
    <input type="file" class="form-control-file" placeholder="Arquivo" name="img" id="exampleFormControlFile1">
  </div>
  

  <input type="submit" class="btn btn-success" name="enviado" value="Salvar"/>
  <a href="?" class="btn btn-secondary">Cancelar</a>
</form>	
	
		
<?php } ?>