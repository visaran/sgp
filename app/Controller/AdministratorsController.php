<?php
class AdministratorsController extends AppController {

    //public $uses = array('Reservation');
    public $uses = array('User');

    public function index() {
       
        if (!$this->Auth->user('admin')) {
            
            $this->redirect(
                array(
                    'controller' => 'reservations', 'action' => 'index'));
        }

    }

    public function reservations_list(){

        $this->set('users', $this->User->Reservation->find('all', 
            array(
                'conditions' => array('User.id' == 'Reservation.user_id'),
                'order' => array('Reservation.data_reserva asc'))));

    }

}
?>
