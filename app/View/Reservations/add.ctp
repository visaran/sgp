<?php echo $this->Form->create('Reservation'); ?>
<?php echo $this->Form->input('data_reserva'); ?>
<p>Das 19:25 às 21:05 - Digite 1</p>
<p>Das 21:15 às 22:55 - Digite 2</p>
<p>Das 19:25 às 22:55 - Digite 3</p>
<?php echo $this->Form->input('horario_reserva'); ?>
<?php echo $this->Form->submit('Reservar'); ?>
<?php echo $this->Form->end(); ?>


<table>

	<tr>
		<th>Data da reserva</th> 
		<th>Horario da reserva</th>
	</tr>

	<?php foreach ($reservations as $reservation): ?>
		<tr>
			<td><?php echo $reservation['Reservation']['data_reserva']; ?> </td>
			<td><?php echo $reservation['Reservation']['horario_reserva']; ?> </td>
		</tr>
		<?php endforeach; ?>
</table>