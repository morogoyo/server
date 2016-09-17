<?php

include('conn.php');

// $date=date('d-m-Y');
// $time = date("h:i:sa");//$_GLOBALS['date']=$date;
//query for pro_users #1
function sql_pro_users(){
	$conn= connection();
	 $sql = "SELECT * FROM pro_users";
   // $conn = this->$conn;
$result = $conn->query($sql);
   return $result;
}
//query for pro_akeebasubs_users #2
function sql_pro_akeebasubs_users(){
	$conn = connection();
	 $sql = "SELECT * FROM pro_akeebasubs_users";
     $result = $conn->query($sql);
     return $result; 
}
// Displaying Names from pro_users (joomla user table) #1


function select_name(){

     $conn = connection();
     
   $sql = "SELECT pro_users.id,pro_users.name, pro_akeebasubs_subscriptions.user_id 
   as subs_user_id FROM pro_users LEFT JOIN pro_akeebasubs_subscriptions 
   ON pro_users.id = pro_akeebasubs_subscriptions.user_id";
      
       $result3 = $conn->query($sql);

       if ($result3->num_rows >0) {
           // output data of each row
            while($row3  = $result3->fetch_object() ) {
                 if($row3->subs_user_id === $row3->id){
               echo "<option  value=".$row3->subs_user_id.">".$row3->name."</option>";
       
              
         }
      }

    }

  }


//Displaying user id from sql_pro_akeebasubs_subscriptions #3
// function selected_info_pro_akeebasubs_subscriptions($selected){
//      $result = sql_pro_akeebasubs_subscriptions();
//         echo $result->num_rows;
//      if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_object()) {
//     	  if($row->user_id == $row->user_id){
//                echo "<br/>".$row->akeebasubs_subscription_id."<br/>";
//     	  }

//       echo"user-id:  ".$row->user_id."<br/>";
//       echo"akeebasubs_subscription_id:  ".$row->akeebasubs_subscription_id."<br/>";   
//     }
// }
     
// }

function selected_info_pro_akeebasubs_users($selected){
     $result = sql_pro_akeebasubs_users();
     $result2 = sql_pro_users();
     $selected=strval($selected);
        
   
     //results are being pulled from sql_pro_users()
              if ($result2->num_rows > 0) {
    // output data of each row
     
    while($row2 = $result2->fetch_object() ) {
      
      if($row2->id === $selected ){
        
         $_SESSION['email']=$row2->email;
         $_SESSION['username']=$row2->username;
         $_SESSION['name']=$row2->name;

      }
    }
  }

     if ($result->num_rows > 0) {
    // output data of each row
     
    while($row = $result->fetch_object() ) {
             
           // echo "these numbers are just to show the customer number in joomla ";
         // echo $row->user_id."<br/>";
           if($row->user_id === $selected ){
               
                   
               $_SESSION['user_id']=$row->user_id;
               $_SESSION['address1']=$row->address1;
               $_SESSION['address2']=$row->address1;
               $_SESSION['city']=$row->city;
               $_SESSION['state']=$row->state;
               $_SESSION['zip']=$row->zip;

              } 
            }
    
}
     

}


function images(){

              echo "pictures go here<br/>";
              $conn = connection();
             //$date=date('d-m-Y');
              $photo_sql_down= "SELECT * FROM pictures WHERE user_id={$_POST['party']} ";
             $result=$conn->query($photo_sql_down) ;
              
                  if($result->num_rows >0){
                while($row = $result->fetch_object()){
                       $row =$row->address;
                    // $_SESSION['webaddress'] = $row->address;
                       // needs to be worked on to see the picture bigger
                  // echo "<a img height= 'auto' with='auto' href='http://localhost/inspection/inspections/{$_SESSION['user_id']}/{$row}'/>><img with = '200' height = '200' src='http://localhost/inspection/inspections/{$_SESSION['user_id']}/{$row}'/></a>";
                  echo "<a img height= 'auto' with='auto' href='http://localhost/inspection/inspections/{$_SESSION['user_id']}/{$row}'/>><img with = '200' height = '200' src='http://localhost/inspection/inspections/{$_SESSION['user_id']}/{$row}'/></a>";
               
               }
             }
           }




function comments(){
  $date=date('d-m-Y');
  $time = date("h:i:sa");
   $conn = connection();
    $comment_sql = "INSERT INTO comments (user_id, comments,dates ,time) VALUES ('{$_SESSION['user_id']}','{$_GET['comment']}','{$date}','{$time}')";
    $conn->query($comment_sql);

}

//test function
function echo_variables(){
               echo "<b>Name:</b>"      .$_SESSION['name']    ."<br/>";
               echo "<b>User name:</b>" .$_SESSION['username']."<br/>";
               echo "<b>Email:</b>"     .$_SESSION['email']   ."<br/>";

               echo "<b>User id:</b> ".$_SESSION['user_id'] ."<br/>";
               echo "<b>Address:</b> ".$_SESSION['address1']."<br/>";
               echo "<b>Address:</b> ".$_SESSION['address2']."<br/>";
               echo "<b>City:   </b> ".$_SESSION['city']    ."<br/>";
               echo "<b>State:</b>   ".$_SESSION['state']   ."<br/>";
               echo "<b>Zip Code:</b>".$_SESSION['zip']     ."<br/>";

}




function close_connection(){
$conn= connection();
     
    $conn->close(); 

}


 include('include/header.php');
function loginform(){
  ?>

<div class="panel  panel-primary">
  <div class="panel-heading">Panel heading without title</div>
  <div class="panel-body">
    <form action='' method='post'>
  <div class="form-group">
    <label for="username">User Name</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="username">
  </div>
  <div class="form-group">
    <label for="Password">Password 
    </label>
    <input type="password" class="form-control" id="Password" name ="password" placeholder="Password">
  </div>
   
  <button type="submit"  name= 'login' class="btn btn-default">Submit</button>
</form>
  </div>
</div>
<?php
}

function login(/*$name,$password*/){

//connect to data base
  $conn = connection();

  //query data base
  $sql = "SELECT * FROM pro_users";
    $resultslogin = $conn->query($sql);

    if($resultslogin->num_rows > 0){

          while ( $row = $resultslogin->fetch_object()) {

               echo $row->password ." (".strlen($row->password)." )<br/>";
             
              // list($md5pass, $saltpass) = split(":", $password);
              //  if ((md5($_POST["password"].$saltpass))==$md5pass){}
              //    if($name === $row['name'] && $password === $row['password']){}
            }
          }


    }

  //compare data base info to input info

  //give error message out






  //use for data base once migrated to server 
// $servername = 'localhost';
// $username = "inandout_trey";
// $password = "Beast4414";
// $dbname = "inandout_joomla2015";

?>











