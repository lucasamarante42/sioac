<table class="table table-hover" id="tabela_prof">
<thead>
	<tr>
		<th width="10%">Código</th>
		<th width="30%">Nome</th>
		<th width="20%">Registro</th>
		<th width="15%">Sala</th>
		<th>Opções</th>
	</tr>
</thead>

<tbody>
<?php if ($profissionais) : ?>
<?php foreach ($profissionais as $profissional) : ?>
   
	<tr>
		<td><?php echo $profissional['tb_profissional_id']; ?></td>
		<td><?php echo 'Dr(a). '; echo $profissional['tb_profissional_nome']; echo ' '; echo $profissional['tb_profissional_sobrenome']; ?></td>
		<td><?php echo $profissional['tb_profissional_registro']; ?></td>
		<td><?php echo $profissional['tb_profissional_sala']; ?></td>		
				
		<td class="actions text-right">
			<a href="view_profissionais.php?id=<?php echo $profissional['tb_profissional_id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit_profissionais.php?id=<?php echo $profissional['tb_profissional_id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalProf" data-profissional="<?php echo $profissional['tb_profissional_id']; ?>">
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

<?php require('modal_profissionais.php'); ?>
