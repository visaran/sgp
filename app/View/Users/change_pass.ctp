<div class="container" align="right">
<?php echo $this->Html->link('Voltar', array('controller' => 'reservations', 'action'=>'add')); ?>
 &nbsp;  
 &nbsp;
<?php echo $this->Html->link(__('Sair'), array('controller' => 'users', 'action'=>'logout')); ?>
</div>
<div class="users form" align='center'>
<?php echo $this->Form->create(array('action' => 'change_pass'));?>
<hr>
    <fieldset>
        <legend>
            <?php echo __('<h1>Alterar dados do professor</h1>'); ?>
        </legend>
        <br>
        <?php echo $this->Form->input('password', array('label'=>'Nova Senha', 'type' => 
            'password', 'value' => ''));
        ?>
        <?php echo $this->Form->input('confirm_password', array('label'=>'Confirmação da Nova Senha', 'type' => 'password'));
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>