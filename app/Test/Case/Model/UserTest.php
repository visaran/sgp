<?php
App::uses("User", "Model");

class UserTest extends CakeTestCase {

	public $fixtures = array('app.user');

	public function setUp() {
		parent::setUp();
        $this->User = ClassRegistry::init('User');
    }
	
	function testGerenciaProfessores(){

			//$professor = array('username' => '000654', 'nome' => 'João da Silva', 'email' => 'joao@fae.br');

			$expected = array( 
							array('User' =>
								array(
						        	'id' => '2', 
						        	'username' => '000654', 
						        	'nome' => 'João da Silva', 
						        	'email' => 'joao@fae.br',
						        	'admin' => 0
						        ),
							)
						);

	        $result = $this->User->gerenciaProfessores();

	        $this->assertEquals($expected, $result);
		}

}
?>