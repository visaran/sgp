<?php
App::uses("Reservation", "Model");

class ReservationTest extends CakeTestCase{
	
	public $fixtures = array('app.reservation');

	public function setUp() {
		parent::setUp();
        $this->Reservation = ClassRegistry::init('Reservation');
    }

    function testReservationDateShouldBeRequired(){
		$this->Reservation->set(array('Reservation' => array()));
		$this->assertTrue($this->Reservation->validates());
	}

	function testReservationDateShouldNotBeEmpty(){
		$this->Reservation->set(array('Reservation' => array('data_reserva' => '', 'horario_reserva_1' => 1, 'user_id' => 1)));
		$this->assertFalse($this->Reservation->validates());
	}

	function testReservationDateShouldBeInPortugueseFormat(){		
		$reserva = array('Reservation' => array('data_reserva' => '15/02/2002', 'horario_reserva_1' => 1, 'horario_reserva_2' => 1, 'user_id' => 1));
		$this->Reservation->set($reserva);
		$this->assertTrue($this->Reservation->validates());

		$reserva = array('Reservation' => array('data_reserva' => '2002-02-14', 'horario_reserva_2' => 1, 'horario_reserva_2' => 1, 'user_id' => 1));
		$this->Reservation->set($reserva);
		$this->assertFalse($this->Reservation->validates());
	}

	function testReservationShouldConvertsDataReservaToDatabaseFormatBeforeSave() {
		$reserva = array('Reservation' => array('data_reserva' => '15/02/2002'));
		$this->Reservation->set($reserva);
		$this->Reservation->beforeSave();
		$this->assertEquals('2002-02-15', $this->Reservation->data['Reservation']['data_reserva']);
	}

	function testReservationHorarioReservaUmShouldBeBoolean() {
		$this->Reservation->set(array('Reservation' => array('horario_reserva_1' => 1, 'horario_reserva_2' => 1)));
		$this->assertTrue($this->Reservation->validates());
	}

	function testReservationHorarioReservaUmShouldNotBeString() {
		$this->Reservation->set(array('Reservation' => array('horario_reserva_1' => 'risos')));
		$this->assertFalse($this->Reservation->validates());
	}

	function testReservationHorarioReservaDoisShouldBeBoolean() {
		$this->Reservation->set(array('Reservation' => array('horario_reserva_2' => 1, 'horario_reserva_1' => 1)));
		$this->assertTrue($this->Reservation->validates());
	}

	function testReservationHorarioReservaDoisShouldNotBeString() {
		$this->Reservation->set(array('Reservation' => array('horario_reserva_2' => 'risos')));
		$this->assertFalse($this->Reservation->validates());
	}

	function testReservationDateHorarioUmHorarioDoisChecked(){
		$reserva = array('data_reserva' => '20/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 1, 'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertTrue($this->Reservation->validaDataHorario($reserva, 1));
	}

	function testReservationDateHorarioUmHorarioDoisShouldNotBeEmpty(){
		$reserva = array('data_reserva' => '20/07/2013', 'horario_reserva_1' => 0, 'horario_reserva_2' => 0, 'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertFalse($this->Reservation->validaDataHorario($reserva, 1));
	}

	function testReservationDateHorarioUmUnic(){
		$reserva = array('data_reserva' => '23/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 0, 'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertFalse($this->Reservation->validaDataHorario($reserva, 1));
	}

	function testReservationDateHorarioDoisUnic(){
		$reserva = array('data_reserva' => '23/07/2013', 'horario_reserva_1' => 0, 'horario_reserva_2' => 1, 'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertFalse($this->Reservation->validaDataHorario($reserva, 1));
	}

	function testReservationDateHorarioUmEDoisLimitChecked(){
		$reserva = array('data_reserva' => '25/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 1, 'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertTrue($this->Reservation->validaDataHorario($reserva, 1));
	}

	function testReservationDateHorarioUmMenorOuIgualALimite(){
		$reserva = array('data_reserva' => '27/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 0, 'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertTrue($this->Reservation->validaDataHorario($reserva, 5));
	}

	function testReservationDateHorarioUmMaiorQueLimite(){
		$reserva = array('data_reserva' => '27/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 0, 'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertFalse($this->Reservation->validaDataHorario($reserva, 1));
	}

	function testReservationLimitEachUser(){
		$reserva = array('data_reserva' => '27/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 0, 'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertFalse($this->Reservation->validaDataHorario($reserva, 5));
	}


}

?>
