<?php
	class Reservation extends AppModel{

		public $validate = array(
        	'data_reserva' => array(
	            'rule'    => array('date', 'ymd'),
	            'message' => 'Selecione uma data valida.',
	            'required' => true
	        )
	    );

	    public function beforeSave($options = array()) {
			$this->data['Reservation']['data_reserva'] = implode('-',array_reverse(explode('/',$this->data['Reservation']['data_reserva'])));
		    return true;
		}

		public function isOwnedBy($reservation, $user) {
			return $this->field('id', array('id' => $reservation, 'user_id' => $user)) === $reservation;
		}

	} 
?>
