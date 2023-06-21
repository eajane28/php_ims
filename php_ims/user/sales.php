<?php
session_start();
if (!isset($_SESSION["user"]))
{
    ?>
    <script type= "text/javascript">
        window.location="index.php";
    </script>
    <?php
}
?>
<?php
// session_start();
include "header.php";
include "../user/db_connect.php";
$bill_id=0;
$res=mysqli_query($link,"select * from billing_header order by id desc limit 1");
while($row=mysqli_fetch_array($res))
{
    $bill_id=$row["id"];
}
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href= "https://cdnjs.cloudfare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div id="content">
    <form name="form1" action="" method="post" class="form-horizontal nopadding">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="dashboard.php" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i>
                    Sales</a></div>
        </div>

        <div class="container-fluid">
            
                <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Sales</h5>
                            </div>

                            <div class="widget-content nopadding">


                                <div class=" span4">
                                    <br>

                                    <div>
                                        <label>Full Name</label>
                                        <input type="text" class="span12" name="fullname" required>
                                    </div>
                                </div>

                                <div class="span3">
                                    <br>

                                    <div>
                                        <label>Bill Type</label>
                                        <select class="span12" name="bill_type_header">
                                            <option>Cash</option>
                                            <option>Credit</option>
                                            <option>Debit</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="span2">
                                    <br>

                                    <div>
                                        <label>Date</label>
                                        <input type="text" class="span12" name="date"
                                               value="<?php echo date("Y-m-d") ?>"
                                               readonly>
                                    </div>
                                </div>

                                <div class="span2">
                                    <br>

                                    <div>
                                        <label>Bill No</label>
                                        <input type="text" class="span12" name="bill_no"
                                               value="<?php echo generate_bill_no($bill_id);?>"
                                               readonly>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

                <!-- new row-->
                <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                    <div class="span12">


                        <center><h4>Select A Product</h4></center>


                        <div class="span2">
                            <div>
                                <label>Product Company</label>
                                <select class="span11" name="companyname" id="companyname"
                                        onchange="select_company(this.value)">
                                    <option>Select</option>
                                    <?php
                                    $res = mysqli_query($link, "select * from supplier");
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo "<option>";
                                        echo $row["companyname"];
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="span2">
                            <div>
                                <label>Product Name</label>
                                <div id="productname_div">
                                    <select class="span11">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>Unit</label>
                                <div id="unit_div">
                                    <select class="span11">
                                        <option>Select</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="span2">
                            <div>
                                <label>Packing Size</label>
                                <div id="packingsize_div">
                                    <select class="span11">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="span1">
                            <div>
                                <label>Price</label>
                                <input type="text" class="span11" name="price" id="price" readonly value="0">
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>Enter Qty</label>
                                <input type="text" class="span11" name="qty" id="qty" autocomplete="off" onkeyup="generate_total(this.value)">
                            </div>
                        </div>



                        <div class="span1">
                            <div>
                                <label>Total</label>
                                <input type="text" class="span11" name="total" id="total" value="0" readonly>
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>&nbsp</label>
                                <input type="button" class="span11 btn btn-success" value="Add" onclick="add_session();">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- end new row-->



            <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                <div class="span12">
                    <center><h4>Taken Products</h4></center>

                   <div id="bill_products"></div>

                    <h4>
                        <div style="float: right"><span style="float:left;">Total:&#8369;</span><span style="float: left" id="totalbill">0</span></div>
                    </h4>


                    <br><br><br><br>

                    <center>
                        <input type="submit" name= "submit1" value="generate bill" class="btn btn-success">
                    </center>

                </div>
            </div>
        </div>
        </form>
    </div>

<script type="text/javascript">
    function select_company(companyname)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("productname_div").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "forajax/load_product_using_company.php?companyname="+companyname, true);
        xmlhttp.send();
    }

    function select_product(productname, companyname)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("unit_div").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "forajax/load_unit_using_product.php?productname="+productname+"&companyname="+companyname, true);
        xmlhttp.send();
    }

    function select_unit(unit, productname, companyname)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("packingsize_div").innerHTML=xmlhttp.responseText;

                $('#packingsize').on('change', function(){
                    load_price(document.getElementById("packingsize").value);
                });


            }
        };
        xmlhttp.open("GET", "forajax/load_packingsize_using_unit.php?unit="+unit+"&productname="+productname+"&companyname="+companyname, true);
        xmlhttp.send();
    }

    function load_price(packingsize)
    {
        var companyname=document.getElementById("companyname").value;
        var productname=document.getElementById("productname").value;
        var unit=document.getElementById("unit").value;


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("price").value=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "forajax/load_price.php?companyname="+companyname+"&productname="+productname+"&unit="+unit+"&packingsize="+packingsize, true);
        xmlhttp.send();
    }

