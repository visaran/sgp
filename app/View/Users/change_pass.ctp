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
    'class' => 'btn btn-primary '
    )
?>

<div class="container" align="right">
<?php echo $this->Html->link('Voltar ao menu', array('controller' => 'administrators', 'action'=>'index')); ?>

</div>

 <div class="box-header">
           <h1>Alterar dados do professor</h1>
        </div><!-- /.box-header -->
        <?php echo $this->Form->create(array('action' => 'change_pass'));?>

            <div class="box-body">
                <div class="form-group">
                <?php echo $this->Form->input('password', array(
                        'label'=>'<i class="fa fa-key"></i> Nova Senha ',
                        'type' => 'password',
                        'value' => '', 
                        'class'=>'form-control'));
                ?>


                </div>
                <div class="form-group">
                <?php echo $this->Form->input('confirm_password', array(
                    'label'=>'<i class="fa fa-key"></i> Confirmação da Nova Senha', 
                    'type' => 'password',
                    'class'=>'form-control'));
                ?>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <?php echo $this->Form->end($Salvar);?> 
            </div>
