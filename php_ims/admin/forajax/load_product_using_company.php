<?php
include "../../user/db_connect.php";
$companyname=$_GET["companyname"];
$res=mysqli_query($link, "select * from products where companyname='$companyname'");

?>
<select class="span11" name="productname" id="productname" onchange="select_product(this.value, '<?php echo $companyname?>')">
    <option>Select</option>
<?php

while($row=mysqli_fetch_array($res))
{
    echo "<option>";
    echo $row["productname"];
    echo "</option>";
}
echo "</select>";
?>