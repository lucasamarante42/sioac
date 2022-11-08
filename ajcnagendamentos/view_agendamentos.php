<?php 
	require_once('functions_agendamentos.php'); 
	view_agendamento($_GET['id']);
?>

<?php require(HEADER_TEMPLATE); ?>

<h2>Agendamento <?php echo $agendamento['tb_agendamento_id']; ?></h2>
<hr>

<h4>Consulta</h4>
<dl class="dl-horizontal">
	<dt>Data:</dt>
	<dd><?php echo $agendamento['tb_agendamento_data'];?></dd>

	<dt>Hora:</dt>
	<dd><?php echo $agendamento['tb_agendamento_hora']; ?></dd>
	
	<dt>Tipo:</dt>
	<dd><?php echo $agendamento['tb_agendamento_tipo']; ?></dd>

	<dt>Status:</dt>
	<dd><?php echo $agendamento['tb_agendamento_status']; ?></dd>
	
</dl>

<hr>

<h4>Paciente</h4>   
<dl class="dl-horizontal">
   
	<dt>Código:</dt>
	<dd><?php echo $agendamento['tb_paciente_id']; ?></dd>

	<dt>Nome:</dt>
	<dd><?php echo $agendamento['tb_paciente_nome']; echo ' '; echo $agendamento['tb_paciente_sobrenome']; ?></dd>
	
	<dt>Data de Nascimento:</dt>
	<dd><?php echo $agendamento['tb_paciente_nascimento']; ?></dd>

        <dt>R.G:</dt>
	<dd><?php echo $agendamento['tb_paciente_rg']; ?></dd>

	<dt>Endereço:</dt>
	<dd><?php echo $agendamento['tb_paciente_endereco']; ?></dd>

	<dt>Bairro:</dt>
	<dd><?php echo $agendamento['tb_paciente_bairro']; ?></dd>

	<dt>Cidade:</dt>
	<dd><?php echo $agendamento['tb_paciente_cidade']; ?></dd>

	<dt>Estado:</dt>
	<dd><?php echo $agendamento['tb_paciente_estado']; ?></dd>

	<dt>CEP:</dt>
	<dd><?php echo $agendamento['tb_paciente_cep']; ?></dd>

	<dt>Telefone:</dt>
	<dd><?php echo $agendamento['tb_paciente_telefone']; ?></dd>

	<dt>Celular:</dt>
	<dd><?php echo $agendamento['tb_paciente_celular']; ?></dd>
	
	<dt>Convênio:</dt>
	<dd><?php echo $agendamento['tb_paciente_tipo_convenio']; ?></dd>

	<dt>Observação:</dt>
	<dd><?php echo $agendamento['tb_paciente_observacao']; ?></dd>

</dl>

<hr>

<h4>Profissional da Saúde</h4>  
<dl class="dl-horizontal">
   
	<dt>Código:</dt>
	<dd><?php echo $agendamento['tb_profissional_id']; ?></dd>

	<dt>Nome:</dt>
	<dd><?php echo 'Dr(a). '; echo $agendamento['tb_profissional_nome']; echo ' '; echo $agendamento['tb_profissional_sobrenome']; ?></dd>
	
	<dt>Registro:</dt>
	<dd><?php echo $agendamento['tb_profissional_registro']; ?></dd>

        <dt>Sala:</dt>
	<dd><?php echo $agendamento['tb_profissional_sala']; ?></dd>

	<dt>Telefone:</dt>
	<dd><?php echo $agendamento['tb_profissional_telefone']; ?></dd>

	<dt>Celular:</dt>
	<dd><?php echo $agendamento['tb_profissional_celular']; ?></dd>

	<dt>Observação:</dt>
	<dd><?php echo $agendamento['tb_profissional_observacao']; ?></dd>


</dl>


<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit_agendamentos.php?id=<?php echo $agendamento['tb_agendamento_id']; ?>" class="btn btn-primary">Editar</a>
	  <a href="mainall_agendamentos.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php require(FOOTER_TEMPLATE); ?>
