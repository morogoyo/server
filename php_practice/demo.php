<?php

require 'class.address.inc';


echo '<h2> Instaniating  Address <h2>';

$address = new Address;

echo '<h2> Empty Address <h2>';
echo  '<tt><prev>'.var_export($address,true).'<prev></tt>';

echo '<h2> Setting properties<h2>';

$address->street_address_1 = '555 Fake Street ';
$address->city_name = 'Townsville ';
$address->subdivision_name = 'state ';
$address->postal_code = '12345';
$address->country_name = 'United States of America ';

echo  '<tt><prev>'.var_export($address,true).'<prev></tt>';

echo $address->display();


?>