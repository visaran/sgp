<?php
class ReservationsController extends AppController {
	public function index() {

        if ($this->Auth->user('admin')) {
            
            $this->redirect(
                array(
                    'controller' => 'administrators', 'action' => 'index'));
        }

	}

	function add() {
        if (!empty($this->data)) {
            $this->request->data['Reservation']['user_id'] = $this->Auth->user('id');
            if ($this->Reservation->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("Reserva realizada!"); </script>', true));
            }
            else {
                $this->Session->setFlash(__('<script> alert("Impossível realizar essa reserva!"); </script>', true));
            }
            $this->request->data = null;
        }

        $this->set('reservations', $this->Reservation->find('all'));

    		
	}
}
?>