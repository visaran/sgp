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
            <?php echo __('<h1>Alterar limite de Projetores</h1>'); ?>
        </legend>
        <br>
        <?php echo $this->Form->input('limite_proj', array(
            'label' => 'Quantidade de projetores:',
            'type' => 'text'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Salvar'));?>
</div>
