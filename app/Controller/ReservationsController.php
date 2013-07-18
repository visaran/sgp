<?php
class ReservationsController extends AppController {
	public function index() {
		

	}

	function add() {

		$this->set('reservations', $this->Reservation->find('all'));

		//if ($this->request->is('reservation')) {
        	//$this->request->data['Reservation']['user_id'] = $this->Auth->user('id'); //Added this line
        if (!empty($this->data)) {
        	$this->Reservation->save($this->data);
        	$this->request->data['Reservation']['user_id'] = $this->Auth->user('id');
            $this->Session->setFlash('Reserva feita com sucesso!');
            $this->redirect('add');
        }
    		
	}
}
?>