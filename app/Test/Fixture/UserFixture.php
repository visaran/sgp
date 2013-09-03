<?php
class UserFixture extends CakeTestFixture {
    public $import = 'User';

    var $records = array(
        /*array(
        	'id' => 1,
        	'nome' => 'Teste',
        	'admin' => 0
        ),*/
        array(
        	'id' => 1, 
        	'username' => '000654', 
            'password' => '123',
        	'nome' => 'João da Silva', 
        	'email' => 'joao@fae.br',
            'admin' => 0
        )
    );
}
?>    	