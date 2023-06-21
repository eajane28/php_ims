<?php
include "../../user/db_connect.php";
$companyname=$_GET["companyname"];
$productname=$_GET["productname"];
$unit=$_GET["unit"];
$packingsize=$_GET["packingsize"];

$res=mysqli_query($link, "select * from stock where companyname='$companyname' && productname='$productname' && unit='$unit' && packingsize='$packingsize'");
while($row=mysqli_fetch_array($res))
{
    echo $row["price"];
}
?>