<?php echo Form::open(array(
                      "class"=>"form-horizontal",
                    "method" => "post",
                    "id" => "form-user",
                    "enctype"=>"multipart/form-data",             
                     )
            ); 
?>
  
	<fieldset>
            
            
        <div class="row">
            
                      
            <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                            <?php echo Form::label('Nome', 'nome', array('class'=>'control-label')); ?>
                            <?php echo Form::input('nome', Input::post('nome', isset($usuario) ? $usuario->nome : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nome')); ?>
                    </div>
                </div> 
        </div>
            
            
            
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">             
                    <div class="form-group">
                            <?php echo Form::label('E-mail', 'email', array('class'=>'control-label')); ?>
                            <?php echo Form::input('email', Input::post('email', isset($usuario) ? $usuario->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'E-mail')); ?>

                    </div>
                </div>

                
                <div class="col-lg-6 col-md-6 col-sm-12">
                	<div class="form-group">
                            <?php echo Form::label('Usuário', 'username', array('class'=>'control-label')); ?>
                            <?php echo Form::input('username', Input::post('username', isset($usuario) ? $usuario->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Usuário')); ?>
                       	</div>
                </div> 
            </div>   
       
            
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">            	
                    <div class="form-group">
			<?php echo Form::label('Senha', 'password', array('class'=>'control-label')); ?>
                	<?php echo Form::password('password', Input::post('password',''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Senha')); ?>
                    </div>
                </div>
                    
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <?php echo Form::label('Confirma senha', 'confirmPassword', array('class'=>'control-label')); ?>
                        <?php echo Form::password('confirmPassword', Input::post('password',''), array('class' => 'form-control', 'placeholder'=>'Confirmar senha', "id" => "confirmPassword")); ?>
                    </div>
                </div>   
            </div>

	 <div class="form-group">
                <label class='control-label'>&nbsp;</label>
                <?php echo Form::submit('submit', 'Salvar', array('class' => 'btn btn-primary')); ?>		
            </div>
	</fieldset>
<?php echo Form::close(); ?>
