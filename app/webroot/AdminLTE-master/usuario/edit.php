<h2>Editar usuário  <?php echo $usuario->nome;?> </h2>
<br>

<?php echo render('usuario/_form'); ?>
<p>
	<?php echo Html::anchor('admin/usuario/view/'.$usuario->id, 'Visualizar'); ?> |
	<?php echo Html::anchor('admin/usuario', 'Voltar'); ?></p>
