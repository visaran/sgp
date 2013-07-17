<?php echo $this->Form->create('Reservation'); ?>
<?php echo $this->Form->input('data_reserva'); ?>

<?php
echo $this->Form->input('horario_reserva_1', array(
    'label' => 'Primeiro horário (19:25 às 21:05)',
    'type'=>'checkbox'));
echo $this->Form->input('horario_reserva_2', array(
    'label' => 'Segundo horário (21:15 às 22:55)',
    'type'=>'checkbox'
));
?>

<?php echo $this->Form->submit('Reservar'); ?>
<?php echo $this->Form->end(); ?>


<table>

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