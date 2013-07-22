<?php
class ReservationFixture extends CakeTestFixture {
    public $useDbConfig = 'test';
    public $import = 'Reservation';

    var $records = array(
          array ('id' => 1, 'data_reserva' => '23/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 1, 'created' => '2007-03-18 10:39:23', 'modified' => '2007-03-18 10:41:31', 'user_id' => 1),
          
    );

}
?>