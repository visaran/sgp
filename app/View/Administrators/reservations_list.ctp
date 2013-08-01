<h3 align='center'>Lista semanal de reservas de projetores</h3>


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

	<?php foreach ($users as $user): ?>
		<tr>
			<td><?php //echo $reservation['Reservation']['data_reserva']; ?> </td>
			<td><?php echo $user['User']['id']; ?> </td>
			<td></td>
			<td>19:25</td>
			<td></td>
			<td>22:55</td>
			<td></td>
			<td></td>
		</tr>
	<?php endforeach; ?>
	
</table>