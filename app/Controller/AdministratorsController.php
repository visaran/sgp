<?php
class AdministratorsController extends AppController {

    public function index() {
        
    }
    
    /*public function list() {

    }*/

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
