<div class="container" align="right">
<?php echo $this->Html->link('Voltar ao menu', array('controller' => 'administrators', 'action'=>'index')); ?>
 &nbsp;  
 &nbsp;
<?php echo $this->Html->link(__('Sair'), array('controller' => 'users', 'action'=>'logout')); ?>
</div>
<div class="users form" align='center'>
<?php echo $this->Form->create('User');?>
<?php echo $this->Form->hidden('id'); ?>
<hr>
    <fieldset>
        <legend>
            <?php echo __('<h1>Alterar dados do professor</h1>'); ?>
        </legend>
        <br>
        <?php echo $this->Form->input('username', array(
            'label' => 'Registro do Professor:'));
        echo $this->Form->input('nome', array(
            'label' => 'Nome do Professor:'));
		echo $this->Form->input('email', array(
            'label' => 'E-mail:'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Salvar'));?>
</div>