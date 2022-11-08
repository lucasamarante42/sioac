<?php 
    require_once('../config.php');
    require_once('functions_agendamentos.php');
    dataview_agendamento();
    edit_liberar_agendamento();
?>


<script src="<?php echo BASEURL; ?>ejcnjs/refresh.js"></script>

<audio id="demo" src="chamadapc.mp3"></audio>

<div id="ReloadThis">

<div>	  
    <a href="only_view.php?idp=1&idpr=1" target="only_view.php" id="libtelao" type="submit" class="btn btn-warning pull-right"><i class="fa fa-television"></i> Liberar Telão</a>
</div>

<table class="table table-hover">
<thead>
	<tr>
		<th width="10%">Código</th>
		<th width="15%">Paciente: Nome</th>
		<th width="18%">Prof. da Saúde: Nome</th>
		<th width="15%">Data:Hora</th>
		<th width="8%">Status</td>
		<th width="15%">Consulta</th>		
		<th width="10%">Chamada:Paciente</th>
        	<th></th>
	</tr>
</thead>

<tbody>
<?php if ($agendamentos) : ?>
<?php foreach ($agendamentos as $agendamento) : ?>
	
	<tr>	  
	<td><?php echo $agendamento['tb_paciente_id']; ?></td>
	<td><?php echo $agendamento['tb_paciente_nome']; echo ' '; echo $agendamento['tb_paciente_sobrenome']; ?></td>
	<td><?php echo "Dr(a). "; echo $agendamento['tb_profissional_nome']; echo ' '; echo $agendamento['tb_profissional_sobrenome']; ?></td>
	<td><?php echo $agendamento['tb_agendamento_data']; echo ' '; echo $agendamento['tb_agendamento_hora'];?></td>			
	<td><?php echo $agendamento['tb_agendamento_status']; ?></td>

	<td><a href="interacty_view.php?id=<?php echo $agendamento['tb_paciente_id']; ?>" class="btn btn-success">Liberar Atendimento</a></td>
	<td><?php echo $agendamento['tb_agendamento_pac_liberado'];?></td>	
	<td><a href="only_view.php?idp=<?php echo $agendamento['tb_paciente_id'];?>&idpr=<?php echo $agendamento['tb_profissional_id']; ?>"  target="only_view.php" id="liberado" type="submit" class="btn btn-primary btn-submit " onclick="document.getElementById('demo').play()"><i class="fa fa-bell-o"></i> Anunciar Paciente</a></td>		
				
	</tr>

<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

</div>




<?php require(HEADER_TEMPLATE); ?>

<?php require(FOOTER_TEMPLATE); ?>
