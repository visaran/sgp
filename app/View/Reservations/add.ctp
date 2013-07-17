<?php echo $this->Form->create('Reservation'); ?>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Reserva de Projetores</title>
  <!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />-->
  <link rel="stylesheet" href="/css/jquery-ui-1.10.3.custom.css" />
  <!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
  <script src="/js/jquery-1.9.1.js"></script>
  <!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
  <script src="/js/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
        dateFormat: 'dd/mm/yy'
        //showButtonPanel:true
        //showOn:"button",
        //buttonImage:"calendario.png",
        //buttonImageOnly:true
      });

  });
  </script>
</head>
<body>
 
<p>Data: <input type="text" id="datepicker" name="data_reserva" /></p>

	<!--<?php echo $this->Form->input('data_reserva'); ?>-->
 
</body>
</html>

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