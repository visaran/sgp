<div class="container" align="center">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Tela de Autenticação'); ?></legend>
        <?php echo $this->Form->input('username', array(
    	'label' => 'Registro Docente:'));
        echo $this->Form->input('password', array(
    	'label' => 'Senha:'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Entrar'));?>
</div>