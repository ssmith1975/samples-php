<?
require_once 'Product.php';


class Book extends Product
{
  protected $_pageCount;
   protected static $_counter = 0;
  public $num;
 
  public function __construct($title, $pageCount)
  {
	parent::__construct('book', $title);
    self::$_counter++;
    $this->num = self::$_counter;
	
	
  	$this->_pageCount = $pageCount;
  }
  
  public function getPageCount()
  {
  	return $this->_pageCount;
  }
}


?>