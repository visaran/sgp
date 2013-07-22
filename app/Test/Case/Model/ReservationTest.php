<?php
App::uses("Reservation", "Model");

class ReservationTest extends CakeTestCase{
	
	public $fixtures = array('app.reservation');

	public function setUp() {
		parent::setUp();
		$this->Reservation = new Reservation();
    }

    function testReservationDateShouldBeRequired(){
		$this->Reservation->set(array('Reservation' => array()));
		$this->assertFalse($this->Reservation->validates());
	}

	function testReservationDateShouldNotBeEmpty(){
		$this->Reservation->set(array('Reservation' => array('data_reserva' => '')));
		$this->assertFalse($this->Reservation->validates());
	}

	function testReservationDateShouldBeInPortugueseFormat(){		
		$reserva = array('Reservation' => array('data_reserva' => '15/02/2002'));
		$this->Reservation->set($reserva);
		$this->assertTrue($this->Reservation->validates());

		$reserva = array('Reservation' => array('data_reserva' => '2002-02-14'));
		$this->Reservation->set($reserva);
		$this->assertFalse($this->Reservation->validates());
	}

	function testReservationShouldConvertsDataReservaToDatabaseFormatBeforeSave() {
		$reserva = array('Reservation' => array('data_reserva' => '15/02/2002'));
		$this->Reservation->set($reserva);
		$this->Reservation->beforeSave();
		$this->assertEquals('2002-02-15', $this->Reservation->data['Reservation']['data_reserva']);
	}
}

?>
