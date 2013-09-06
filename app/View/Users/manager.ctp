<div class="container" align="right">
<?php echo $this->Html->link('Voltar ao menu', array('controller' => 'administrators', 'action'=>'index')); ?>
 &nbsp;  
 &nbsp;
<?php echo $this->Html->link(__('Sair'), array('controller' => 'users', 'action'=>'logout')); ?>
</div>

<h2 align="center"> Gerenciamento de Professores </h2>

<table class="table table-bordered table-striped">

  <tr>
    <th>Registro</th> 
    <th>Nome</th>
    <th>E-mail</th>
    <td>Total de projetores</th>
    <th>Excluir Professor</th>
    <th>Editar Professor</th>
  </tr>

  <?php foreach ($professores as $professor): ?>
    <tr>
      <td><?php echo $professor['User']['username']; ?> </td>
      <td><?php echo $professor['User']['nome']; ?> </td>
      <td><?php echo $professor['User']['email']; ?></td>
      <td><?php echo $professor['User']['limite_proj']; ?></td>
      <td><?php echo $this->Html->link('Deletar', array('action'=>'delete', $professor['User']['id'])); ?></td>
      <td><?php echo $this->Html->link('Editar', array('action'=>'edit', $professor['User']['id'])); ?></td>
    </tr>
  <?php endforeach; ?>
  
</table>