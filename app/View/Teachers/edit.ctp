<?php 
	echo $this->Form->create('Teacher');
	echo $this->Form->hidden('id');
	echo $this->Form->input('rd', array('label'=>'Registro: '));
	echo $this->Form->input('nome', array('label'=>'Nome : '));
	echo $this->Form->submit('salvar');
	echo $this->Form->end();
?>