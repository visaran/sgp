<?php
class AdministratorsController extends AppController {

    public $uses = array('User', 'Reservation');

    public function index() {

    }

    public function reservations_list(){

        $users = $this->Reservation->find('all', 
            array(
                'conditions' => array(//'User.id' == 'Reservation.user_id',
                    'Reservation.data_reserva >=' => date('Y-m-d', strtotime('now')),  
                    'AND' => array(  
                    'Reservation.data_reserva <=' => date('Y-m-d', strtotime('next Friday')))),
                'order' => array('Reservation.data_reserva asc')
                ));
        
        $users = $this->Reservation->formataHorarioLista($users);

        $this->set(compact(array('users')));
        
    }

}
?>
