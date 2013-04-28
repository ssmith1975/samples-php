<?

class Pos_Date extends DateTime
{
	protected $_year;
	protected $_month;
	protected $_day;

	public function __construct($timezone = null)
	{
	  // call the parent constructor
	  if ($timezone) {
		parent::__construct('now', $timezone);
	  } else {
		parent::__construct('now');
	  }
	
	  // assign the values to the class properties
	  $this->_year = (int) $this->format('Y');
	  $this->_month = (int) $this->format('n');
	  $this->_day = (int) $this->format('j');
	}
	
	// Resetting the Time and Date
	public function setTime($hours, $minutes, $seconds = 0)
	{
		 if (!is_numeric($hours) || !is_numeric($minutes) || !is_numeric($seconds)){
			 throw new Exception('setTime() expects two or three numbers separated by commas in the order: hours, minutes, seconds');
		  }
		  
		  $outOfRange = false;
		  if ($hours < 0 || $hours > 23) {
			$outOfRange = true;
		  }
		  if ($minutes < 0 || $minutes > 59) {
			$outOfRange = true;
		  }
		  if ($seconds < 0 || $seconds > 59) {
			$outOfRange = true;
		  }
		  if ($outOfRange) {
			throw new Exception('Invalid time.');
		  }
		  parent::setTime($hours, $minutes, $seconds);
	 }

	public function setDate($year, $month, $day)
	{
	  if (!is_numeric($year) || !is_numeric($month) || !is_numeric($day)){ 
		throw new Exception('setDate() expects three numbers separated by commas in the order: year, month, day.');
	  }
	  
	  if (!checkdate($month, $day, $year)) {
		throw new Exception('Non-existent date.');
	  }
	  
	  parent::setDate($year, $month, $day);
	  $this->_year = (int) $year;
	  $this->_month = (int) $month;
	  $this->_day = (int) $day;
	}

	// Accepting Dates in Common Formats
	
	// Accepting a Date in MM/DD/YYYY Format
	public function setMDY($USDate)
	{
	  $dateParts = preg_split('{[-/ :.]}', $USDate);
	  if (!is_array($dateParts) || count($dateParts) != 3) {
		throw new Exception('setMDY() expects a date as "MM/DD/YYYY".');
	  }
	  $this->setDate($dateParts[2], $dateParts[0], $dateParts[1]);
	}
		
	// Accepting a Date in DD/MM/YYYY Format
	public function setDMY($EuroDate)
	{
	  $dateParts = preg_split('{[-/ :.]}', $EuroDate);
	  if (!is_array($dateParts) || count($dateParts) != 3) {
		throw new Exception('setDMY() expects a date as "DD/MM/YYYY".');
	  }
	  $this->setDate($dateParts[2], $dateParts[1], $dateParts[0]);
	}
	
	// Accepting a Date in MySQL Format	
	public function setFromMySQL($MySQLDate)
	{
	  $dateParts = preg_split('{[-/ :.]}', $MySQLDate);
	  if (!is_array($dateParts) || count($dateParts) != 3) {
		throw new Exception('setFromMySQL() expects a date as "YYYY-MM-DD".');
	  }
	  $this->setDate($dateParts[0], $dateParts[1], $dateParts[2]);
	}
	
	// 	Outputting Dates in Common Formats
	
	public function getMDY($leadingZeros = false)
	{
	  if ($leadingZeros) {
		return $this->format('m/d/Y');
	  } else {
		return $this->format('n/j/Y');
	  }
	}
	
	public function getDMY($leadingZeros = false)
	{
	  if ($leadingZeros) {
		return $this->format('d/m/Y');
	  } else {
		return $this->format('j/n/Y');
	  }
	}
	
	public function getMySQLFormat()
	{
	  return $this->format('Y-m-d');
	}

	// Outputting Date Parts
	
	public function getFullYear()
	{
	  return $this->_year;
	}
	
	public function getYear()
	{
	  return $this->format('y');
	}
	
	public function getMonth($leadingZero = false)
	{
	  return $leadingZero ? $this->format('m') : $this->_month;
	}
	
	public function getMonthName()
	{
	  return $this->format('F');
	}
	
	public function getMonthAbbr()
	{
	  return $this->format('M');
	}
	
	public function getDay($leadingZero = false)
	{
	  return $leadingZero ? $this->format('d') : $this->_day;
	}
	
	public function getDayOrdinal()
	{
	  return $this->format('jS');
	}
	
	public function getDayName()
	{
	  return $this->format('l');
	}
	
	public function getDayAbbr()
	{
	  return $this->format('D');
	}

	// Performing Date-Related Calculations
	
	// Adding and Subtracting Days or Weeks
	public function addDays($numDays)
	{
	  if (!is_numeric($numDays) || $numDays < 1) {
		throw new Exception('addDays() expects a positive integer.');
	  }
	  parent::modify('+' . intval($numDays) . ' days');
	}
	
	public function subDays($numDays)
	{
	  if (!is_numeric($numDays)) {
		throw new Exception('subDays() expects an integer.');
	  }
	  parent::modify('-' . abs(intval($numDays)) . ' days');
	}
	
	public function addWeeks($numWeeks)
	{
	  if (!is_numeric($numWeeks) || $numWeeks < 1) {
		throw new Exception('addWeeks() expects a positive integer.');
	  }
	  parent::modify('+' . intval($numWeeks) . ' weeks');
	}
	
	public function subWeeks($numWeeks)
	{
	  if (!is_numeric($numWeeks)) {
		throw new Exception('subWeeks() expects an integer.');
	  }
	  parent::modify('-' . abs(intval($numWeeks)) . ' weeks');
	}

