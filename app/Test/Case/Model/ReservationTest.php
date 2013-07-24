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
		$this->Reservation->set(array('Reservation' => array('data_reserva' => '')));
		$this->assertFalse($this->Reservation->validates());
	}

	function testReservationDateShouldBeInPortugueseFormat(){		
		$reserva = array('Reservation' => array('data_reserva' => '15/02/2002', 'horario_reserva_1' => 1, 'horario_reserva_2' => 1));
		$this->Reservation->set($reserva);
		$this->assertTrue($this->Reservation->validates());

		$reserva = array('Reservation' => array('data_reserva' => '2002-02-14', 'horario_reserva_2' => 1, 'horario_reserva_2' => 1));
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

	function testReservationLimiteProjetoresMaiorQueLimite() {
		$reserva = array('Reservation' => array('horario_reserva_1' => 1, 'horario_reserva_2' => 0, 'data_reserva' => '23/07/2013'));
		$this->assertFalse($this->Reservation->validaLimiteReservas($reserva, 2));
	}

	function testReservationLimiteProjetoresMenorOuIgualQueLimite() {
		$reserva = array('Reservation' => array('horario_reserva_1' => 1, 'horario_reserva_2' => 0, 'data_reserva' => '23/07/2013'));
		$this->assertTrue($this->Reservation->validaLimiteReservas($reserva, 3));
	}

}

?>
