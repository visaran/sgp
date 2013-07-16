<?php
class ReservationsController extends AppController {
	public function index() {
		

	}

	function add() {

		$this->set('reservations', $this->Reservation->find('all'));

			if (!empty($this->data)) {
				$this->Reservation->save($this->data);
				$this->redirect('add');
			}
	}
}
?>





