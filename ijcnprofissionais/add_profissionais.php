<?php 
  require_once('functions_profissionais.php'); 
  add_profissional();
?>

<?php require(HEADER_TEMPLATE); ?>


<h2>Novo Profissional da Saúde</h2>

<form action="add_profissionais.php" method="post">
  
<script type="text/javascript">
  jQuery(function($){
	$("#campoTelefoneProf").mask("(99)9999-9999");
	$("#campoCelularProf").mask("(99)99999-9999");
  });  
  
</script>  
    
  <hr>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="name">*Nome</label>
      <input type="text" required class="form-control" name="prof_nome" placeholder="Lucas" maxlength="20">
    </div>

    <div class="form-group col-md-4">
      <label for="sobrenome">*Sobrenome</label>
      <input type="text" required class="form-control" name="prof_sobrenome" placeholder="Amarante Avanço" maxlength="30">
    </div>

	<div class="form-group col-md-3">
      <label for="registro">*Registro</label>
      <input type="text" required id="campoRegistro" class="form-control" name="prof_registro" placeholder="xxxxxxxxxx" maxlength="15">
    </div>
	
    <div class="form-group col-md-2">
      <label for="sala">*Sala</label>
      <input type="text" required class="form-control" name="prof_sala" placeholder="xxxxxxxxx"  maxlength="10">
    </div>	
  </div>
      
  <div class="row">   
  <div class="form-group col-md-2">
      <label for="telefone">Telefone</label>
      <input type="tel" class="form-control" id="campoTelefoneProf" name="prof_telefone" placeholder="(xx)xxxx-xxxx">
    </div>
      
    <div class="form-group col-md-2">
      <label for="celular">Celular</label>
      <input type="tel" class="form-control" id="campoCelularProf" name="prof_celular" placeholder="(xx)xxxxx-xxxx">
    </div>
                
	<div class="form-group col-md-8">
      <label for="observacao">Observação</label>
      <input type="text" class="form-control" name="prof_observacao" placeholder="Descrição ..." maxlength="300">
    </div>    
  </div>
     
  <br>
  <div id="actions" class="row">
    <div class="col-md-12">
      <a href="mainall_profissionais.php" class="btn btn-default">Cancelar</a>	
      <button type="submit" class="btn btn-primary" >Salvar</button>

	
	  <div style="margin-top: 10px;"	  
	      <label for="obrigatorio" align="right">*Campos obrigatórios</label>	
	  </div>
	</div>
  
  </div>
  
</form>

 
<?php require(FOOTER_TEMPLATE); ?>
