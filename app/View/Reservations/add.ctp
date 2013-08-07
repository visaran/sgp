<h2 align="center"> Tela de reserva de Projetores </h2>

<div class="container">
<?php echo $this->Form->create('Reservation'); ?>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
        dateFormat: 'dd/mm/yy',
        maxDate: '15d',
        minDate: '0',
        beforeShowDay: $.datepicker.noWeekends
      });

  });
  </script>

<div class='container' align='center'>
  <?php 
      echo $this->Html->link('Sair', array('controller' => 'users', 'action'=>'logout')); 
  ?>
</div>


<?php
    echo $this->Form->input('data_reserva', array(
        'label' => 'Data:',
        'type'=>'text',
        'id'=>'datepicker'));
?>
<p text-align="center">
<?php
    echo $this->Form->input('horario_reserva_1', array(
        'label' => 'Primeiro horário (19:25 às 21:05)',
        'type'=>'checkbox'));
    echo $this->Form->input('horario_reserva_2', array(
        'label' => 'Segundo horário (21:15 às 22:55)',
        'type'=>'checkbox'
    ));
?>
</p>
<?php echo $this->Form->submit('Reservar'); ?>
<?php echo $this->Form->end(); ?>

</div>