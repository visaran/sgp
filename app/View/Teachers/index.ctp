<h1>Lista de Professores</h1>
<?php echo $this->Html->link('Cadastrar um novo professor', array('action'=>'add'));?>
<table>
	<tr>
		<th>Rd</th>
		<th>Nome</th>
	</tr>
	<?php foreach($teachers as $teacher): ?>
		<tr>
			<td> <?php echo $teacher['Teacher']['rd'];?> </td>
			<td> <?php echo $teacher['Teacher']['nome'];?> </td>
			<td> <?php echo $this->Html->link('Editar', array('action' => 'edit', $teacher['Teacher']['id']));?></td>
			<td> <?php echo $this->Html->link('Apagar', array('action' => 'delete', $teacher['Teacher']['id']));?></td>
		</tr>	
	<?php endforeach; ?>
</table>				