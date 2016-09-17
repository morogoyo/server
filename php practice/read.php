<?php 


 $openfile = "file.txt";
 
 fopen($openfile,'r');
 
 $size = filesize($openfile);
 
 $data = fread($openfile , $size);
 
  fclose($openfile);
  
  echo $data ;








?>