<?php
class Reservation extends AppModel{

    var $name = 'Reservation';

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreign_keys' => 'user_id',
            'conditions' => array(
            'User.id = Reservation.user_id'),
            )
        );

    var $validate = array(
        'data_reserva' => array(

            'valida_horario' => array(
                'rule' => array('validaDataHorario', 2),
                'message' => ''
            ),
            'data_valida' => array(
                'rule' => array('date', 'dmy'),
                'message' => 'Selecione uma data valida.'
            ),
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Selecione uma data valida.'
            ),

        ),

        'horario_reserva_1' => array(
            'boolean' => array(
                'rule' => array('boolean')
            ),
        ),

        'horario_reserva_2' => array(
            'boolean' => array(
                'rule' => array('boolean')
            ),
        ),
    );

    public function validaDataHorario($reserva, $limite){

        $reserva = $this->data['Reservation'];
        
        $quantidade_user_h1 = $this->find('count', array('conditions' => array('data_reserva' => $reserva['data_reserva'], 
            'horario_reserva_1' => $reserva['horario_reserva_1'],
            'user_id' => $reserva['user_id'])));
        $quantidade_user_h2 = $this->find('count', array('conditions' => array('data_reserva' => $reserva['data_reserva'], 
            'horario_reserva_2' => $reserva['horario_reserva_2'], 
            'user_id' => $reserva['user_id'])));
        if (($quantidade_user_h1) < 1 and ($quantidade_user_h2 < 1)) {
            if((isset($reserva['horario_reserva_1']) and ($reserva['horario_reserva_1'] == false) and 
                isset($reserva['horario_reserva_2']) and ($reserva['horario_reserva_2'] == false))){
                return false;
            }

            if(isset($reserva['horario_reserva_1']) and $reserva['horario_reserva_1'] == true){
                $quantidade = $this->find('count', array('conditions' => array('data_reserva' => $reserva['data_reserva'], 
                    'horario_reserva_1' => true)));
                if ($quantidade >= $limite){
                    return false;    
                }
            }
            
            if(isset($reserva['horario_reserva_2']) and $reserva['horario_reserva_2'] == true){
                $quantidade = $this->find('count', array('conditions' => array('data_reserva' => $reserva['data_reserva'], 
                    'horario_reserva_2' => true)));
                if ($quantidade >= $limite){
                    return false;    
                }
            }  
            return true;   
        }
        
        return false;
    }
    
    
    public function formataHorarioLista($reservas) {

        

        foreach ($reservas as $key=>$reserva) {

            if((isset($reserva['Reservation']['horario_reserva_1'])) and ($reserva['Reservation']['horario_reserva_1']) == true 
                and (isset($reserva['Reservation']['horario_reserva_2'])) and ($reserva['Reservation']['horario_reserva_2']) == true){
                    $reservas[$key]['Reservation']['horario_reserva_1'] = '19:25';
                    $reservas[$key]['Reservation']['horario_reserva_2'] = '22:55';
            }

            else if((isset($reserva['Reservation']['horario_reserva_1'])) and ($reserva['Reservation']['horario_reserva_1']) == true 
                and (isset($reserva['Reservation']['horario_reserva_2'])) and ($reserva['Reservation']['horario_reserva_2']) == false){
                    $reservas[$key]['Reservation']['horario_reserva_1'] = '19:25';
                    $reservas[$key]['Reservation']['horario_reserva_2'] = '21:05';
            }

            else if((isset($reserva['Reservation']['horario_reserva_1'])) and ($reserva['Reservation']['horario_reserva_1']) == false 
                and (isset($reserva['Reservation']['horario_reserva_2'])) and ($reserva['Reservation']['horario_reserva_2']) == true){
                    $reservas[$key]['Reservation']['horario_reserva_1'] = '21:15';
                    $reservas[$key]['Reservation']['horario_reserva_2'] = '22:55';
            }

        }

        return $reservas;
    }

    public function consultaListaReservasPorData($data_consulta){

        $reservas = $this->User->Reservation->find('all', 
            array(
                'conditions' => $data_consulta,
                'order' => array('Reservation.data_reserva asc'),
                'recursive' => -1,
                'fields' => array('id', 'data_reserva', 'horario_reserva_1', 'horario_reserva_2', 'user_id')
                ));
        
        //$reservas = $this->User->Reservation->formataHorarioLista($reservas);

        return $reservas;
    }
    

    public function beforeSave($options = array()) {
    	parent::beforeSave();
		$this->data['Reservation']['data_reserva'] = implode('-',array_reverse(explode('/',$this->data['Reservation']['data_reserva'])));
	    return true;
	}

    public function beforeFind($queryData = array()) {
        if (isset($queryData['conditions']['data_reserva']))
            $queryData['conditions']['data_reserva'] = implode('-',array_reverse(explode('/',$queryData['conditions']['data_reserva'])));
        return $queryData;
    }
} 
?>
