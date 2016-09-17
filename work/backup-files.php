<?php
global $dir;
$minus7days = time()-604800;
$fileModified = filemtime("E:\Backups\swope\site-www.samswopecharityride.org-20160627-150216.jpa");

if ($fileModified < $minus7days){
	
	echo "Backup is older than 7 days";
	}else{
	
	
		echo "Backup is up to date";
		
	}

var_dump($fileModified);

echo date("F d Y H:i:s.",$fileModified)."</br>";
echo date("F d Y H:i:s.",$minus7days)."</br>";


// this will iterate thru the files in the directory 
  $dir = new DirectoryIterator(dirname("E:/Backups/__FILE__/"));
foreach ($dir as $fileName){
	//if file is not a . or a .. it will be put in to the array $backup
	 if ( $fileName->isDir()){
		
		
		echo	$fileName->getFilename()."</br>";
		    
		echo $fileName->next();
		
	
		}

		
	}

//}
	




//$file = fopen("E:\Backups\site-www.samswopecharityride.org-20160627-150216.jpa","r") or die("unable to open file ");
// echo fread($file,filesize("E:\Backups\site-www.samswopecharityride.org-20160627-150216.jpa"));



?>

