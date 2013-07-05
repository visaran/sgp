<?php echo $this->Form->create('Projector'); ?>
<?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->input('codigo'); ?>
<?php echo $this->Form->input('modelo'); ?>
<?php echo $this->Form->submit('Salvar'); ?>
<?php echo $this->Form->end(); ?>
