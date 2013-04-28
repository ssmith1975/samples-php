<?
require_once 'Product.php';

class DVD extends Product
{
  protected $_duration;
  
  public function __construct($title, $duration)
  {
  	parent::__construct('DVD', $title);
	$this->_duration = $duration;
  }
  
  public function getDuration()
  {
  	return $this->_duration;
  }
}

?>
