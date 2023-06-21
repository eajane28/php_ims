<?php
session_start();
$max=0;
if(isset($_SESSION['cart']))
{
    $max = sizeof($_SESSION['cart']);
}
for ($i = 0;$i < $max; $i++)
{
    if (isset($_SESSION['cart'][$i])) {
        $companyname = "";
        $productname = "";
        $unit = "";
        $packingsize = "";
        $qty="";
        foreach ($_SESSION['cart'][$i] as $key => $val) {
            if ($key == "companyname") {
                $companyname = $val;
            } else if ($key == "productname") {
                $productname = $val;
            } else if ($key == "unit") {
                $unit = $val;
            } else if ($key == "packingsize") {
                $packingsize = $val;
            }
            else if($key=="qty")
            {
                $qty=$val;
            }
        }
        echo $companyname." ".$productname." ".$unit." ".$packingsize." ".$qty;
        echo "<br>";
    }


}
?>
