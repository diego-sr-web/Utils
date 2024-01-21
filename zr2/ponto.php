<?php 
session_start();
if(!empty($_SESSION['logado'])){
	//Recebe n° matricula
	$id = $_SESSION['logado'];
	
	include 'controller/conexao.php';
	$conn = getConnection();
//Seleciona o formulario
	$sql ='SELECT * FROM cadastro  WHERE matricula = :id';
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	
	$result = $stmt->fetchAll();
	  foreach ($result as $dados)
	  $nome = $dados['nome'];
	  
	
	?>	




<?php include 'view/cabecalho.php' ?>

<!--Corpo-->

<div class="container">

<div class="row">

<form action="controller/registra_ponto.php" method="post">

  <div class="form-group">
   <br/>
   
     <div class="form-control form-control-lg" id="UsuarioPonto">
     <?php echo $nome;
	 	$_SESSION['nome'] = $nome;
	 ?>
          </div>
    
     </div>
  <div class="form-control form-control-lg">   
			<output name="data" id="data"></output> -
            <output name="hora" id="hora"></output>
	</div>	
	<br> 
   <div class="form-group">
  <select class="form-control form-control-lg" name="entrada">
  <option >Entrada</option>
  <option>Saída</option>
  </select>
  </div>
  <div class="form-grup">
   <input class="btn btn-primary btn-lg" type="submit" value="Registrar"> 
  </div>
  
</form>
</div>
</div>

<!--Corpo-->
<?php include 'view/rodape.php' ?>


<?php
//session
 }else{
	 header('Location: index.php?msg=erroacesso');
}
?>

