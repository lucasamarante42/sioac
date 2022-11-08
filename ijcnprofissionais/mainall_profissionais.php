<?php
    require_once('functions_profissionais.php');
    index_profissional();
	interactview_profissional();	
?>

<?php require(HEADER_TEMPLATE); ?>

<header>
    <br>
	<div class="row">
		<div class="col-sm-3">
			<h2>Profissionais da Saúde</h2>
		</div>
		
		<div class="col-sm-5 text-right h2">
			
			<form method="POST" action="">
			   <div class="input-group">	
					<input type="text" id="buscadorprof" class="form-control" name="buscaprof" placeholder="Buscar nome do profissional da saúde..." pattern="[^'\x22]+">					  
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default" name="consultarprof" value="consultarprof" ><i class="fa fa-search"></i></button>
					</span>
				</div>
		    </form>								  
		
		</div>
				
		
		<div class="col-sm-4 text-right h2">
	    	<a class="btn btn-primary" href="add_profissionais.php"><i class="fa fa-plus"></i> Novo Profissional da Saúde</a>
	    	<a class="btn btn-default" href="<?php echo BASEURL; ?>manager_all.php"><i class="fa fa-arrow-left"></i> Voltar</a>
	    </div>
	</div>
</header>


<hr>

<?php require_once ("table_profissionais.php"); ?>



<?php require(FOOTER_TEMPLATE); ?>
