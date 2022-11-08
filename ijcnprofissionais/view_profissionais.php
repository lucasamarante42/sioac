<?php 
	require_once('functions_profissionais.php'); 
	view_profissional($_GET['id']);
?>

<?php require(HEADER_TEMPLATE); ?>

<h2>Profissional da Saúde <?php echo $profissional['tb_profissional_id']; ?></h2>
<hr>

<dl class="dl-horizontal">
	<dt>Nome:</dt>
	<dd><?php echo 'Dr(a). '; echo $profissional['tb_profissional_nome']; echo ' '; echo $profissional['tb_profissional_sobrenome'];?></dd>

	<dt>Registro:</dt>
	<dd><?php echo $profissional['tb_profissional_registro']; ?></dd>
	
	<dt>Sala:</dt>
	<dd><?php echo $profissional['tb_profissional_sala']; ?></dd>
	
</dl>

<dl class="dl-horizontal">
	<dt>Telefone:</dt>
	<dd><?php echo $profissional['tb_profissional_telefone']; ?></dd>

	<dt>Celular:</dt>
	<dd><?php echo $profissional['tb_profissional_celular']; ?></dd>
	
	<dt>Observação:</dt>
	<dd><?php echo $profissional['tb_profissional_observacao']; ?></dd>
	
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit_profissionais.php?id=<?php echo $profissional['tb_profissional_id']; ?>" class="btn btn-primary">Editar</a>
	  <a href="mainall_profissionais.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php require(FOOTER_TEMPLATE); ?>
