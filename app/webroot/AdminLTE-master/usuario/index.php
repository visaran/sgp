            <?php if (\Session::get_flash('success')): ?>                                        
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo \Session::get_flash('success');?>
                </div>
            <?php endif; ?>
            <?php if (\Session::get_flash('error')): ?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo \Session::get_flash('error');?>
                </div>
            <?php endif; ?>

<h2>Lista de usuários </h2>
<br>
<?php if ($usuarios): ?>
<table class="table table-striped">
	<thead>
		<tr>
                    <th> 
                    <?php  echo
                              \Html::anchor(
                                                    '#nome', 
                                                    'Nome  <i class="fa fa-search"></i> ', 
                                                    array(
                                                        'class' => 'text-info', 
                                                        'data-placement' => 'top',
                                                        'data-toggle' => 'modal',
                                                        'rel'=>'tooltip',
                                                        'data-original-title' => 'Pesquisar Nome'
                                                    )
                                        ); 
                    ?>
                    </th>
                    <th>
                    <?php  echo
                              \Html::anchor(
                                                    '#email', 
                                                    'E-mail  <i class="fa fa-search"></i> ', 
                                                    array(
                                                        'class' => 'text-info', 
                                                        'data-placement' => 'top',
                                                        'data-toggle' => 'modal',
                                                        'rel'=>'tooltip',
                                                        'data-original-title' => 'Pesquisar E-mail'
                                                    )
                                        ); 
                    ?>
                    </th>
                    
                                  
		</tr>
	</thead>
	<tbody>
<?php foreach ($usuarios as $item): ?>		
            <tr>                
                <td><?php echo $item->nome; ?></td>
                <td><?php echo $item->email; ?></td>               
                <td>
                    <div class="btn-toolbar">
                        <div>
  
                            
                            <?php echo \Html::anchor(
                                                    'admin/usuario/view/'.$item->id, 
                                                    '<i class="fa fa-eye"></i>', 
                                                    array(
                                                        'class' => 'btn btn-primary btn-circle',
                                                        'data-placement' => 'top',
                                                        'rel' => 'tooltip',
                                                        'data-original-title' => 'Visualizar'
                                                    )
                                        ); 
                            ?>
                            <?php echo \Html::anchor(
                                                    'admin/usuario/edit/'.$item->id, 
                                                    '<i class="fa fa-pencil"></i>', 
                                                    array(
                                                        'class' => 'btn btn-success btn-circle',
                                                        'data-placement' => 'top',
                                                        'rel' => 'tooltip',
                                                        'data-original-title' => 'Editar'
                                                    )
                                        ); 
                            ?>
                          
                            <?php  if(\Auth::get('id') != $item->id): 
                                        echo   \Html::anchor(
                                                    '#'.$item->id, 
                                                    '<i class="fa fa-trash-o"></i>', 
                                                    array(
                                                        'class' => 'btn btn-danger btn-circle', 
                                                        'data-placement' => 'top',
                                                        'data-toggle' => 'modal',
                                                        'rel'=>'tooltip',
                                                        'data-original-title' => 'Excluir'
                                                    )
                                        ); 
                                    endif;
                            ?>
                         </div>
                    </div>
                </td>
		              
                    <td>
                        <!-- Modal excluir usuário -->
                        <div class="modal fade" id="<?php echo $item->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title text-danger" id="myModalLabel">Deseja excluir o usuário <?php echo $item->nome;?> ? </h4>
                              </div>
                              <div class="modal-body">  
                                  <?php echo Form::open(array(
                                                                "class"=>"form-horizontal",
                                                                "method" => "post",
                                                                "id" => "form-excluir",
                                                                "action" => "admin/usuario/delete/".$item->id,
                                                                )
                                                        ); 
                                  ?>
                                       <table class="table table-striped">
                                        <thead>
                                                <tr>                                                   
                                                    <th>Nome</th>
                                                    <th>E-mail</th>                                               
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> 
                                                    <?php echo $item->nome; ?>
                                                </td>
                                                <td>   
                                                    <?php echo $item->email; ?>
                                                </td>
                                               
                                            </tr>
                                        </tbody>
                                       </table>


                              </div>
                              <div class="modal-footer">
                                <?php echo Form::button('cancelar', 'Cancelar', array('class' => 'btn btn-default','data-dismiss' =>'modal')); ?>		
                                <?php echo Form::submit('submit', 'Excluir Usuário', array('class' => 'btn btn-danger')); ?>		
                              </div>
                              <?php echo Form::close(); ?>  
                            </div>
                          </div>
                        </div>                
                
                    </td>
                </tr>   
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>Não há usuários com este status.</p>
<p><?php echo \Html::anchor('admin/usuario/', 'Voltar', array('class' => 'btn btn-primary')); ?></p>

<?php endif; ?><p>
	<?php echo \Html::anchor('admin/usuario/create', 'Adicionar novo usuário', array('class' => 'btn btn-success')); ?>
</p>



 

    
<!-- Modal Pesquisar Nome -->
<div class="modal fade" id="nome" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-danger" id="myModalLabel">Buscar por Nome: </h4>
      </div>
      <div class="modal-body">
          
                  <?php echo Form::open(array(
                                            "class"=>"form-horizontal",
                                            "method" => "post",
                                            "id" => "form-excluir",
                                            "action" => "admin/usuario/pesquisarNome",
                                            )
                                    ); 
              ?>
                  
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <?php echo Form::input('nome',Null, array('class' => 'col-md-4 form-control', 'placeholder'=>'Nome')); ?>
            </div>
      </div>
      <div class="modal-footer">
            <?php echo Form::button('cancelar', 'Cancelar', array('class' => 'btn btn-default','data-dismiss' =>'modal')); ?>		
            <button class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>
      </div>
      <?php echo Form::close(); ?>          
        
        
    </div>
  </div>
</div>




<!-- Modal Pesquisar Email -->
<div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-danger" id="myModalLabel">Buscar por Email: </h4>
      </div>
      <div class="modal-body">
          
                  <?php echo Form::open(array(
                                            "class"=>"form-horizontal",
                                            "method" => "post",
                                            "id" => "form-excluir",
                                            "action" => "admin/usuario/pesquisarEmail",
                                            )
                                    ); 
              ?>             
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                <?php echo Form::input('email',Null, array('class' => 'col-md-4 form-control', 'placeholder'=>'E-mail')); ?>
            </div>
      </div>
      <div class="modal-footer">
            <?php echo Form::button('cancelar', 'Cancelar', array('class' => 'btn btn-default','data-dismiss' =>'modal')); ?>		
            <button class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>
      </div>
      <?php echo Form::close(); ?>          
        
        
    </div>
  </div>
</div>