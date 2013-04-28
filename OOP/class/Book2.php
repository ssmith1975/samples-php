
<?
require_once 'Product2.php';
require_once dirname(__FILE__).'/../interface/IRemove.php';

class Book2 extends Product2 implements IRemove 
{
  protected $_pageCount;
  protected static $_counter = 0;
  public $num;
 
  public function __construct($title, $pageCount)
  {
	parent::__construct('book', $title);
    self::$_counter++;
    $this->num = self::$_counter;
	
    if (!is_numeric($pageCount) || $pageCount < 1) {
      throw new Exception('Page count must be a positive number');
    }
	
  	$this->_pageCount = (int)$pageCount;
  }
  
  public function getPageCount()
  {
  	return $this->_pageCount;
  }
  
  public function display()
	{
	  echo "<p><strong>Book:</strong> $this->_title ($this->_pageCount pages)</p>";
	}
	
	public function Remove()
	{
		echo "<p>Book removed.</p>";
	}

}


?>
