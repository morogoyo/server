<?php

//Physical Address

class Address{
// Street address.
public $street_address_1;
public $street_address_2;

//Name of the City

public $_city_name;

 // 

 public $subdivision_name;

 //postal code

 public $postal_code;

// name of the country
 public $country_name;


/*
display address html
*/
 function display(){
 $output ='';
 // Street Address
 $output .= $this->street_address_1;
   if ($this->street_address_2){
   	$output .= '<br/>'. $this->street_address_2;
   }
   //city , Subdivision Postal.
    $output .='<br/>';
    $output .= $this->city_name.','.$this->subdivision_name;
    $output .=' '.$this->postal_code;

    //Country
    $output.='<br/>';
    $output .= $this->country_name;
 return $output;
}
}



?>