<table class="table table-bordered">

	<tr>
		<th>Data da reserva</th> 
		<th>Primeiro horário</th>
		<th>Segundo horário</th>
	</tr>

	<?php foreach ($reservations as $reservation): ?>
		<tr>
			<td><?php echo $reservation['Reservation']['data_reserva']; ?> </td>
			<td><?php echo $reservation['Reservation']['horario_reserva_1']; ?> </td>
			<td><?php echo $reservation['Reservation']['horario_reserva_2']; ?> </td>
		</tr>
		<?php endforeach; ?>
</table>