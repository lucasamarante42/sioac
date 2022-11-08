<?php 
  require_once('functions_pacientes.php'); 
  edit_paciente();
?>

<?php require(HEADER_TEMPLATE); ?>

<h2>Atualizar Paciente</h2>

<form action="edit_pacientes.php?id=<?php echo $paciente['tb_paciente_id']; ?>" method="post">
 
  
<script type="text/javascript">
  jQuery(function($){
	$("#edTelefone").mask("(99)9999-9999");
	$("#edCelular").mask("(99)99999-9999");

  });  
  
</script>  
  
 <hr>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="name">*Nome</label>
      <input type="text" required class="form-control" name="pac_nome" value="<?php echo $paciente['tb_paciente_nome']; ?>" maxlength="20">
	</div>

    <div class="form-group col-md-4">
      <label for="sobrenome">*Sobrenome</label>
      <input type="text" required class="form-control" name="pac_sobrenome" value="<?php echo $paciente['tb_paciente_sobrenome']; ?>" maxlength="30">
    </div>

	<div class="form-group col-md-2">
      <label for="nascimento">*Data de Nascimento</label>
      <input type="date" required class="form-control" id="edNascimento" name="pac_nascimento" value="<?php echo $paciente['tb_paciente_nascimento']; ?>" min="1900-01-01" max="2050-12-31">
    </div>
	
	
    <div class="form-group col-md-2">
      <label for="rg">*R.G (apenas números)</label>
      <input type="text" required class="form-control" name="pac_rg" value="<?php echo $paciente['tb_paciente_rg']; ?>" pattern="[0-9]+$" maxlength="15">
    </div>
	

  </div>
  
  <div class="row">
    <div class="form-group col-md-4">
      <label for="endereco">*Endereço</label>
      <input type="text" required class="form-control" name="pac_endereco" value="<?php echo $paciente['tb_paciente_endereco']; ?>" maxlength="60">
    </div>

    <div class="form-group col-md-3">
      <label for="bairro">*Bairro</label>
      <input type="text" required class="form-control" name="pac_bairro" value="<?php echo $paciente['tb_paciente_bairro']; ?>" maxlength="20">
    </div>
    
    <div class="form-group col-md-2">
      <label for="cidade">*Cidade</label>
      <input type="text" required class="form-control" name="pac_cidade" value="<?php echo $paciente['tb_paciente_cidade']; ?>" maxlength="20">
    </div>
    
	<div class="form-group col-md-1">
      <label for="estado">*UF</label>
      <input type="text" required class="form-control" name="pac_estado" value="<?php echo $paciente['tb_paciente_estado']; ?>" maxlength="2">
    </div>
	
    <div class="form-group col-md-2">
      <label for="cep">*CEP (apenas números)</label>
      <input type="text" required class="form-control" name="pac_cep" value="<?php echo $paciente['tb_paciente_cep']; ?>" maxlength="12">
    </div>
	
  </div>
  
  <div class="row">

   
  <div class="form-group col-md-2">
      <label for="telefone">Telefone</label>
      <input type="tel" class="form-control" id="edTelefone" name="pac_telefone" value="<?php echo $paciente['tb_paciente_telefone']; ?>">
    </div>
      
    <div class="form-group col-md-2">
      <label for="celular">Celular</label>
      <input type="tel" class="form-control" id="edCelular" name="pac_celular" value="<?php echo $paciente['tb_paciente_celular']; ?>">
    </div>
    
    <div class="form-group col-md-3">
      <label for="convenio">Convênio</label>
      <input type="text" class="form-control" name="pac_convenio" value="<?php echo $paciente['tb_paciente_tipo_convenio']; ?>" maxlength="30">
    </div>
       
	<div class="form-group col-md-5">
      <label for="observacao">Observação</label>
      <input type="text" class="form-control" name="pac_observacao" value="<?php echo $paciente['tb_paciente_observacao']; ?>" maxlength="300">
    </div>   
  </div>
  
  <br>
  <div id="actions" class="row">
    <div class="col-md-12">      
      <a href="mainall_pacientes.php" class="btn btn-default">Cancelar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>	

	  <div style="margin-top: 10px;"	  
	      <label for="obrigatorio" align="right">*Campos obrigatórios</label>	
	  </div>
    </div>
  </div>
</form>

<?php require(FOOTER_TEMPLATE); ?>
