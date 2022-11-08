<?php 
	require_once('functions_pacientes.php'); 
	view_paciente($_GET['id']);
?>

<?php require(HEADER_TEMPLATE); ?>

<h2>Paciente <?php echo $paciente['tb_paciente_id']; ?></h2>
<hr>


<dl class="dl-horizontal">
	<dt>Nome:</dt>
	<dd><?php echo $paciente['tb_paciente_nome']; echo ' '; echo $paciente['tb_paciente_sobrenome'];?></dd>

	<dt>Data de Nascimento:</dt>
	<dd><?php echo $paciente['tb_paciente_nascimento']; ?></dd>
	
	<dt>RG:</dt>
	<dd><?php echo $paciente['tb_paciente_rg']; ?></dd>
	
</dl>

<dl class="dl-horizontal">
	<dt>Endereço:</dt>
	<dd><?php echo $paciente['tb_paciente_endereco']; ?></dd>

	<dt>Bairro:</dt>
	<dd><?php echo $paciente['tb_paciente_bairro']; ?></dd>

	<dt>Cidade:</dt>
	<dd><?php echo $paciente['tb_paciente_cidade']; ?></dd>
	
	<dt>Estado:</dt>
	<dd><?php echo $paciente['tb_paciente_estado']; ?></dd>
	
	<dt>CEP:</dt>
	<dd><?php echo $paciente['tb_paciente_cep']; ?></dd>

</dl>

<dl class="dl-horizontal">
	<dt>Telefone:</dt>
	<dd><?php echo $paciente['tb_paciente_telefone']; ?></dd>

	<dt>Celular:</dt>
	<dd><?php echo $paciente['tb_paciente_celular']; ?></dd>

	<dt>Convênio:</dt>
	<dd><?php echo $paciente['tb_paciente_tipo_convenio']; ?></dd>
	
	<dt>Observação:</dt>
	<dd><?php echo $paciente['tb_paciente_observacao']; ?></dd>
	
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit_pacientes.php?id=<?php echo $paciente['tb_paciente_id']; ?>" class="btn btn-primary">Editar</a>
	  <a href="mainall_pacientes.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php require(FOOTER_TEMPLATE); ?>
