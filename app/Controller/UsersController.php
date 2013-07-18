<?php
class UsersController extends AppController {

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido!'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('O usuário foi salvo com sucesso!'));
                $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add'); // Letting users register themselves
    }

    public function login() {
        if ($this->Auth->login()) {
            debug($this->Auth->redirect());
            
            $this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash(__('Registro ou senha inválidos, tente novamente.'));
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
}
?>
