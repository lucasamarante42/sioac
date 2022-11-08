<table class="table table-hover" id="tabela_pac">
<thead>
	<tr>
		<th width="10%">Código</th>
		<th width="20%">Nome</th>
		<th width="17%">Cidade</th>
		<th width="15%">Telefone</th>
		<th width="15%">Celular</th>
		<th>Opções</th>
	</tr>
</thead>

<tbody>
<?php if ($pacientes) : ?>
<?php foreach ($pacientes as $paciente) : ?>
   
	<tr>
		<td><?php echo $paciente['tb_paciente_id']; ?></td>
		<td><?php echo $paciente['tb_paciente_nome']; echo ' '; echo $paciente['tb_paciente_sobrenome']; ?></td>
		<td><?php echo $paciente['tb_paciente_cidade']; ?></td>
		<td><?php echo $paciente['tb_paciente_telefone']; ?></td>
		<td><?php echo $paciente['tb_paciente_celular']; ?></td>
		
		<td class="actions text-right">
			<a href="view_pacientes.php?id=<?php echo $paciente['tb_paciente_id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit_pacientes.php?id=<?php echo $paciente['tb_paciente_id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-paciente="<?php echo $paciente['tb_paciente_id']; ?>">
				<i class="fa fa-trash"></i> Excluir
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

<?php require('modal_pacientes.php'); ?>
