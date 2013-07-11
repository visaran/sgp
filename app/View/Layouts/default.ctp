<!DOCTYPE html>
<html>
<head>
	<?php 
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->script('bootstrap.min');
	?>
</head>

<body>
	<?php echo $this->fetch('content'); ?>
	
</body>
</html>