	// Adding Months
	public function addMonths($numMonths)
	{
	  if (!is_numeric($numMonths) || $numMonths < 1) {
		throw new Exception('addMonths() expects a positive integer.');
	  }
	  $numMonths = (int) $numMonths;
	  // Add the months to the current month number.
	  $newValue = $this->_month + $numMonths;
	  // If the new value is less than or equal to 12, the year
	  // doesn't change, so just assign the new value to the month.
	  if ($newValue <= 12) {
		$this->_month = $newValue;
	  } else {
		// A new value greater than 12 means calculating both
		// the month and the year. Calculating the year is
		// different for December, so do modulo division
		// by 12 on the new value. If the remainder is not 0,
		// the new month is not December.
		$notDecember = $newValue % 12;
		if ($notDecember) {
		  // The remainder of the modulo division is the new month.
		  $this->_month = $notDecember;
		  // Divide the new value by 12 and round down to get the
		  // number of years to add.
		  $this->_year += floor($newValue / 12);
		} else {
		  // The new month must be December
		  $this->_month = 12;
		  $this->_year += ($newValue / 12) - 1;
		}
	  }
	  $this->checkLastDayOfMonth();
	  parent::setDate($this->_year, $this->_month, $this->_day);
	}
	
	// Adjusting the Last Day of the Month
	final protected function checkLastDayOfMonth()
	{
	  if (!checkdate($this->_month, $this->_day, $this->_year)) {
		$use30 = array(4 ,6,9, 11);
		if (in_array($this->_month, $use30)) {
		  $this->_day = 30;
		} else {
		  $this->_day = $this->isLeap() ? 29 : 28;
		}
	  }
	}
	
	// Checking for Leap Year	
	public function isLeap()
	{
	  if ($this->_year % 400 == 0 || ($this->_year % 4 == 0 && $this->_year % 100 != 0)) {
		return true;
	  } else {
		return false;
	  }
	}
	
	// Subtracting Months
	public function subMonths($numMonths)
	{
	  if (!is_numeric($numMonths)) {
		throw new Exception('addMonths() expects an integer.');
	  }
	  $numMonths = abs(intval($numMonths));
	  // Subtract the months from the current month number.
	  $newValue = $this->_month - $numMonths;
	  // If the result is greater than 0, it's still the same year,
	  // and you can assign the new value to the month.
	  if ($newValue > 0) {
		$this->_month = $newValue;
	  } else {
		// Create an array of the months in reverse.
		$months = range(12 , 1);
		// Get the absolute value of $newValue.
		$newValue = abs($newValue);
		// Get the array position of the resulting month.
		$monthPosition = $newValue % 12;
		$this->_month = $months[$monthPosition];
		// Arrays begin at 0, so if $monthPosition is 0,
		// it must be December.
		if ($monthPosition) {
		  $this->_year -= ceil($newValue / 12);
		} else {
	
		  $this->_year -= ceil($newValue / 12) + 1;
		}
	  }
	  $this->checkLastDayOfMonth();
	  parent::setDate($this->_year, $this->_month, $this->_day);
	}
		
	// 	Adding and Subtracting Years
public function addYears($numYears)
{
  if (!is_numeric($numYears) || $numYears < 1) {
    throw new Exception('addYears() expects a positive integer.');
  }
  $this->_year += (int) $numYears;
  $this->checkLastDayOfMonth();
  parent::setDate($this->_year, $this->_month, $this->_day);
}

public function subYears($numYears)
{
  if (!is_numeric($numYears)) {
    throw new Exception('subYears() expects an integer.');
}

  $this->_year -= abs(intval($numYears));
  $this->checkLastDayOfMonth();
  parent::setDate($this->_year, $this->_month, $this->_day);
}

	// Calculating the Number of Days Between Two Dates	
	
	static public function dateDiff(Pos_Date $startDate, Pos_Date $endDate)
	{
	  $start = gmmktime(0, 0, 0, $startDate->_month, $startDate->_day, $startDate->_year);
	  $end = gmmktime(0, 0, 0, $endDate->_month, $endDate->_day, $endDate->_year);
	  return ($end - $start) / (60 * 60 * 24);
	}
	
	// Creating a Default Date Format	
	
	public function __toString()
	{
	  return $this->format('l, F jS, Y');
	}
	
	// Modify
	public function modify()
	{
	  throw new Exception('modify() has been disabled.');
	}

	// Creating Read-Only Properties
	public function __get($name)
	{
	  switch (strtolower($name)) {
		case 'mdy':
		  return $this->format('n/j/Y');
		case 'mdy0':
		  return $this->format('m/d/Y');
		case 'dmy':
		  return $this->format('j/n/Y');
		case 'dmy0':
		  return $this->format('d/m/Y');
		case 'mysql':
		  return $this->format('Y-m-d');
		case 'fullyear':
		  return $this->_year;
	
		case 'year':
		  return $this->format('y');
		case 'month':
		  return $this->_month;
		case 'month0':
		  return $this->format('m');
		case 'monthname':
		  return $this->format('F');
		case 'monthabbr':
		  return $this->format('M');
		case 'day':
		  return $this->_day;
		case 'day0':
		  return $this->format('d');
		case 'dayordinal':
		  return $this->format('jS');
		case 'dayname':
		  return $this->format('l');
		case 'dayabbr':
		  return $this->format('D');
		default:
		  return 'Invalid property';
	  }
	}
	
	

}

?>
