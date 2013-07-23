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

        'horario_reserva_2' => array(
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

    public function beforeFind(array $queryData) {
        if (isset($queryData['conditions']['data_reserva']))
            $queryData['conditions']['data_reserva'] = implode('-',array_reverse(explode('/',$queryData['conditions']['data_reserva'])));
        return $queryData;
    }

	public function isOwnedBy($reservation, $user) {
		return $this->field('id', array('id' => $reservation, 'user_id' => $user)) === $reservation;
	}

    function validaLimiteReservas($reserva, $limite) {
        $quantidade_existente = $this->find('all', array('conditions' => array('data_reserva' => $reserva['Reservation']['data_reserva'], 'horario_reserva_1' => true), 'recursive' => -1));
        return $quantidade_existente < $limite;
    }

} 
?>
