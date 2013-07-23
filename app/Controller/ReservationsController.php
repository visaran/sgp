<?php
class ReservationsController extends AppController {
	public function index() {
		

	}

	function add() {

		$this->set('reservations', $this->Reservation->find('all'));

        if (!empty($this->data)) {
            $this->request->data['Reservation']['user_id'] = $this->Auth->user('id');
            $this->Reservation->save($this->request->data);
            $this->Session->setFlash('Reserva feita com sucesso!');
            $this->redirect('add');
        }
    		
	}
}
?>