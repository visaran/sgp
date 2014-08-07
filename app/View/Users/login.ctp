<?php
    
    $entrar = array(
    'label' => 'Entrar',
    'class' => 'btn btn-success btn-flat btn-block'
    );

    $input_login = array(
        'placeholder' => 'Login',
        'type' => 'text',
        'class' => 'form-control',
        'div' => array(
        'class' => 'form-group',
    ));

    $input_password = array(
        'placeholder' => 'Senha',
        'type' => 'password',
        'class' => 'form-control',
        'div' => array(
        'class' => 'form-group',
    ));

?>

<style type="text/css">
	
label {
	display: none;
}
.form-group {
margin-bottom: 0px;
}
</style>



<div class="form-box" id="login-box">
    <div class="header"> 
    <img alt="sgp" src="../img/sgp100.png" class="img-responsive" style="margin:0 auto;" >     
    </div>
    <?php echo $this->Form->create('User');?>

        <div class="body bg-gray-transparent">
            <div class="form-group">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <?php 
                	 echo $this->Form->input('username', $input_login);
                ?>   
            </div>
            <div class="form-group">
            </div>
            <div class="input-group">   
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <?php 
                	 echo $this->Form->input('password', $input_password);
                ?>  
                 </div>          
            
        </div>
        <div class="footer">                                   
			<?php echo $this->Form->end($entrar);?>
        </div>
    </form>
</div>
