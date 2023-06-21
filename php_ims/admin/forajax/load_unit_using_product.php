<?php
include "../../user/db_connect.php";
$companyname=$_GET["companyname"];
$productname=$_GET["productname"];
$res=mysqli_query($link, "select * from products where companyname='$companyname'&& productname='$productname'");

?>
<select class="span11" name="unit" id="unit" onchange="select_unit(this.value, '<?php echo $productname;?>', '<?php echo $companyname;?>')">
    <option>Select</option>
<?php

while($row=mysqli_fetch_array($res))
{
    echo "<option>";
    echo $row["unit"];
    echo "</option>";
}
echo "</select>";
?>