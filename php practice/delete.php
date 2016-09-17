<?php

unlink("testfile.txt");

if ("testfile" == true){
    echo "file was deleted";

}else {
   echo "file is still in the directory";
}

?>