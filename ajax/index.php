<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulario Signo</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
   integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



</head>

<body>
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
        <!--Função SALVAR AJAX-->
        <script>
    	function salvar(){
			var nome = $("input[name=nome]").val()
			$.post("enviar.php",{nome: nome}, function(data){
				alert(data)
			})
		return false
		}
    </script>

   <script>   
   $('#nm').toast('hide')
   
   </script>
</body>
</html>
