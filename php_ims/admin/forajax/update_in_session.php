<?php
session_start();
include "../../user/db_connect.php";
$companyname=$_GET["companyname"];
$productname=$_GET["productname"];
$unit=$_GET["unit"];
$packingsize=$_GET["packingsize"];
$price=$_GET["price"];
$qty=$_GET["qty"];
$total=$_GET["total"];


        $av_qty=0;
        $exist_qty=0;
        $exist_qty=0;
        $exist_qty=$qty;
        $av_qty=check_qty($companyname,$productname, $unit, $packingsize,$link);
        if($av_qty>=$exist_qty)
        {
            $check_product_no_session=check_product($companyname,$productname, $unit, $packingsize);
            $b=array("companyname"=>$companyname,"productname"=>$productname,"unit"=>$unit,"packingsize"=>$packingsize,"price"=>$price,"qty"=>$exist_qty);
            $_SESSION['cart'][$check_product_no_session]=$b;
        }
        else{
            echo "Entered quantity not available!";
        }
function check_qty($companyname,$productname, $unit, $packingsize,$link)
{
    $qty=0;
    $res=mysqli_query($link, "select * from stock where companyname='$companyname' && productname='$productname' && unit='$unit' && packingsize='$packingsize'");
    while($row=mysqli_fetch_array($res))
    {
        $qty=$row["qty"];
    }
    return $qty;
}

function check_duplicate($companyname,$productname, $unit, $packingsize)
{
    $found=0;
    $max=sizeof($_SESSION['cart']);
    for($i=0;$i<$max;$i++)
    {

        if(isset($_SESSION['cart'][$i]))
        {
            $companyname_session="";
            $productname_session="";
            $unit_session="";
            $packingsize_session="";

            foreach($_SESSION['cart'][$i] as $key => $val)
            {
                if($key=="companyname")
                {
                    $companyname_session=$val;
                }
                else if($key=="productname")
                {
                    $productname_session=$val;
                }
                else if($key=="unit")
                {
                    $unit_session=$val;
                }
                else if($key=="packingsize")
                {
                    $packingsize_session=$val;
                }
            }

            if($companyname_session==$companyname && $productname_session==$productname && $unit_session==$unit && $packingsize_session==$packingsize)
            {
                $found=$found+1;
            }
        }
    }
    return $found;
}

function check_the_qty($companyname,$productname, $unit, $packingsize)
{
    $qtyfound=0;
    $qty_session=0;
    $max=sizeof($_SESSION['cart']);
    for($i=0;$i<$max;$i++)
    {
        $companyname_session="";
        $productname_session="";
        $unit_session="";
        $packingsize_session="";

        if(isset($_SESSION['cart'][$i]))
        {
           

            foreach($_SESSION['cart'][$i] as $key => $val)
            {
                if($key=="companyname")
                {
                    $companyname_session=$val;
                }
                else if($key=="productname")
                {
                    $productname_session=$val;
                }
                else if($key=="unit")
                {
                    $unit_session=$val;
                }
                else if($key=="packingsize")
                {
                    $packingsize_session=$val;
                }
                else if($key=="qty")
                {
                    $qty_session=$val;
                }
            }

            if($companyname_session==$companyname && $productname_session==$productname && $unit_session==$unit && $packingsize_session==$packingsize)
            {
                $qtyfound=$qty_session;
            }
        }
    }
    return $qtyfound;
}

function check_product($companyname,$productname, $unit, $packingsize)
{
    $recordno=0;
    $max=sizeof($_SESSION['cart']);
    for($i=0;$i<$max;$i++)
    {

        if(isset($_SESSION['cart'][$i]))
        {
            $companyname_session="";
            $productname_session="";
            $unit_session="";
            $packingsize_session="";

            foreach($_SESSION['cart'][$i] as $key => $val)
            {
                if($key=="companyname")
                {
                    $companyname_session=$val;
                }
                else if($key=="productname")
                {
                    $productname_session=$val;
                }
                else if($key=="unit")
                {
                    $unit_session=$val;
                }
                else if($key=="packingsize")
                {
                    $packingsize_session=$val;
                }
            }

            if($companyname_session==$companyname && $productname_session==$productname && $unit_session==$unit && $packingsize_session==$packingsize)
            {
                $recordno=$i;
            }
        }
    }
    return $recordno;
}
?>