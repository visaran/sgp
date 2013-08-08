<?php
class ReservationsController extends AppController {

    public $uses = array('User');

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
            if ($this->User->Reservation->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("Reserva realizada com sucesso!"); </script>', true));
            }
            else {
                $this->Session->setFlash(__('<script> alert("Não há projetores disponíveis nesta data e horário!"); </script>', true));
            }
            $this->request->data = null;
        }
        
        $users = $this->User->Reservation->find('all', 
            array(
                'conditions' => array(
                    'Reservation.user_id' => $this->Auth->user('id'),
                    'AND' => array(  
                    'Reservation.data_reserva >=' => date('Y-m-d', strtotime('now')))
                    ),
                'order' => array('Reservation.data_reserva asc')
                ));
        
        $users = $this->User->Reservation->formataHorarioLista($users);

        $this->set(compact(array('users')));
        
	}

    function delete ($id){

        $this->User->Reservation->delete($id);
        $this->redirect('add');

    }

}
?>