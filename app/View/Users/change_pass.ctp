<?php 
    $input_password = array(
        'placeholder' => 'Senha',
        'type' => 'password',
        'class' => 'form-control',
        'div' => array(
        'class' => 'form-group',
    ));

    $Salvar = array(
    'label' => 'Salvar',
    'class' => 'btn btn-success btn-flat btn-block'
    );
?>

<div class="container" align="right">
<?php echo $this->Html->link('Voltar', array('controller' => 'reservations', 'action'=>'add')); ?>
</div>
<div class="users form" align='center'>
<?php echo $this->Form->create(array('action' => 'change_pass'));?>


    <fieldset>
        <legend>
            <?php echo __('<h1>Alterar dados do professor</h1>'); ?>
        </legend>
        <br>
<div class="form_btn">        
            <?php echo $this->Form->input('password', array('label'=>'<i class="fa fa-key"></i> Nova Senha ', 'type' => 
                'password', 'value' => ''));
            ?>
            <?php echo $this->Form->input('confirm_password', array('label'=>'<i class="fa fa-key"></i> Confirmação da Nova Senha', 'type' => 'password'));
            ?>

    <div class="footer">                                   
        <?php echo $this->Form->end($Salvar);?>
    </div>
</div>       
    </fieldset>
</div>