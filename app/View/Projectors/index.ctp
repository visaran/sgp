<h1> Lista de Projetores </h1>

<?php echo $this->Html->link('Adicionar', array('action'=>'add')); ?>

<table>

	<tr>
		<th>Código</th> 
		<th>Modelo</th>
	</tr>

	<?php foreach ($projectors as $projector): ?>
		<tr>
			<td><?php echo $projector['Projector']['codigo']; ?> </td>
			<td><?php echo $projector['Projector']['modelo']; ?> </td>
			<td><?php echo $this->Html->link('Editar', array('action'=>'edit', $projector['Projector']['id'])); ?> </td>
			<td><?php echo $this->Html->link('Deletar', array('action'=>'delete', $projector['Projector']['id'])); ?></td>
		</tr>
		<?php endforeach; ?>
</table>