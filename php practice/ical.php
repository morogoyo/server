<?php

$fileone = fopen("calendar.ics",w);
if (isset($fileone )){
echo "this is working up to here ";
}else {
	
	echo " the file is not set";
}


?>