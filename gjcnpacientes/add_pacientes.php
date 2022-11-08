<?php 
  require_once('functions_pacientes.php'); 
  add_paciente();
?>

<?php require(HEADER_TEMPLATE); ?>

<h2>Novo Paciente</h2>

<form action="add_pacientes.php" method="post">
  <!-- area de campos do form -->
  
<script type="text/javascript">
  jQuery(function($){
	$("#campoTelefone").mask("(99)9999-9999");
	$("#campoCelular").mask("(99)99999-9999");

  });  
  
</script>
    
  <hr>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="name">*Nome</label>
      <input type="text" required class="form-control" name="pac_nome" placeholder="Lucas" maxlength="20">
    </div>

    <div class="form-group col-md-4">
      <label for="sobrenome">*Sobrenome</label>
      <input type="text" required class="form-control" name="pac_sobrenome" placeholder="Amarante Avanço" maxlength="30">
    </div>

	<div class="form-group col-md-2">
      <label for="nascimento">*Data de Nascimento</label>
      <input type="date" required id="campoNascimento" class="form-control" name="pac_nascimento" min="1900-01-01" max="2050-12-31" >
    </div>
	
    <div class="form-group col-md-2">
      <label for="rg">*R.G (apenas números)</label>
      <input type="text" required class="form-control" name="pac_rg" placeholder="xxxxxxxxx" pattern="[0-9]+$" maxlength="15">
    </div>	
  </div>
  
  <div class="row">
    <div class="form-group col-md-4">
      <label for="endereco">*Endereço</label>
      <input type="text" required class="form-control" name="pac_endereco" placeholder="Rua dos andrades, 59" maxlength="60">
    </div>

    <div class="form-group col-md-3">
      <label for="bairro">*Bairro</label>
      <input type="text" required class="form-control" name="pac_bairro" placeholder="Vila juvenal" maxlength="20">
    </div>
    
    <div class="form-group col-md-2">
      <label for="cidade">*Cidade</label>
      <input type="text" required class="form-control" name="pac_cidade" placeholder="Cruzeiro" maxlength="20">
    </div>
    
	<div class="form-group col-md-1">
      <label for="estado">*UF</label>
      <input type="text" required class="form-control" name="pac_estado" placeholder="SP" maxlength="2">
    </div>
	
    <div class="form-group col-md-2">
      <label for="cep">*CEP (apenas números)</label>
      <input type="text" required class="form-control" name="pac_cep" placeholder="xxxxxxxx" pattern="[0-9]+$" maxlength="12">
    </div>	
  </div>
  
  <div class="row">   
  <div class="form-group col-md-2">
      <label for="telefone">Telefone</label>
      <input type="tel" class="form-control" id="campoTelefone" name="pac_telefone" placeholder="(xx)xxxx-xxxx">
    </div>
      
    <div class="form-group col-md-2">
      <label for="celular">Celular</label>
      <input type="tel" class="form-control" id="campoCelular" name="pac_celular" placeholder="(xx)xxxxx-xxxx">
    </div>
    
    <div class="form-group col-md-3">
      <label for="tipo_convenio">Convênio</label>
      <input type="text" class="form-control" name="pac_convenio" placeholder="Unimed ou Nenhum" maxlength="30"> 
    </div>
              
	<div class="form-group col-md-5">
      <label for="observacao">Observação</label>
      <input type="text" class="form-control" name="pac_observacao" placeholder="Observação sobre o paciente" maxlength="300">
    </div>    
  </div>

  <br>
  <div id="actions" class="row">
    <div class="col-md-12">
      <a href="mainall_pacientes.php" class="btn btn-default">Cancelar</a>
      <button type="submit" class="btn btn-primary" >Salvar</button>

		
	  <div style="margin-top: 10px;"	  
	      <label for="obrigatorio" align="right">*Campos obrigatórios</label>	
	  </div>
	</div>  
  </div>  
</form>

 
<?php require(FOOTER_TEMPLATE); ?>
