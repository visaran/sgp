<?php
class Reservation extends AppModel{

	public $validate = array(
    	'data_reserva' => array(
            'rule'    => array('date', 'dmy'),
            'message' => 'Selecione uma data valida.',
        ),
        'horario_reserva_1' => array(
        	'rule' => array('boolean'),
        ),

        'horario_reserva_2' => array(
            'rule' => array('boolean'),
        ),

        'reserva' => array(
            'rule' => array ('validaLimiteReservas', 20),
            'message' => 'Nao há mais projetores disponível nesta data e horário')
    );  

    public function beforeSave($options = array()) {
    	parent::beforeSave();
		$this->data['Reservation']['data_reserva'] = implode('-',array_reverse(explode('/',$this->data['Reservation']['data_reserva'])));
	    return true;
	}

	public function isOwnedBy($reservation, $user) {
		return $this->field('id', array('id' => $reservation, 'user_id' => $user)) === $reservation;
	}

    function validaLimiteReservas($reserva, $limite) {
        $quantidade_existente = $this->find('count', array('conditions' => array('data_reserva' => $reserva['Reservation']['data_reserva'], 'horario_reserva_1' => true), 'recursive' => -1));
        return $quantidade_existente < $limite;
    }

} 
?>
