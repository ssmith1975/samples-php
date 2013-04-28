<?
	require_once 'Manufacturer.php';

	abstract class Product2
	{
		// properties defined here
		protected $_type;
		protected $_title;
		protected $_manufacturer;


	
		
		// constructor
		public function __construct($type, $title)
		{
			$this->_type = $type;
			$this->_title = $title;		
			$this->_manufacturer = new Manufacturer();
		}
		
		// methods defined here
		public function getProductType()
		{
			return $this->_type; 
		}
		
		public function getTitle()
		{
			return $this->_title;
		}
		
		public function setManufacturerName($name)
		{
			$this->_manufacturer->setManufacturerName($name);
		}
		
		public function getManufacturerName()
		{
			return $this->_manufacturer->getManufacturerName();
	    }
		
		

		  public function __toString()
		  {
			return $this->_title;
		  }/**/

		
		abstract public function display();

	}

?>