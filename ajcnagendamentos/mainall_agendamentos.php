<?php
    require_once('functions_agendamentos.php');
    index_agendamento();
	interactview_agendamento();	
?>

<?php require(HEADER_TEMPLATE); ?>

	
<header>
    <br>
	<div class="row">
		<div class="col-sm-3">
			<h2>Agendamento Consultas</h2>
		</div>
		
		<div class="col-sm-5 text-right h2">
			
			<form method="POST" action="">
			   <div class="input-group">	
					<input type="text" id="buscadoragen" class="form-control" name="buscaagen" placeholder="Buscar data da consulta. Ex:2017-05-03" pattern="[^'\x22]+">					  
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default" name="consultaragen" value="consultaragen" ><i class="fa fa-search"></i></button>
					</span>
				</div>
		    </form>								  
		
		</div>
				
		
		<div class="col-sm-4 text-right h2">
	    	<a class="btn btn-primary" href="add_agendamentos.php"><i class="fa fa-plus"></i> Novo Agendamento Consulta</a>
	    	<a class="btn btn-default" href="<?php echo BASEURL; ?>manager_all.php"><i class="fa fa-arrow-left"></i> Voltar</a>
	    </div>
	</div>
</header>


<hr>

<?php require_once ("table_agendamentos.php"); ?>



<?php require(FOOTER_TEMPLATE); ?>
