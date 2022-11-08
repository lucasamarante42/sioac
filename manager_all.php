
<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php require(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<div class="container">

<hr>

<?php if ($db) : ?>

<div class="row">
	
	<div class="col-xs-6 col-sm-3 col-md-3">
		<a href="ajcnagendamentos/interacty_view.php" class="btn btn-primary">
			<div class="row">
				<div class="col-xs-12 text-center">
					<p><dt>CONSULTA INTERATIVA</dt></p>
				</div>
				<div class="col-xs-12 text-center">
					<i class="fa fa-address-card fa-5x"></i>
				</div>
				
			</div>
		</a>
	</div>
	
	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="gjcnpacientes/mainall_pacientes.php" class="btn btn-warning">
			<div class="row">
				<div class="col-xs-12 text-center">
					<p><dt>PACIENTES</dt></p>
				</div>
				<div class="col-xs-12 text-center">
					<i class="fa fa-user fa-5x"></i>
				</div>
				
			</div>
		</a>
	</div>
	
	
	<div class="col-xs-6 col-sm-3 col-md-3">
		<a href="ijcnprofissionais/mainall_profissionais.php" class="btn btn-success">
			<div class="row">
				<div class="col-xs-12 text-center">
					<p><dt>PROFISSIONAIS DA SAÚDE</dt></p>
				</div>
				<div class="col-xs-12 text-center">
					<i class="fa fa-medkit fa-5x"></i>
				</div>
				
			</div>
		</a>
	</div>
	
	<div class="col-xs-6 col-sm-3 col-md-3">
		<a href="ajcnagendamentos/mainall_agendamentos.php" class="btn btn-danger">
			<div class="row">
				<div class="col-xs-12 text-center">
					<p><dt>AGENDAMENTOS</dt></p>
				</div>
				<div class="col-xs-12 text-center">
					<i class="fa fa-heartbeat fa-5x"></i>
				</div>
				
			</div>
		</a>
	</div>
	
	
	
	
	
	
</div>

 
 </hr>
 

<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>Ops:</strong> Página indisponível no momento! Por favor tente mais tarde ..</p>
	</div>

<?php endif; ?>

</div>

<footer class="footer navbar-fixed-bottom">
	  <p class="text-center">&copy;2017 - Todos os direitos reservados - Desenvolvimento Web SIOAC </p>
		
</footer>

<?php require(FOOTER_TEMPLATE); ?>
