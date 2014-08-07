<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unifae - SGP</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php
			        echo $this->Html->css('jquery-ui.css');
					echo $this->Html->css('/development-bundle/themes/smoothness/jquery-ui.css');
					echo $this->Html->css('bootstrap.min');
			        echo $this->Html->css('font-awesome.min');
					echo $this->Html->css('AdminLTE');
					echo $this->Html->css('ionicons.min');

					echo $this->Html->script('jquery-1.9.1.js');
					echo $this->Html->script('jquery-ui.js');
					echo $this->Html->script('bootstrap.min.js');

					$userName = '';
        ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        
        
       
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                   <img alt="sgp" src="<?php echo Router::url('/', true);?>img/sgp100.png" class="img-responsive" style="margin:0 auto; width:65px; " >     
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                      
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span> <?php echo $nomeUser; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                              
                                
                                <!-- Menu Footer-->
                              
                                <li class="user-footer">
                                    <div class="pull-left">
                                    	<?php
					                      echo $this->Html->link(
					                         '<i class="fa fa-key"></i> Alterar senha',
					                          array(
					                              'controller'=>'users',
					                              'action'=>'change_pass',
					                          ),
					                          array(
					                              'escape'=>false,
					                               'class'=>'btn btn-default btn-flat'
					                          )
					                      );
					                    ?>

                                    </div>
                                    <div class="pull-right">
                                    	<?php
					                      echo $this->Html->link(
					                         '<i class="fa fa-power-off"></i> Sair',
					                          array(
					                              'controller'=>'users',
					                              'action'=>'logout',
					                          ),
					                          array(
					                              'escape'=>false,
					                              'class'=>'btn btn-default btn-flat'
					                          )
					                      );
					                    ?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Right side column. Contains the navbar and content of the page -->
                <!-- Main content -->
                <section class="content">
                    <div class="well">
                        <?php echo $this->Session->flash(); ?>
						<?php echo $this->fetch('content'); ?>
                    </div>
                    
                </section><!-- /.content -->
        </div><!-- ./wrapper -->

    </body>
</html>


