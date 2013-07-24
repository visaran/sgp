<div class='container' align='center'>
<h1> Menu do Administrador </h1>

<hr>
<?php echo $this->Html->link('Gerar lista semanal', array('controller' => 'administrators', 'action'=>'list')); ?>
<br>
<hr>
<?php echo $this->Html->link(__('Sair'), array('controller' => 'users', 'action'=>'logout')); ?>
</div>
