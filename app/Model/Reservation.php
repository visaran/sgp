<?php
	class Reservation extends AppModel{
		var $belongsTo = array('User');

		public function isOwnedBy($reservation, $user) {
			return $this->field('id', array('id' => $reservation, 'user_id' => $user)) === $reservation;
		}

	} 
?>
