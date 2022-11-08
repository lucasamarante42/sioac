<table class="table table-hover" id="tabela_agen">
<thead>
	<tr>
		<th width="8%">Código</th>
		<th width="17%">Data:Hora</th>
		<th width="17%">Paciente: Nome</th>
		<th width="17%">Prof. da Saúde: Nome</th>
		<th width="8%">Tipo</th>
		<th width="8%">Status</th>
		<th width="25%">Opções</th>
	</tr>
</thead>



<tbody>
<?php if ($agendamentos) : ?>
<?php foreach ($agendamentos as $agendamento) : ?>
   
	<tr>
		<td><?php echo $agendamento['tb_agendamento_id']; ?></td>
		<td><?php echo $agendamento['tb_agendamento_data']; echo ' '; echo $agendamento['tb_agendamento_hora'];?></td>
		<td><?php echo $agendamento['tb_paciente_nome']; echo ' '; echo $agendamento['tb_paciente_sobrenome']; ?></td>
		<td><?php echo 'Dr(a). ';echo $agendamento['tb_profissional_nome']; echo ' '; echo $agendamento['tb_profissional_sobrenome']; ?></td>
		<td><?php echo $agendamento['tb_agendamento_tipo']; ?></td>
		<td><?php echo $agendamento['tb_agendamento_status']; ?></td>
						
		<td class="actions text-right">
			<a href="view_agendamentos.php?id=<?php echo $agendamento['tb_agendamento_id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit_agendamentos.php?id=<?php echo $agendamento['tb_agendamento_id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#desmarcaModal" data-agendamento="<?php echo $agendamento['tb_agendamento_id']; ?>">
				<i class="fa fa-calendar-times-o"></i> Desmarcar
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php require('modal_agendamentos.php'); ?>
