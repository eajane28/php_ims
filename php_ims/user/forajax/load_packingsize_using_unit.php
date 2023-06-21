<?php
include "../../user/db_connect.php";
$unit=$_GET["unit"];
$companyname=$_GET["companyname"];
$productname=$_GET["productname"];
$res=mysqli_query($link, "select * from products where companyname='$companyname'&& productname='$productname' && unit='$unit'");

?>
<select class="span11" name="packingsize" id="packingsize">
    <option>Select</option>
<?php

while($row=mysqli_fetch_array($res))
{
    echo "<option>";
    echo $row["packingsize"];
    echo "</option>";
}
echo "</select>";
?>