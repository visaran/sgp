<?php
class ReservationsController extends AppController {

    public $uses = array('User', 'Reservation');

	public function index() {

	}

	function add() {

        if(isset($this->data['consultar'])){

            $reservas = $this->Reservation->consultaListaReservasPorData($this->data['Reservation']);

            $this->set(compact(array('reservas')));
        }

        else{

            if (!empty($this->data)) {

                $dataRes = $this->request->data['Reservation']['data_reserva'];

                if(((date('d/m/Y', strtotime('now'))) == $dataRes) 
                    && ((date('H:i:s', strtotime('now'))) >= (date('H:i:s', strtotime('4pm'))))){
                    $this->Session->setFlash(__('<script> alert("O horário para reservas de hoje já foi encerrado! Tente reservar para os próximos dias."); </script>', true));
                    $this->redirect(array('controller' => 'reservations', 'action' => 'add'));
                }
                else{
                    $this->request->data['Reservation']['user_id'] = $this->Auth->user('id');
                    if ($this->Reservation->save($this->request->data)) {
                        $this->Session->setFlash(__('<script> alert("Reserva realizada com sucesso!"); </script>', true));
                    }
                    elseif(empty($this->data)){
                        return;
                    }
                    else {
                        $this->Session->setFlash(__('<script> alert("Não há projetores disponíveis nesta data e horário!"); </script>', true));
                    }
                    $this->request->data = null;
                }

            }

        }

        $users = $this->Reservation->find('all', 
                array(
                    'conditions' => array(
                        'Reservation.user_id' => $this->Auth->user('id'),
                        'AND' => array(  
                        'Reservation.data_reserva >=' => date('Y-m-d', strtotime('now')))
                        ),
                    'order' => array('Reservation.data_reserva asc')
                    ));
            
            $users = $this->Reservation->formataHorarioLista($users);

            $this->set(compact(array('users')));
        
	}

    function delete ($id){

        $this->Reservation->delete($id);
        $this->redirect('add');

    }

}
?>