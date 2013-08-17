<?php


class RandomNumber {
	protected $m_min;
	protected $m_max;
		
	public function __construct($min,$max) {
		if ($max > $min) {
			$this->min = $min;
			$this->max = $max;
		} else {
			  throw new Exception('Invslid range...');
			
		}
	}
		
	public function getRandom() {
		return mt_rand($this->m_min, $this->m_max);
	}	
}


?>