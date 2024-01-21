<!-- Rodapé -->
<footer class="page-footer font-small blue">

 

</footer>
<!-- Rodape -->
    
<!-- jQuery Popper.js, -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!--Jquery Mask-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <!--Jquery Validate-->
   <script type="text/javascript" src="css/jquery.validate.min.js"></script>
   <script type="text/javascript" src="css/additional-methods.min.js"></script>   
   <script type="text/javascript" src="css/localization/messages_pt_BR.js"></script>
   
 
   <script type="text/javascript">
   $(document).ready(function() {
		$("#formCadastro").validate({
			rules:{
				nome:{
					required:true,
					minlength:3,					
					},
				fone:{
					required:true,
					minlength:10,
					},
				}, messages:{
				 nome:{
                    required:"Por favor, informe seu nome!",
                    minlength:"O nome deve ter pelo menos 3 caracteres."
				 	},
				email:{
					required:"Por favor, informe seu email!",
					email:"Por favor , digite corretamente seu email!",
					},
				fone:{
					required:"Por favor, informe seu telefone!",
					}			
			 }
    	})    
	});
   </script>
<!--JS-->

<script src="https://code.jquery.com/jquery-1.11.2.js"></script>
		<script type="text/javascript">
			jQuery(window).load(function($){
				atualizaRelogio();
			});
		</script>
	
	<script>
		function atualizaRelogio(){ 
			var momentoAtual = new Date();
			
			var vhora = momentoAtual.getHours();
			var vminuto = momentoAtual.getMinutes();
			var vsegundo = momentoAtual.getSeconds();
			
			var vdia = momentoAtual.getDate();
			var vmes = momentoAtual.getMonth() + 1;
			var vano = momentoAtual.getFullYear();
			
			if (vdia < 10){ vdia = "0" + vdia;}
			if (vmes < 10){ vmes = "0" + vmes;}
			if (vhora < 10){ vhora = "0" + vhora;}
			if (vminuto < 10){ vminuto = "0" + vminuto;}
			if (vsegundo < 10){ vsegundo = "0" + vsegundo;}
 
			dataFormat = vdia + " / " + vmes + " / " + vano;
			horaFormat = vhora + " : " + vminuto + " : " + vsegundo;
 
			document.getElementById("data").innerHTML = dataFormat;
			document.getElementById("hora").innerHTML = horaFormat;
 
			setTimeout("atualizaRelogio()",1000);
		}
	</script>	
<!--Js-->
	
 
</html>

