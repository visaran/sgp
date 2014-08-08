<div class='container' align='center'>

<h1> Menu do Administrador </h1>

<hr>
<?php
  echo $this->Html->link(
     '<i class="fa fa-file-text"></i> Lista de reservas ',
      array(
          'action'=>'reservations_list',
      ),
      array(
          'escape'=>false,
      )
  );
?>
<br>
<hr>
<?php
  echo $this->Html->link(
     '<i class="fa fa-group"></i> Cadastrar Professores',
      array(
		'controller' => 'users', 
		'action'=>'add'      ),
      array(
          'escape'=>false,
      )
  );
?>
<hr>
<?php
  echo $this->Html->link(
     '<i class="fa fa- fa-gears"></i> Gerenciar Professores',
      array(
		'controller' => 'users', 
		'action'=>'manager'),
      array(
          'escape'=>false,
      )
  );
?>
<hr>
<?php
  echo $this->Html->link(
     '<i class="fa fa-video-camera"></i> Gerenciar Número de Projetores',
      array(
		'controller' => 'users',
		'action'=>'edit_projectors'),
      array(
          'escape'=>false,
      )
  );
?>	 
<hr>
<?php
  echo $this->Html->link(
     '<i class="fa fa-power-off"></i> Sair',
      array(
		'controller' => 'users', 
		'action'=>'logout'),
      array(
          'escape'=>false,
      )
  );
?>	
</div>
