<?php
class AdministratorsController extends AppController {

    //public $uses = array('Reservation');
    public $uses = array('User');

    public function index() {
       
        if (!$this->Auth->user('admin')) {
            
            $this->redirect(array('controller' => 'reservations', 'action' => 'index'));
        }

    }

    public function reservations_list(){

        $this->set('users', $this->User->find('all'));

    }

}
?>
