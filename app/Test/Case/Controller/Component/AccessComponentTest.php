<?php
App::uses('Controller', 'Controller');
App::uses('CakeRequest', 'Network');
App::uses('CakeResponse', 'Network');
App::uses('ComponentCollection', 'Controller');
App::uses('AccessComponent', 'Controller/Component');

class FakeController extends Controller {
	public function loggedOut($test) {
		$isAdmin = false;
		$fakeAuth = $test->getMock('Auth', array('user'));
        $fakeAuth->expects($test->any())
             ->method('user')
             ->will($test->returnCallback($isAdmin));
        $this->Auth = $fakeAuth;
	}

	public function loginAsAdmin($test) {
		$isAdmin = true;
		$fakeAuth->expects($test->any())
             ->method('user')
             ->will($test->returnCallback($isAdmin));
	}

	public function simulateAccess($controller, $action) {
		$params = array(
			'controller' => $controller,
			'action' => $action
		);
		$this->request = new StdClass();
		$this->request->params = $params;
	}
}

class AccessComponentTest extends CakeTestCase {

	public function setUp() {
        parent::setUp();
        $Collection = new ComponentCollection();
        $this->AccessComponent = new AccessComponent($Collection);
        $CakeRequest = new CakeRequest();
        $CakeResponse = new CakeResponse();
        $this->Controller = new FakeController($this, $CakeRequest, $CakeResponse);
        $this->AccessComponent->startup($this->Controller);
        $this->Controller->loggedOut($this);
    }
	
	function testShouldAccessLoginLoggedOut() {
		$this->assertTrue($this->AccessComponent->granted());
	}

	function testTeacherShouldAccessReservationsAdd() {
		$this->Controller->simulateAccess('reservations', 'add');
		$this->assertTrue($this->AccessComponent->granted());
	}

	function testTeacherShouldntAccessUsersAdd() {
		$this->Controller->simulateAccess('users', 'add');
		$this->assertFalse($this->AccessComponent->granted());
	}

	function testAdminShouldAccessUsersAdd() {
		//$this->Controller->loginAsAdmin($this);
	}

	function testAdminShouldAccessUsersManager() {
		
	}

}
?>