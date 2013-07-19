<?php
class ReservationsController extends AppController {
	public function index() {
		

	}

	function add() {

		$this->set('reservations', $this->Reservation->find('all'));

		//if ($this->request->is('reservation')) {
        	//$this->request->data['Reservation']['user_id'] = $this->Auth->user('id'); //Added this line
        if (!empty($this->data)) {
            if ($this->data['Reservation']['data_reserva'] and ($this->data['Reservation']['horario_reserva_1'] == 1)){
                $cont = $cont + 1;
                debug($this->data->cont); exit();
                if ($cont <= 2)
                {
                    $this->request->data['Reservation']['user_id'] = $this->Auth->user('id');
                    $this->Reservation->save($this->data);
                    $this->Session->setFlash('Reserva feita com sucesso!');
                    $this->redirect('add');
                }
                else {
                    $this->Session->setFlash('Projetor esgotado nessa data data e horário');
                    $this->redirect('index');
                }
            }
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