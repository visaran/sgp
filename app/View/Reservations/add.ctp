<?php 
    $reservar = array(
    'label' => 'Reservar',
    'class' => 'btn btn-success btn-lg btn-block',
    'name' => 'reservar'
    );

    $consultar = array(
    'label' => 'Consultar',
    'class' => 'btn btn-primary btn-lg btn-block',
    'name' => 'consultar'
    );
?>

<style type="text/css">
  .btns_add{
    width: 20%;
    min-width: 137px;
  }
</style>

<h2 align="center">Reserva de Projetores </h2>

<div class="container">
<?php echo $this->Form->create('Reservation'); ?>
  <script>
  
  $(function() {
    $( "#datepicker" ).datepicker({
        dateFormat: 'dd/mm/yy',
        maxDate: '14d',
        minDate: '0',
        beforeShowDay: $.datepicker.noWeekends
      });
  });

  </script>

<?php
    echo $this->Form->input('data_reserva', array(
        'label' => '<i class="fa fa-calendar"></i> Data:',
        'type'=>'text',
        'id'=>'datepicker',
        'readonly' => 'true'));
?>
<p text-align="center">
<?php  
    echo $this->Form->input('horario_reserva_1', array(
        'label' => '<i class="fa fa-clock-o"></i>  Primeiro horário (19:25 às 21:05)',
        'type'=>'checkbox'));
    echo $this->Form->input('horario_reserva_2', array(
        'label' => '<i class="fa fa-clock-o"></i> Segundo horário (21:15 às 22:55)',
        'type'=>'checkbox'
    ));
?>
</p>

<br>
<div class="btns_add">
<?php 
    echo $this->Form->submit('Reservar', $reservar);
?>
<br>
<?php 
    echo $this->Form->submit('Consultar reservas',$consultar);
?>
</div>

<?php echo $this->Form->end(); ?>

</div>

<h3 align="center"> Minhas Reservas </h3>

<table class="table table-bordered table-striped">

  <tr>
    <th>Data da reserva</th> 
    <th>Professor</th>
    <th>Horário retirada</th>
    <th>Horário devolução</th>
    <th>Excluir Reserva</th>
  </tr>

  <?php foreach ($users as $user): ?>
    <tr>
      <td><?php echo $user['Reservation']['data_reserva']; ?> </td>
      <td><?php echo $user['User']['nome']; ?> </td>
      <td><?php echo $user['Reservation']['horario_reserva_1']; ?></td>
      <td><?php echo $user['Reservation']['horario_reserva_2']; ?></td>
      <td><?php echo $this->Html->link('Deletar', array('action'=>'delete', $user['Reservation']['id'])); ?></td>
    </tr>
  <?php endforeach; ?>
  
</table>

<?php
  if(isset($reservas)){
      echo $this->element('modal_lista_reservas', array('reservas' => $reservas));
  }

?>