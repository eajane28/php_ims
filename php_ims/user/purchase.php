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
include "header.php";
include "../user/db_connect.php";
?>


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="dashboard.php" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i>
            Add New Purchase</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Purchase</h5>
        </div>

        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Select Company:</label>
              <div class="controls">
                <select class="span11" name="companyname" id="companyname" onchange="select_company(this.value)">
                    <option>Select</option>
                   <?php
                   $res=mysqli_query($link,"select * from supplier");
                   while ($row=mysqli_fetch_array($res))
                   {
                    echo "<option>";
                    echo $companyname = $row['companyname'];
                    echo "</option>";
                   }
                   ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Product Name:</label>
              <div class="controls" id="productname_div">
                <select class="span11">
                <option>Select</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Unit:</label>
              <div class="controls" id="unit_div">
                <select class="span11">
                <option>Select</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Enter Packing Size:</label>
              <div class="controls" id="packingsize_div">
                <select class="span11">
                  <option>Select</option>
                </select>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Enter Quantity:</label>
              <div class="controls">
                <input type="text" name ="qty" class="span11" placeholder="Enter Quantity">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Enter Price:</label>
              <div class="controls">
                <input type="text" name ="price" class="span11" placeholder="Enter Price">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Purchase Type:</label>
              <div class="controls">
                <select class="span11" name="type">
                   <option>Select</option>
                   <option>Cash</option>
                   <option>Credit</option>
                   <option>Debit</option>
                </select>
              </div>
            </div>
    
            <div class="control-group">
              <label class="control-label">Enter Purchase Date:</label>
              <div class="controls">
                <input type="text" name ="dt" id="dt" class="span11" placeholder="YYYY-MM-DD" required pattern="\d{4}-\d{2}-\d{2}">
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" name= "submit1" class="btn btn-success">Purchase Now</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
                Purchase Inserted Successfully!
            </div>

          </form>
        </div>

      </div>
      
        </div> 
    </div>
</div>
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
            }
        };
        xmlhttp.open("GET", "forajax/load_packingsize_using_unit.php?unit="+unit+"&productname="+productname+"&companyname="+companyname, true);
        xmlhttp.send();
    }
</script>
<?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link, "insert into purchase values(NULL,'$_POST[companyname]','$_POST[productname]','$_POST[unit]','$_POST[packingsize]','$_POST[qty]','$_POST[price]','$_POST[type]','$_POST[dt]', '$_SESSION[user]')");
    $count=0;
    $res=mysqli_query($link, "select * from stock where companyname='$_POST[companyname]' && productname='$_POST[productname]' && unit='$_POST[unit]' && qty= '$_POST[qty]'");
    $count=mysqli_num_rows($res);

    if ($count==0){
        mysqli_query($link,"insert into stock values(NULL,'$_POST[companyname]','$_POST[productname]','$_POST[unit]','$_POST[packingsize]','$_POST[qty]','0')");
    }
    else
    {
      mysqli_query($link, "update stock set qty=qty+$_POST[qty] where companyname='$_POST[companyname]' && productname='$_POST[productname]' && unit='$_POST[unit]'");
    }
    ?>
    <script type="text/javascript">
        document.getElementById("success").style.display="block";
    </script>
    <?php
}
?>
<?php
include "footer.php";
?>