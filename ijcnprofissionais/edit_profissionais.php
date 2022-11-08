<?php 
  require_once('functions_profissionais.php'); 
  edit_profissional();
?>

<?php require(HEADER_TEMPLATE); ?>

<h2>Atualizar Profissional da Saúde</h2>

<form action="edit_profissionais.php?id=<?php echo $profissional['tb_profissional_id']; ?>" method="post">
  <!-- area de campos do form -->
  
<script type="text/javascript">
  jQuery(function($){
	$("#edTelefoneProf").mask("(99)9999-9999");
	$("#edCelularProf").mask("(99)99999-9999");
  });  
  
</script>  
  
 <hr>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="name">*Nome</label>
      <input type="text" required class="form-control" name="prof_nome" value="<?php echo $profissional['tb_profissional_nome']; ?>" maxlength="20">
	</div>

    <div class="form-group col-md-4">
      <label for="sobrenome">*Sobrenome</label>
      <input type="text" required class="form-control" name="prof_sobrenome" value="<?php echo $profissional['tb_profissional_sobrenome']; ?>" maxlength="30">
    </div>

	<div class="form-group col-md-3">
      <label for="registro">*Registro</label>
      <input type="text" required id="campoRegistro" class="form-control" name="prof_registro" value="<?php echo $profissional['tb_profissional_registro']; ?>" maxlength="15">
    </div>	
	
    <div class="form-group col-md-2">
      <label for="sala">*Sala</label>
      <input type="text" required class="form-control" name="prof_sala" value="<?php echo $profissional['tb_profissional_sala']; ?>" maxlength="10">
    </div>
  </div>
    
  <div class="row">   
  <div class="form-group col-md-2">
      <label for="telefone">Telefone</label>
      <input type="tel" class="form-control" id="edTelefoneProf" name="prof_telefone" value="<?php echo $profissional['tb_profissional_telefone']; ?>">
    </div>
      
    <div class="form-group col-md-2">
      <label for="celular">Celular</label>
      <input type="tel" class="form-control" id="edCelularProf" name="prof_celular" value="<?php echo $profissional['tb_profissional_celular']; ?>">
    </div>
       
	<div class="form-group col-md-8">
      <label for="observacao">Observação</label>
      <input type="text" class="form-control" name="prof_observacao" value="<?php echo $profissional['tb_profissional_observacao']; ?>" maxlength="300">
    </div>    
  </div>
  
  <br>
  <div id="actions" class="row">
    <div class="col-md-12">
      <a href="mainall_profissionais.php" class="btn btn-default">Cancelar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>


	  <div style="margin-top: 10px;"	  
	      <label for="obrigatorio" align="right">*Campos obrigatórios</label>	
	  </div>
    </div>
  </div>
</form>

<?php require(FOOTER_TEMPLATE); ?>
