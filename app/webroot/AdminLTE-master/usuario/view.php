<h2>Dados do usuário <?php echo $usuario->nome; ?></h2>

<p>
	<strong>Nome:</strong>
	<?php echo $usuario->nome; ?></p>
<p>
	<strong>E-mail:</strong>
	<?php echo $usuario->email; ?></p>
<p>
	<strong>Usuário:</strong>
	<?php echo $usuario->username; ?></p>
<p>
	<strong>Data de criação:</strong>
	<?php echo  Date::forge($usuario->created_at)->format("%d/%m/%Y");  ?></p>
<p>
	<strong>Data de atualização:</strong>
	<?php echo  Date::forge($usuario->updated_at)->format("%d/%m/%Y");  ?></p>

<?php echo Html::anchor('admin/usuario/edit/'.$usuario->id, 'Editar'); ?> |
<?php echo Html::anchor('admin/usuario', 'Voltar'); ?>