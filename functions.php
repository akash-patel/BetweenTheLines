
<?php
	/*This file is used to keep track of all of the functions that are used 
	throughout the system*/

	function calculate_cost($time){
		/*Cost is calculated at $10 an hour*/
		$hours = $time / 3600;
		if ($hours <= 2 )
			$cost = $hours * 5;
		else if ( $hours <= 6 )
			$cost =  10 + ($hours-2) * 3;
		else if ( $hours <= 12 )
			$cost = 22 + ($hours - 6) * 2;
		else
			$cost = 34 + $hours - 12;

		return $cost;
	}

	function is_valid_luhn($number) {
		settype($number, 'string');
		$sumTable = array(array(0,1,2,3,4,5,6,7,8,9), array(0,2,4,6,8,1,3,5,7,9));
		$sum = 0;
		$flip = 0;
		for ($i = strlen($number) - 1; $i >= 0; $i--)
			$sum += $sumTable[$flip++ & 0x1][$number[$i]];
		
		return $sum % 10 === 0;
	}

	function is_cc_expired($date) {
		/*Returns 1 if expired*/
		if (strtotime($date) < strtotime("now"))
			return 1;
		else
			return 0;
	}

	function cc_type($cc){
		$first_digit = substr($cc, 0, 1);

		if ($first_digit == '4')
			return "Visa ";
		else if ($first_digit == '5')
			return "Mastercard ";	
		else if ($first_digit == '6')
			return "Discover ";
		else if  ($first_digit == '3')
			return "American Express ";
		else
			return "0";

	}


?>
