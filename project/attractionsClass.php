<?php
class Attraction
{  
  
   static private $photoID = 0;
   private $filename;
   private $key;// primary key from database
   private $name;
   private $county;
   private $continent;
    
    

   function __construct($fileName, $ID, $name, $county, $continent) { 
       $this->ID = $ID;
	   $this->filename = $fileName.'.jpg';
       $this->name = $name;
       $this->county = $county;
       $this->continent = $continent;
	   self::$photoID++;
       $this->ID = self::$photoID;
   }    
    
   public function __toString() {
      $tag = '<a href="detail.php?id=' . $this->ID . '" class="img-responsive">';
      $tag .= '<img src="' . $this->filename . '" title="' . $this->name . '" alt="' . $this->name . '" >';   
      $tag .= '<div class="caption"><div class="blur"></div><div class="caption-text"><h1>' . $this->county . 
                  '</h1></div></div></a>';
      return $tag;       
   }
    
}

?>