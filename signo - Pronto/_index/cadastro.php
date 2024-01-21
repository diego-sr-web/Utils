<?php session_start();


$_SESSION['fnome'] 			= $_POST['nome'];
$_SESSION['fendereco']		= $_POST["endereco"];
$_SESSION['fbairro']		= $_POST["bairro"];
$_SESSION['fcep']			= $_POST["cep"];
$_SESSION['festado']		= $_POST["uf"];	
$_SESSION['femail']			= $_POST["email"];
$_SESSION['ffone']			= $_POST["fone"];
$_SESSION['ftipo']			= $_POST["tipo"];
$_SESSION['fquantidade']	= $_POST["quantidade"];
$_SESSION['fatracao']		= $_POST["atracao"];
$_SESSION['faceito']		= $_POST["aceito"];

?>
<?php include 'includes/cabecalho.php';?>  

	
	<?php
	
	
    //recebe variaveis de index. 
        $nome 		= $_POST["nome"];
        $endereco 	= $_POST["endereco"];
        $bairro 	= $_POST["bairro"];
        $cep 		= $_POST["cep"];
        $estado 	= $_POST["uf"];
        $email 		= $_POST["email"];
        $fone 		= $_POST["fone"];
    ////////////////////////////////	
        $revistinha =$_POST["tipo"];
        $quantidade =$_POST["quantidade"];
        $atracao	=$_POST["atracao"];	
		$aceito		=$_POST["aceito"];
        
    ?>          
      
     <!-- CONTEUDO -->
    <div class="container">
     <form action="php/create.php" method="post">  
    <div class="col-auto"><h2>Dados para Entrega</h2> </div>
    <?php
    echo
     "<h4>",
     "Nome: ",			$nome,		"<br/>",
     "Endereço: ",		$endereco,	"<br/>",
     "Bairro: ",		$bairro,	"<br/>",
     "Cep: ",			$cep,		"<br/>", 
     "Estado: ",		$estado,	"<br/>",
     "E-mail: ",		$email,		"<br/>", 
     "Telefone: ",		$fone,		"<br/>",
     ///////////////////////////////////////
     "Revistinha: ",	$revistinha,"<br/>",
     "Quantidade: ",	$quantidade,"<br/>",
     "Atração: ",		$atracao,	"<br/>", 
     "Alterar capa? ",	$aceito,	
     "</h4>";
    ?>
    <button type="submit" class="btn btn-outline-warning" id ="submit">Enviar</button>
    <button type="reset" class="btn btn-outline-warning" id ="reset">Alterar dados</button>
    
    </form>
                    
    </div>
    























    
    <!-- CONTEUDO -->
 <?php include 'includes/rodape.php';?>  



<!--Botão Alterar dados-->
 <script type="text/javascript">
    document.getElementById("reset").onclick = function () {
        location.href = "index.php";
    };
</script> 
       
    
    
   























    
    
