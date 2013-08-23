<h2 align="center"> Gerenciamento de Professores </h2>

<table class="table table-bordered table-striped">

  <tr>
    <th>Registro</th> 
    <th>Nome</th>
    <th>E-mail</th>
  </tr>

  <?php foreach ($users as $user): ?>
    <tr>
      <td><?php echo $user['User']['username']; ?> </td>
      <td><?php echo $user['User']['nome']; ?> </td>
      <td><?php echo $user['User']['email']; ?></td>
    </tr>
  <?php endforeach; ?>
  
</table>