function generate_total(qty)
{
    document.getElementById("total").value= eval(document.getElementById("price").value) * eval(document.getElementById("qty").value);
}
function add_session()
{
    var companyname=document.getElementById("companyname").value;
    var productname=document.getElementById("productname").value;
    var unit=document.getElementById("unit").value;
    var packingsize=document.getElementById("packingsize").value;
    var price=document.getElementById("price").value;
    var qty=document.getElementById("qty").value;
    var total=document.getElementById("total").value;

    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
                if(xmlhttp.responseText=="")
                {
                    load_billing_products();
                    alert("product added successfully");
                }
                else
                {
                    load_billing_products();
                    alert(xmlhttp.responseText);
                }
            }
        };
        xmlhttp.open("GET", "forajax/save.php?companyname="+companyname+"&productname="+productname+"&unit="+unit+"&packingsize="+packingsize+"&price="+price+"&qty="+qty+"&total="+total, true);
        xmlhttp.send();
}
function load_billing_products(){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("bill_products").innerHTML=xmlhttp.responseText;
                load_total_bill();
            }
        };
        xmlhttp.open("GET", "forajax/load_billing_products.php", true);
        xmlhttp.send();
}
    function load_total_bill(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("totalbill").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "forajax/load_billing_amount.php", true);
        xmlhttp.send();
    }
    load_billing_products();

    function edit_qty(qtyl,companynamel, productnamel, unitl, packingsizel, pricel){


    var companyname=companynamel;
    var productname=productnamel;
    var unit=unitl;
    var packingsize=packingsizel;
    var price=pricel;
    var qty=qtyl;
    var total=eval(price)*eval(qty);

    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
                if(xmlhttp.responseText=="")
                {
                    load_billing_products();
                    alert("Quantity updated successfully!");
                }
                else
                {
                    load_billing_products();
                    alert(xmlhttp.responseText);
                }
            }
        };
        xmlhttp.open("GET", "forajax/update_in_session.php?companyname="+companyname+"&productname="+productname+"&unit="+unit+"&packingsize="+packingsize+"&price="+price+"&qty="+qty+"&total="+total, true);
        xmlhttp.send();
    }
    function delete_qty(sessionid){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
                if(xmlhttp.responseText=="")
                {
                    load_billing_products();
                    alert("Order deleted successfully!");
                }
                else
                {
                    load_billing_products();
                    alert(xmlhttp.responseText);
                }
            }
        };
        xmlhttp.open("GET", "forajax/delete_in_session.php?sessionid="+sessionid, true);
        xmlhttp.send();
    }
</script>
<?php
function generate_bill_no($id)
{
    if($id=="")
    {
        $id1=0;
    }
    else{
        $id1=$id;
    }
    $id1=$id1+1;

    $len=strlen($id1);

    if($len==1)
    {
        $id1="0000".$id1;
    }
    if($len==2)
    {
        $id1="000".$id1;
    }
    if($len==3)
    {
        $id1="00".$id1;
    }
    if($len==4)
    {
        $id1="0".$id1;
    }
    if($len==5)
    {
        $id1=$id1;
    }
    return $id1;
}
if (isset($_POST["submit1"]))
{
    $lastbillno=0;
    mysqli_query($link, "insert into billing_header values (NULL,'$_POST[fullname]','$_POST[bill_type_header]','$_POST[date]','$_POST[bill_no]', '$_SESSION[user]')");
    $res=mysqli_query($link, "select * from billing_header order by id desc limit 1");
    while($row=mysqli_fetch_array($res))
    {
        $lastbillno=$row["id"];
    }
    $max=sizeof($_SESSION['cart']);
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
                    mysqli_query($link, "insert into billing_details values (NULL,'$lastbillno','$companyname_session','$productname_session','$unit_session','$packingsize_session','$price_session','$qty_session')");
                    mysqli_query($link, "update stock set qty=qty-$qty_session where companyname='$companyname_session' && productname='$productname_session' && unit='$unit_session'");
                }
            }
        } 
    }
unset ($_SESSION['cart']);
?>
<script type="text/javascript">
    alert("bill generated successfully!");
    window.location.href=window.location.href;
<?php
include "footer.php";
?>