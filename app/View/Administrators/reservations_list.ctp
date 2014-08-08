<h3 align='center'>Lista de reservas de projetores</h3>


<a href="#" onclick="window.print();" style="float: right;"><i class="fa fa-print"></i> Imprimir Lista</a>




<table class="table table-bordered table-striped">

	<tr>
		<th>Data da reserva</th> 
		<th>Professores</th>
		<th>Nº</th>
		<th>Horário retirada</th>
		<th>Assinatura retirada</th>
		<th>Horário devolução</th>
		<th>Assinatura devolução</th>
		<th>Observação</th>
	</tr>

	<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user['Reservation']['data_reserva']; ?> </td>
			<td><?php echo $user['User']['nome']; ?> </td>
			<td></td>
			<td><?php echo $user['Reservation']['horario_reserva_1']; ?></td>
			<td></td>
			<td><?php echo $user['Reservation']['horario_reserva_2']; ?></td>
			<td></td>
			<td></td>
		</tr>
	<?php endforeach; ?>
	
</table>