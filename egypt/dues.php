

<?php
echo"test";
include('include/files.php');

$noble = new FINDNOBLE();

$noble->form();
$noble->find_noble_in_db();
$noble->information_check();

?>

