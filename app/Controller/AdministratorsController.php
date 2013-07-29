<?php
class AdministratorsController extends AppController {

    //public $uses = array('Reservation');

    public function index() {
       
        if (!$this->Auth->user('admin')) {
            
            $this->redirect(array('controller' => 'reservations', 'action' => 'index'));
        }

    }

    public function list(){

    }

}
?>
