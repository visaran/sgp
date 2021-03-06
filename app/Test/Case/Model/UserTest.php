<?php
App::uses("User", "Model");

class UserTest extends CakeTestCase {

	public $fixtures = array('app.user');

	public function setUp() {
		parent::setUp();
        $this->User = ClassRegistry::init('User');
    }
	
	function testGerenciaUsuarios(){

			$expected =array(
							array('User' =>
								array(
						        	'id' => '1', 
						        	'username' => '000654', 
						        	'nome' => 'João da Silva', 
						        	'email' => 'joao@fae.br',
						        	'admin' => 0,
						        	'limite_proj' => '12'
						       	)
							),
							array('User' =>
								array(
						            'id' => '2', 
						            'username' => 'admin', 
						            'nome' => 'João da Silva', 
						            'email' => 'joao@fae.br',
						            'admin' => true,
						            'limite_proj' => '1'
						        )
							)


						);

	        $result = $this->User->gerenciaProfessores();

	        $this->assertEquals($expected, $result);
	}

	function testPasswordConfirmation(){

		$senhas = array('password' => '123', 'confirm_password' => '123');
		$this->User->set(array('User' => $senhas));
		$this->assertTrue($this->User->matchPasswords());
	
	}

	function testDifferentPasswordConfirmation(){

		$senhas = array('password' => '123', 'confirm_password' => '321');
		$this->User->set(array('User' => $senhas));
		$this->assertFalse($this->User->matchPasswords());
	
	}


}
?>