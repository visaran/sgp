<?php
class ReservationFixture extends CakeTestFixture {
    public $import = 'Reservation';

    var $records = array(
        array(
        	'id' => 1, 
        	'data_reserva' => '2013-07-23', 
        	'horario_reserva_1' => 1, 
        	'horario_reserva_2' => 0, 
        	'user_id' => 1
        ),
        array(
        	'id' => 2, 
        	'data_reserva' => '2013-07-23', 
        	'horario_reserva_1' => 1, 
        	'horario_reserva_2' => 0, 
        	'user_id' => 1
        ),
        array(
        	'id' => 3, 
        	'data_reserva' => '2013-07-23', 
        	'horario_reserva_1' => 1, 
        	'horario_reserva_2' => 0, 
        	'user_id' => 1
        ),
        array(
            'id' => 4, 
            'data_reserva' => '2013-07-23', 
            'horario_reserva_1' => 1, 
            'horario_reserva_2' => 0, 
            'user_id' => 1
        ), 
        array(
            'id' => 5, 
            'data_reserva' => '2013-07-23', 
            'horario_reserva_1' => 0, 
            'horario_reserva_2' => 1, 
            'user_id' => 1
        ),
        array(
            'id' => 6, 
            'data_reserva' => '2013-07-23', 
            'horario_reserva_1' => 0, 
            'horario_reserva_2' => 1, 
            'user_id' => 1
        ),
        array(
            'id' => 7, 
            'data_reserva' => '2013-07-23', 
            'horario_reserva_1' => 0, 
            'horario_reserva_2' => 1, 
            'user_id' => 1
        ),
        array(
            'id' => 8, 
            'data_reserva' => '2013-07-23', 
            'horario_reserva_1' => 0, 
            'horario_reserva_2' => 1, 
            'user_id' => 1
        )          
    );

}
?>