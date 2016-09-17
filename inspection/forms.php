
<?php
 include('include/header.php');
function loginform(){
  ?>

<div class="panel  panel-primary">
  <div class="panel-heading">Panel heading without title</div>
  <div class="panel-body">
    <form>
  <div class="form-group">
    <label for="username">User Name</label>
    <input type="text" class="form-control" id="username" placeholder="username">
  </div>
  <div class="form-group">
    <label for="Password">Password 
    </label>
    <input type="password" class="form-control" id="Password" placeholder="Password">
  </div>
   
  <button type="submit" class="btn btn-default">Submit</button>
</form>
  </div>
</div>
<?php
}
?>