 
  
 <?php
 session_start();
 //include('conn.php');

  if(file_exists("inspections/{$_POST['party']}")){
    echo "directory already exists <br/>";
  }else {

    mkdir("inspections/{$_POST['party']}",0777);
  }
 
  $date = date("d-m-Y");
 $newdir = $_POST['party'];
 $target_dir ="inspections/". $newdir;
   //the "/" is needed to direct the picture to the right file
$target_file = $target_dir."/" . basename($_FILES["fileToUpload"]["name"]);
$_SESSION['filename']=$target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br/>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br/>";
        $uploadOk = 0;
    }
}
//Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.<br/>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo "Sorry, your file is too large.<br/>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br/>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br/>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                
              
           $conn = connection();
          
   // $user_id=$_SESSION['user_id'];
          
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</br>";
               $photo_sql = "INSERT INTO pictures (user_id, dates ,address) VALUES ('{$newdir}','{$date}','{$target_file}')";
              
           if($conn->query($photo_sql) === true){
            echo "photo has been inserted into data base<br/>";
          

          }
    } else {
        echo "Sorry, there was an error uploading your file.<br/>";
        
    }
}
 
echo "<a href='/inspection'>Upload More Pictures</a>";
?>