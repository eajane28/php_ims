<?php
session_start();
$sessionid=$_GET["sessionid"];
$b=array("companyname"=>"","productname"=>"","unit"=>"","packingsize"=>"","price"=>"","qty"=>"");
$_SESSION["cart"][$sessionid]=$b;
?>