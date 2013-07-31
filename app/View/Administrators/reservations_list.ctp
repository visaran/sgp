<table class="table table-bordered">

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

	<?php foreach ($reservations as $reservation): ?>
		<tr>
			<td><?php echo $reservation['Reservation']['data_reserva']; ?> </td>
			<td><?php echo $reservation['Users']['nome']; ?> </td>
			<td></td>
			<td> </td>
		</tr>
	<?php endforeach; ?>

	
</table>