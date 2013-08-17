<?php
    // object-collection.php
    
    class Person {
        private $id;
        private $name;
        private $age;
        
        public static $id_insert = 1;
        
        public function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
            $this->id = self::$id_insert;
            
            self::$id_insert++;
        }
        
        public function getId() {
            return $this->id;
        }
        
        public function setName($value){
            $this->name = $value;
        }
        
        public function getName(){
            return $this->name;
        }
        
        public function setAge($age){
            $this->age = $age;
        }
        
        public function getAge(){
            return $this->age;
        }
        
        
        public function display(){
            return "Id: {$this->getId()}, Name: {$this->getName()}, Age: {$this->getAge()}";
        }
    } // end Person
    
    
    class Group {
        private $personList = array();
        
        public function __construct(){
            
        }
        
        
        public function addPerson(Person $person) {
           $this->personList[$person->getId()] = $person; 
        }
        
        public function removePerson($id){
            if($this->findById($id)){
                unset($this->personList[$id]);
            } else {
                echo "No Person to delete";
            }
            
        }
        
        public function findById($id) {
            if( key_exists($id, $this->personList) ){
                return $this->personList[$id];
            } else {
                return null;
            }  
        }
        
        
        public function displayGroup($label="Group List") {
            
            
            $text = "<h2>{$label}</h2>";
            
            if(isset($this->personList)){           
                $text .= "<ul>";
                foreach($this->personList as $id => $person){
                    $text .= "<li>".   $person->display()  ."</li>";                
                }
                $text .=  "</ul>";
            } else {
                $text .= "<p>No results available</p>";
            } 
            
           return $text;
        }
        
        
        
    } // end Group
    
    // Create 'Person' objects
    $person1 = new Person("Joey Brown", 29);
    $person2 = new Person ("Susie Davis", 32);
    $person3 = new Person("Lou Johnson", 33);
    $person4 = new Person("Al Pal", 44);
    
   // $person1->display();
    
    $group = new Group();
    $group->addPerson($person1);
    $group->addPerson($person2);
    $group->addPerson($person3);
    $group->addPerson($person4);
    
    //$group->removePerson(5);   
    //$group->displayGroup();
    
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Object Collection</title>
</head>

<body>
<h1>Object Collection</h1>
<?php
    echo $group->displayGroup();
   
    $group->removePerson(2); 
    
    echo $group->displayGroup("After Removing Susie Davis...");   
      
    //$group->displayGroup();
?>
</body>
</html>