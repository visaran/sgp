<?php
App::uses('Controller', 'Controller');
App::uses('CakeRequest', 'Network');
App::uses('CakeResponse', 'Network');
App::uses('ComponentCollection', 'Controller');
App::uses('AccessComponent', 'Controller/Component');

class FakeController extends Controller {
	public function loggedOutOrLoggedAsTeacher($test) {
		$this->doLoggin($test, false);
	}

	public function loggedAsAdmin($test) {
		$this->doLoggin($test, true);
	}
	
	private function doLoggin($test, $isAdmin) {
	    $this->Auth = $test->getMock('Auth', array('user'));
		$this->Auth->expects($test->any())
             ->method('user')
             ->will($test->returnValue($isAdmin));
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
    }
	
	function testShouldAccessLoginLoggedOut() {
	    $this->Controller->loggedOutOrLoggedAsTeacher($this);
	    $this->Controller->simulateAccess('users', 'login');
		$this->assertTrue($this->AccessComponent->granted());
	}

	function testTeacherShouldAccessReservationsAdd() {
	    $this->Controller->loggedOutOrLoggedAsTeacher($this);
		$this->Controller->simulateAccess('reservations', 'add');
		$this->assertTrue($this->AccessComponent->granted());
	}

	function testTeacherShouldntAccessUsersAdd() {
		$this->Controller->loggedOutOrLoggedAsTeacher($this);
        $this->Controller->simulateAccess('users', 'add');
		$this->assertFalse($this->AccessComponent->granted());
	}

	function testAdminShouldAccessUsersAdd() {
		$this->Controller->loggedAsAdmin($this);
		$this->Controller->simulateAccess('users', 'add');
		$this->assertTrue($this->AccessComponent->granted());
	}

	function testAdminShouldAccessUsersManager() {
		$this->Controller->loggedAsAdmin($this);
		$this->Controller->simulateAccess('users', 'manager');
		$this->assertTrue($this->AccessComponent->granted());
	}

}
?>