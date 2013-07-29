<?php
class Reservation extends AppModel{

	/*public $validate = array(
    	'data_reserva' => array(
            'born' => array (
                'rule' => array ('date', 'dmy'),
                'message' => 'Selecione uma data valida.'
            ),

            'valida' => array ( //corrigir aqui
                'rule' => array ('validaLimiteReservas', 3),
                'message' => 'Sem projetores para essa data e horário'
            ),
        ),
        'horario_reserva_1' => array(
        	'rule' => array('boolean')
        ),

        'horario_reserva_2' => array(
            'rule' => array('boolean')
        )
    );*/


    var $name = 'Reservation';
    var $validate = array(
        'data_reserva' => array(

            'valida' => array(
                'rule' => array('validaLimiteReservas', 2),
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

    public function validaLimiteReservas($reserva, $limite) {
        $quantidade_existente = $this->find('count', array('conditions' => $reserva, 'recursive' => -1));
        return $quantidade_existente <= $limite;
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
