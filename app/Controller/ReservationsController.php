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
            $this->Reservation->save($this->request->data);
            //$this->Session->setFlash("message");
            $this->request->data = null;
        }

        $this->set('reservations', $this->Reservation->find('all'));
    		
	}
}
?>