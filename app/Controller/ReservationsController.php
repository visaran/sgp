<?php
class ReservationsController extends AppController {
	public function index() {
		

	}

	function add() {

		$this->set('reservations', $this->Reservation->find('all'));

		//if ($this->request->is('reservation')) {
        	//$this->request->data['Reservation']['user_id'] = $this->Auth->user('id'); //Added this line
        if (!empty($this->data)) {
                    $this->request->data['Reservation']['user_id'] = $this->Auth->user('id');
                    $this->Reservation->save($this->data);
                    $this->Session->setFlash('Reserva feita com sucesso!');
                    $this->redirect('add');
        }
    		
	}

    public function isAuthorized($user) {
        if (!parent::isAuthorized($user)) {
            if ($this->action === 'add') {
                // All registered users can add posts
                return true;
            }
            if (in_array($this->action, array('edit', 'delete'))) {
                $postId = $this->request->params['pass'][0];
                return $this->Post->isOwnedBy($postId, $user['id']);
            }
        }
        return false;
    }
}
?>