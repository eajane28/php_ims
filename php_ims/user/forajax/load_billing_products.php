<?php
session_start();
?>
  <table class = "table table-bordered">
  <tr>
        <th>Company Name</th>
        <th>Product Name</th>
        <th>Unit</th>
        <th>Packing Size</th>
        <th>Product Price</th>
        <th>Product Qty</th>
        <th>Total</th>
        <th>Delete</th>
    </tr>
                
<?php
$qtyfound=0;
$qty_session=0;
$max=0;

if (isset($_SESSION['cart']))
{
    $max=sizeof($_SESSION['cart']);
}

for($i=0;$i<$max;$i++)
{
    $companyname_session="";
    $productname_session="";
    $unit_session="";
    $packingsize_session="";
    $price_session="";

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
            else if($key=="price")
            {
                $price_session=$val;
            }
        }
        if($companyname_session!="")
        {
        ?>
        <tr>
        <td><?php echo $companyname_session; ?></td>
        <td><?php echo $productname_session; ?></td>
        <td><?php echo $unit_session; ?></td>
        <td><?php echo $packingsize_session; ?></td>
        <td><?php echo $price_session; ?></td>
        <td><input type= "text" id= "tt<?php echo $i ?>" value= "<?php echo $qty_session; ?>">&nbsp;<i class= "icon-refresh" style="font-size: 24px" onclick="edit_qty(document.getElementById('tt<?php echo $i; ?>').value, '<?php echo $companyname_session?>','<?php echo $productname_session?>', '<?php echo $unit_session?>', '<?php echo $packingsize_session?>', '<?php echo $price_session?>')"></i></td>
        <td><?php echo ($qty_session * $price_session); ?></td>
        <td style="color:red; cursor: pointer" onclick="delete_qty('<?php echo $i ?>')">Delete</td>
    </tr> 
<?php
}
    }
}
//return $qtyfound;

//  </table>
