<?php
class Reservation extends AppModel{

    var $name = 'Reservation';
    var $validate = array(
        'data_reserva' => array(

            'valida_horario_1' => array(
                'rule' => array('validaLimiteReservas', 'horario_reserva_1', 2),
                'message' => 'Impossivel reservar!'
            ),
            'valida_horario_2' => array(
                'rule' => array('validaLimiteReservas', 'horario_reserva_2', 2),
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

    public function validaLimiteReservas($reserva, $horario, $limite) {

        if (isset($reserva[$horario]) and $reserva[$horario]) {
            $quantidade_existente = $this->find('count', array('conditions' => array('data_reserva' => $reserva['data_reserva'], $horario => true), 'recursive' => -1));
            return $quantidade_existente <= $limite;
        }
        else{
            return true;
        }
        
    }

    public function beforeSave($options = array()) {
    	parent::beforeSave();
		$this->data['Reservation']['data_reserva'] = implode('-',array_reverse(explode('/',$this->data['Reservation']['data_reserva'])));
	    return true;
	}

    public function beforeFind(array $queryData) {
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
