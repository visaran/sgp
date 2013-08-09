  <script>

   $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false, 
      height: 500,
      width: 900
      
    });
 
    $( "#opener" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
  });

  </script>

<div id="dialog" title="Consulta de Reservas">
  <p>

    <table class="table table-bordered">

      <tr>
        <th>Data da reserva</th> 
        <th>Professores</th>
        <th>Horário retirada</th>
        <th>Horário devolução</th>
      </tr>

      <?php foreach ($users as $user): ?>
        <tr>
          <td><?php echo $user['Reservation']['data_reserva']; ?> </td>
          <td><?php echo $user['User']['nome']; ?> </td>
          <td><?php echo $user['Reservation']['horario_reserva_1']; ?></td>
          <td><?php echo $user['Reservation']['horario_reserva_2']; ?></td>
        </tr>
      <?php endforeach; ?>
      
    </table>
      </p>
</div>