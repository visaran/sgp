<?php
    
    $Salvar = array(
    'label' => 'Salvar',
    'class' => 'btn btn-primary '
    );
?>
<div class="container" align="right">
<?php echo $this->Html->link('Voltar ao menu', array('controller' => 'administrators', 'action'=>'index')); ?>

</div>



        <div class="box-header">
            <h1>Alterar limite de Projetores</h1>
        </div><!-- /.box-header -->
            <?php echo $this->Form->create('User');?>
            <?php echo $this->Form->hidden('id'); ?>
            <div class="box-body">
                <div class="form-group">
                <?php echo $this->Form->input('limite_proj', array(
                        'label' => 'Quantidade de projetores:',
                        'type' => 'text',
                        'class'=>'form-control'));
                ?>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
            <?php echo $this->Form->end($Salvar);?> 

           </div>

