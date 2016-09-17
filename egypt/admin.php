<?php
include('include/files.php');

$search = new ADMINISTRATOR();

$search->form();
$search->search();
$search->edit_form();
$search->test();
$search->edit_db();
$search->add_noble_form();
?>