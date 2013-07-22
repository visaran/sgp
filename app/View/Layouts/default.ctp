<!DOCTYPE html>
<html>
<head>
	<?php 
		echo $this->Html->css('jquery-ui.css');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->script('jquery-1.9.1.js');
		echo $this->Html->script('jquery-ui.js');

	?>
</head>

<body>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
</body>
</html>
