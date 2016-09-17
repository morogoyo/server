<?php 
  require_once('include/subs.class.php');
$subs = new Subscription();
echo $subs->fname;
$subs->insert();


?>