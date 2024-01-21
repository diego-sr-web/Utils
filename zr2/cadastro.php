<?php include 'view/cabecalho.php' ?>

<div class="container">
<p class="display-4">Cadastro</p>

    <form action="#" method="post" name="formCadastro" id="formCadastro">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nome</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" placeholder="Miguel Sousa"   minlength="3" maxlength="80" required="required"/>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Senha</label>
    <input type="password" class="form-control" name="bairro" id="exampleFormControlInput1" min="1" placeholder="******"  maxlength="80" required="required">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">E-mail</label>
    <input type="email"  class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com" maxlength="100" required="required"/>
  </div>
  <div class="form-group">
   <label for="exampleFormControlInput1" >Telefone</label>
    <input type="text" class="form-control" name="fone"  placeholder="(41)3392-3238" onkeypress="$(this).mask('(00) 0000-00009')" required="required" />
        
  </div>

 
  

  <input type="submit" class="btn btn-success" name="enviado" value="Salvar"/>
  <input type="reset" class="btn btn-info" name="enviado" value="Limpar dados"/>
  
</form>
</div>







<?php include 'view/rodape.php' ?>