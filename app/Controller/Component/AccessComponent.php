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
        $professorTemPermissao = isset($this->permissoes[$this->request->params['controller']][$this->request->params['action']]);

		return $professorTemPermissao;
	}
/*
        $estaNaLogin = ($this->request->params['controller'] == 'users' AND $this->request->params['action'] == 'login');
        $eAdmin = $this->Auth->user('admin');
        $professorTemPermissao = isset($this->permissoes[$this->request->params['controller']][$this->request->params['action']]);

        if (!$estaNaLogin AND !$eAdmin AND !$professorTemPermissao) {
            $this->Session->setFlash(__('<script> alert("Permissão negada."); </script>', true));
            $this->redirect(array('controller' => 'reservations', 'action' => 'add'));
        }*/

}
?>