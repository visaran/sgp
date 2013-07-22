<?php
class Reservation extends AppModel{

	public $validate = array(
    	'data_reserva' => array(
            'rule'    => array('date', 'dmy'),
            'message' => 'Selecione uma data valida.',
        ),
        'horario_reserva_1' => array(
        	'rule' => array('boolean'),
        	'required' => true,
        	'allowEmpty' => false
        ),

    );

    public function beforeSave($options = array()) {
    	parent::beforeSave();
		$this->data['Reservation']['data_reserva'] = implode('-',array_reverse(explode('/',$this->data['Reservation']['data_reserva'])));
	    return true;
	}

	public function isOwnedBy($reservation, $user) {
		return $this->field('id', array('id' => $reservation, 'user_id' => $user)) === $reservation;
	}
} 
?>
