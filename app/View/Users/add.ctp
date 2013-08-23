<div class="container" align="right">
<?php echo $this->Html->link('Voltar ao menu', array('controller' => 'administrators', 'action'=>'index')); ?>
 &nbsp;  
 &nbsp;
<?php echo $this->Html->link(__('Sair'), array('controller' => 'users', 'action'=>'logout')); ?>
</div>
<div class="users form" align='center'>
<?php echo $this->Form->create('User');?>
<hr>
    <fieldset>
        <legend>
            <?php echo __('<h1>Cadastrar Professores</h1>'); ?>
        </legend>
        <br>
        <?php echo $this->Form->input('username', array(
            'label' => 'Registro do Professor:'));
        echo $this->Form->input('password', array(
            'label' => 'Senha:'));
        echo $this->Form->input('nome', array(
            'label' => 'Nome do Professor:'));
		echo $this->Form->input('email', array(
            'label' => 'E-mail:'));
		/*echo $this->Form->input('admin', 
			array(
				'type' => 'checkbox',
				'label'=> 'Administrador'));*/
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Salvar'));?>
</div>