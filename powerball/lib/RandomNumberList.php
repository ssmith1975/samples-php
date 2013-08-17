<?php
include_once "RandomNumber.php";
class RandomNumberList extends RandomNumber {

	private $m_total;
	private $m_numArray =  Array();
	
	public function __construct($min,$max,$total){
		try {
			parent::__construct($min, $max);
		} catch (Excpetion $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}	
				
		if($this->isValid($min,$max,$total)){
			$this->m_min = $min;
			$this->m_max = $max;
			$this->m_total = $total;
		} else {
			$this->m_total = $max-$min;
		}

	}
	public function getMin() {
		return $this->m_min;	
	}
	public function setMin($min) {
		
		if($this->isValid($min,$this->m_max,$this->m_total)){
			$this->m_min = $min;
		}else {
			$this->m_total = $this->m_max - $min;
		}
	}
	
	public function getMax() {
		return $this->m_max;	
	}		
	public function setMax($max) {
		
		if($this->isValid($this->m_min,$max,$this->m_total)){
			$this->m_max = $max;
		}else {
			$this->m_total = $max - $this->m_min;
		}		
	}	
	
	public function getTotal() {
		return $this->m_total;	
	}		
	public function setTotal($total) {
		if($this->isValid($this->m_min,$max,$total)){
			$this->m_total = $total;
		}else {
			$this->m_total = $this->m_max - $this->m_min;
		}
	}	

	public function getArray() {
		return $this->m_numArray;		
	}
	
	private function isValid($mn, $mx, $tot){
		$checkRange = false;
		if(($mx - $mn) >$tot) {
			$checkRange = true;
		}
		return $checkRange;
	} // end isValid
	
	public function generateRandom() {
		
		$count = 0;
		$this->m_numArray=array();
		while ($count < $this->m_total){
			
			$a = $this->getRandom();
			if (!in_array($a, $this->m_numArray)){

				 array_push($this->m_numArray, $a);
				 $count = count($this->m_numArray); 
				// echo "rand - ".$a."<br />";
			}
		} // end while
		return sort($this->m_numArray);
	}// generateRandom
	
	public function printRandom($arr) {
		
		//echo "<table class='ball-cell' cellpadding='0' cellspsacing='0' border='0' align='center'><tr>";
		
		foreach ($arr as $value) {
			//echo "<td  width='50' align='center'  style='background-color: #fff;border: 1pz solid #aaa;'> $value</td>";
			echo "<div class='cell'>";
				echo '<span>'.$value.'</span>';
			echo "</div>"; 
		}
		//echo "</tr></table>";
		
	}// end printRandom
	
}// end class
?>