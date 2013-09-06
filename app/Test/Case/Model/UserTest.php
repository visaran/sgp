<?php
App::uses("User", "Model");

class UserTest extends CakeTestCase {

	public $fixtures = array('app.user');

	public function setUp() {
		parent::setUp();
        $this->User = ClassRegistry::init('User');
    }
	
	function testGerenciaProfessores(){

			$expected =array(
							array('User' =>
								array(
						        	'id' => '1', 
						        	'username' => '000654', 
						        	'nome' => 'João da Silva', 
						        	'email' => 'joao@fae.br',
						        	'admin' => 0,
						        	'limite_proj' => '12'
						       	),
							)
						);

	        $result = $this->User->gerenciaProfessores();

	        $this->assertEquals($expected, $result);
	}	

	function testPasswordMatch() {
		/*$data = array('password' => '123');
		$this->User->set(array('User' => $data));
		$this->assertTrue($this->User->matchPasswords($data));*/
	}

}
?>