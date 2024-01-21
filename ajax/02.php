<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>event.preventDefault demo</title>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
 
<a href="https://jquery.com">default click action is prevented</a>

     <div class="container">
     	
        <h2>Cadastro</h2>
        <form action="salvar.php" method="post" onSubmit="return salvar()">
        <div class="form-row">    
             <div class="form-group col-md-4">
                <label>Nome:</label>
                <input type="text" class="form-control" id="nm" name="nome" required x-moz-errormessage="Ops. 
    Não esqueça de preencher este campo.">
            </div>
            <div class="form-group col-md-4">
                <label>Sobrenome:</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label>Data de Nascimento:</label>
                <input type="text" class="form-control" onkeypress="$(this).mask('00/00/0000')">
            </div>  
         </div>
            
         <div class="form-row">    
             <div class="form-group col-md-6">
                <label>E-mail:</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Confirmar e-mail:</label>
                <input type="text" class="form-control">
            </div>     
            <div class="form-group col-md-6">
                <label>Senha:</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Confirmar Senha:</label>
                <input type="text" class="form-control">
            </div>     
        </div>
        
        <div class="form-row">    
             <div class="form-group col-md-6">
                <label>Endereço:</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Numero:</label>
                <input type="text" class="form-control" onkeypress="$(this).mask('00000000')">
            </div> 
            <div class="form-group col-md-6">
                <label>Cidade:</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Bairro:</label>
                <input type="text" class="form-control">
            </div>     
        </div>
        
          <div class="form-group">
    		<label for="exampleFormControlTextarea1">Observação:</label>
   			<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
 		 </div>
         <input class="btn btn-info" type="submit" value="Enviar">
      </form>  
        
      </div>


<div id="log"></div>
 
<script>
$( "a" ).click(function( event ) {
  event.preventDefault();
  $( "<div>" )
    .append( "default " + event.type + " prevented" )
    .appendTo( "#log" );
});
</script>
 
</body>
</html>