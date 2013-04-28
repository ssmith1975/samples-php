<?
require_once 'Product2.php';
require_once dirname(__FILE__).'/../interface/IRemove.php';

class DVD2 extends Product2 implements IRemove 
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
  
	public function display()
	{
	  echo "<p><strong>DVD:</strong> $this->_title ($this->_duration)</p>";
	}
	public function Remove()
	{
		echo "<p>DVD removed.</p>";
	}
}

?>
