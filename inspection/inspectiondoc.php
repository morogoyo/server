<?php

if(isset($_POST['customer'])){
               $_SESSION['name'];
               $_SESSION['username'];
               $_SESSION['email'];
               $_SESSION['user_id'];
               $_SESSION['address1'];
               $_SESSION['address2'];
               $_SESSION['city'];
               $_SESSION['state'];
               $_SESSION['zip'];
 }

include('include/functions.php');

include('include/header.php');
 ?>




<div class="panel panel-primary col-sm-6 ">
<div class="panel-heading">Customers</div>
<!-- Select customer to chance -->
 <form action="inspectiondoc.php" method ="post"> <select name="customer" selected ="{$_SESSION['user_id']}"> 

<?php
 select_name();
 ?>
</select>

<input type="submit"/>
<br/><br/><br/><br/><br/><br/><br/><br/>
</form>




</div>	
<div class="panel panel-primary col-sm-6 ">
<div class="panel-heading">Customers</div>

<?php 

         if(!isset($_SESSION['name'])){
               echo "no customer has been ";
            }
 else{
            if( isset($_POST['customer'])){
              $selected = $_POST['customer'];
               selected_info_pro_akeebasubs_users($selected);
                
                echo_variables();        
               
                  }else{
                     echo_variables();

                  }



 	
}
// $date = date("d/m/Y");
// $time = date("h:i:sa");
// $selected_photo = $selected.$date.$time;
// echo $selected_photo;

?>

</div>

<div class="panel panel-primary ">
<!--<div class="panel-heading">Customer Address and Map</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.4281006446668!2d-81.29341199999999!3d28.496765000000018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e7647d1cf5f9c7%3A0xe2e45c09e72fa060!2s2863+Redditt+Rd%2C+Orlando%2C+FL+32822!5e0!3m2!1sen!2sus!4v1443479715513" 
width="700" height="450" frameborder="2" style="border:0 ""center" allowfullscreen></iframe>
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.4281006446668!2d-81.29341199999999!3d28.496765000000018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e7647d1cf5f9c7%3A0xe2e45c09e72fa060!2s2863+Redditt+Rd%2C+Orlando%2C+FL+32822!5e0!3m2!1sen!2sus!4v1443479715513" 
width="700" height="450" frameborder="2" style="border:0 ""center" allowfullscreen></iframe> 
</div>-->

<div class="panel panel-primary ">
<div class="panel-heading">Pictures</div>

<div class="panel panel-primary col-sm-2">
	<form action= 'inspectiondoc.php' method='post' enctype='multipart/form-data'>
		Select image to upload:
		<input type='file' name='fileToUpload' id='fileToUpload'>
		<input type='text' name="party" value="<?php if(isset($_SESSION['user_id'])){
			echo $_SESSION['user_id'];}else{ echo 'enter customer number'; }?>">
		 <input type='submit' value='Upload Image' name='submit'>
		</form></div>

<!--   --------------------------------------------------------------                             -->

<?php 

  if(!isset($_POST['party'])){

    echo "you need to pick a picture";

  }else {
   
if(file_exists("inspections/{$_POST['party']}")){
    echo "directory already exists <br/>";
  }else {

    mkdir("inspections/{$_POST['party']}",0777);
  }
 
  //$date = date("d-m-Y");
  $picture_name=basename($_FILES["fileToUpload"]["name"]);
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
             //$time = date('h:i:sa');
   // $user_id=$_SESSION['user_id'];
          
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</br>";
               $photo_sql = "INSERT INTO pictures (user_id, dates,time ,address) VALUES ('{$newdir}','{$date}','{$time}','{$picture_name}')";
              
           if($conn->query($photo_sql) === true){
            echo "photo has been inserted into data base<br/>";
          

          }
    } else {
        echo "Sorry, there was an error uploading your file.<br/>";
        
    }
}


}

 
echo "<a href='/inspection'>Upload More Pictures</a>";

?>

</div>

<!--   --------------------------------------------------------------                             -->


<div class="panel panel-primary col-sm-12 ">
<div class="panel-heading">Findings descriptions</div>

  <?php 
     if (!isset($_POST['party']) ){
     echo "No pictures can be displayed";

     }else{

       images();
        
}

   ?>


</div>


<div class="panel panel-primary col-sm-12 ">
<div class="panel-heading">Comments</div>

</br>

<div class="form-group">
  <label for="comment">Comment:</label>
  <form action="inspectiondoc.php" method ="get">
  <textarea class="form-control" rows="5" id="comment" name='comment'></textarea>
  <p><?php 
  if (!isset($_POST['customer'])) {     
     echo "No comments have been saved yet";
  }else{
    echo $date."<BR/>";
    //echo $_SESSION['Address']."<BR/>"; 
    echo $_SESSION['comment'];
}

      comments();
?>

</p>
  <input type="submit">
</form>
</div>

</div>

<div></div>

</body>



<?php close_connection(); ?>


<html>

