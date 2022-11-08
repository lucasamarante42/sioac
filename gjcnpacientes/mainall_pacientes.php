<?php
    require_once('functions_pacientes.php');
    index_paciente();
	interactview_paciente();	
?>

<?php require(HEADER_TEMPLATE); ?>

<div class="container">

<header>
    <br>
	<div class="row">
		<div class="col-sm-3">
			<h2>Pacientes</h2>
		</div>
		
		<div class="col-sm-5 text-right h2">
			
			<form method="POST" action="">
			   <div class="input-group">	
					<input type="text" id="buscador" class="form-control" name="buscapac" placeholder="Buscar nome do paciente..." pattern="[^'\x22]+">					  
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default" name="consultarpac" value="consultarpac" ><i class="fa fa-search"></i></button>
					</span>
				</div>
		    </form>								  
		
		</div>
				
		
		<div class="col-sm-4 text-right h2">
	    	<a class="btn btn-primary" href="add_pacientes.php"><i class="fa fa-plus"></i> Novo Paciente</a>
	    	<a class="btn btn-default" href="<?php echo BASEURL; ?>manager_all.php"><i class="fa fa-arrow-left"></i> Voltar</a>
	    </div>
	</div>
</header>


<hr>

<?php require_once ("table_pacientes.php"); ?>


</div>

<?php require(FOOTER_TEMPLATE); ?>
