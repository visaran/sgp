<div class='container' align='center'>
<h1> Menu do Administrador </h1>

<hr>
<?php echo $this->Html->link('Gerar lista semanal', array('action'=>'reservations_list')); ?>
<br>
<hr>
<?php echo $this->Html->link(__('Sair'), array('controller' => 'users', 'action'=>'logout')); ?>
</div>
