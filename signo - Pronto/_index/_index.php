<?php session_start(); ?>

<?php include 'includes/cabecalho.php';?>  


 <!-- CONTEUDO -->
<div class="container">
 	
 		<div class="col-auto"><h2>Dados para Entrega</h2> </div>
 
		       
        
        <form action="cadastro.php" method="post" id="formCadastro">
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

 
	
    <div class="col-auto"><h2>Dados para Produção</h2> </div>

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
  

  <input type="submit" class="btn btn-outline-warning" name="enviado" value="Continuar"/>

</form>	
</div>
<!-- CONTEUDO -->
 <?php include 'includes/rodape.php';?>     
    
    
    
    
   























    
    
