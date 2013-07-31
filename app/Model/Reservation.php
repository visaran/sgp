<?php
class Reservation extends AppModel{

    var $name = 'Reservation';
    var $validate = array(
        'data_reserva' => array(

            'valida_horario' => array(
                'rule' => array('validaDataHorario', 4),
                'message' => 'Impossivel reservar!'
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
        //debug($reserva); exit();
        $reserva = $this->data['Reservation'];

        if((isset($reserva['horario_reserva_1']) and ($reserva['horario_reserva_1'] == false) and 
            isset($reserva['horario_reserva_2']) and ($reserva['horario_reserva_2'] == false))){
            return false;
        }

        if(isset($reserva['horario_reserva_1']) and $reserva['horario_reserva_1'] == true){
            $quantidade = $this->find('count', array('conditions' => array('data_reserva' => $reserva['data_reserva'], 'horario_reserva_1' => true)));
            if ($quantidade >= $limite){
                return false;    
            }
        }
        
        if(isset($reserva['horario_reserva_2']) and $reserva['horario_reserva_2'] == true){
            $quantidade = $this->find('count', array('conditions' => array('data_reserva' => $reserva['data_reserva'], 'horario_reserva_2' => true)));
            if ($quantidade >= $limite){
                return false;    
            }
        }   
                  
        return true;
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

	public function isOwnedBy($reservation, $user) {
		return $this->field('id', array('id' => $reservation, 'user_id' => $user)) === $reservation;
	}

    /*public function validaLimiteReservas($reserva, $limite) {
        $quantidade_existente = $this->find('count', array('conditions' => array('data_reserva' => $reserva['Reservation']['data_reserva'], 'horario_reserva_1' => 1), 'recursive' => -1));
        return $quantidade_existente <= $limite;
    }*/

} 
?>
