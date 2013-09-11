<?php
class AccessComponent extends Component {

	private $permissoes = array(
        'users' => array('logout' => true),
        'reservations' => array('add' => true)
    );

	public function startup(Controller $controller) {
	    $this->controller = $controller;
	}

	public function granted() {
		$estaNaLogin = ($this->controller->request->params['controller'] == 'users'
			AND $this->controller->request->params['action'] == 'login');
        $eAdmin = $this->controller->Auth->user('admin');
        $professorTemPermissao = isset($this->permissoes[$this->controller->request->params['controller']][$this->controller->request->params['action']]);
		return $estaNaLogin || $eAdmin || $professorTemPermissao;
	}

}
?>