<?php 
  require_once('functions_agendamentos.php'); 
  add_agendamento();
  view_agend_paciente();
  view_agend_profissional();
?>

<?php require(HEADER_TEMPLATE); ?>


<h2>Novo Agendamento Consulta</h2>

<form action="add_agendamentos.php" method="post">

  
  <hr>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="name">*Paciente</label>
      
   	 <div class="form-group"> 
	   <select type="text" name="agend_id_pac" class="form-control">

	      <?php if ($agendamentos_pac) : ?>
                <?php foreach ($agendamentos_pac as $paciente) : ?>
   
		  <option value="<?php echo $paciente['tb_paciente_id'] ?>"><?php echo $paciente['tb_paciente_nome']; echo ' '; echo $paciente['tb_paciente_sobrenome']; ?></option>


                <?php endforeach; ?>
              <?php else : ?>

		<option value="nenhum">Nenhum registro encontrado.</option>
	
              <?php endif; ?>

	  </select>
	</div>

    </div>

    <div class="form-group col-md-3">
      <label for="profissional">*Profissional da Saúde</label>
    
    
      <div class="form-group">
	   <select type="text" name="agend_id_prof" class="form-control">

	      <?php if ($agendamentos_prof) : ?>
                <?php foreach ($agendamentos_prof as $profissional) : ?>
   
		  <option value="<?php echo $profissional['tb_profissional_id'] ?>"><?php echo 'Dr(a). ';echo $profissional['tb_profissional_nome']; echo ' '; echo $profissional['tb_profissional_sobrenome']; ?></option>


                <?php endforeach; ?>
              <?php else : ?>

		<option value="nenhum">Nenhum registro encontrado.</option>
	
              <?php endif; ?>

	  </select>
	</div>

    </div>


    <div class="form-group col-md-2">
      <label for="data">*Data</label>
      <input type="date" required id="campoDate" class="form-control" name="agend_data" min="2017-01-01" max="2050-12-31" >
    </div>
	
    <div class="form-group col-md-2">
      <label for="hora">*Hora</label>
      <input type="time" required id="campoHora" class="form-control" name="agend_hora" >
    </div>	

    <div class="form-group col-md-2">
      <label for="tipo">*Tipo</label>
      <input type="text" required class="form-control" name="agend_tipo" placeholder="Ex: Nova ou Retorno"  maxlength="10">
    </div>	
  </div>
      
  <br>     
  <div id="actions" class="row">
    <div class="col-md-12">
      <a href="mainall_agendamentos.php" class="btn btn-default">Cancelar</a>		
      <button type="submit" class="btn btn-primary" >Salvar</button>

	  
              <div style="margin-top: 10px;"	  
	      <label for="obrigatorio" align="right">*Campos obrigatórios</label>	
	  </div>
	</div>
  
  </div>
  
</form>

 
<?php require(FOOTER_TEMPLATE); ?>
