<?php include 'view/cabecalho.php' ?>
<!--Corpo-->
<div class="container">
<?php 
	if(!$msg ='0'){
		echo '<br><div class="alert alert-warning" role="alert">Faça o login para continuar!</div>';
	};
?>
<div class="row">
<form action="controller/acesso.php" method="post">
<fieldset>
<br>
  <div class="form-group">
    <label for="exampleInputEmail1">Matricula</label>
    <input type="text" class="form-control" name="id"  placeholder="1001">
     </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="********">
  </div>
  <button type="submit" class="btn btn-primary">Entrar</button>
  </fieldset>
</form>
</div>
</div>

<!--Corpo-->

<?php include 'view/rodape.php' ?>