<?php
class ReservationFixture extends CakeTestFixture {
    public $import = 'Reservation';

    var $records = array(
        array (
        	'id' => 1, 
        	'data_reserva' => '2013-07-23', 
        	'horario_reserva_1' => 1, 
        	'horario_reserva_2' => 0, 
        	'user_id' => 1
        ),
        array (
        	'id' => 2, 
        	'data_reserva' => '2013-07-23', 
        	'horario_reserva_1' => 1, 
        	'horario_reserva_2' => 0, 
        	'user_id' => 1
        ),
        array (
        	'id' => 3, 
        	'data_reserva' => '2013-07-23', 
        	'horario_reserva_1' => 1, 
        	'horario_reserva_2' => 0, 
        	'user_id' => 1
        )      
    );

}
?>