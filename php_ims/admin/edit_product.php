<?php
session_start();
if (!isset($_SESSION["admin"]))
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
$id=$_GET["id"];
$companyname="";
$productname="";
$unit="";
$packingsize="";
$res=mysqli_query($link, "select * from products where id=$id");
while($row=mysqli_fetch_array($res))
{
    $companyname=$row["companyname"];
    $productname=$row["productname"];
    $unit=$row["unit"];
    $packingsize=$row["packingsize"];
}
?>


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="add_new_product.php" title="Back" class="tip-bottom"><i class="icon-arrow-left"></i>
            Edit Product</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Product</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Select Company:</label>
              <div class="controls">
                <select class="span11" name="companyname">
                   <?php
                   $res=mysqli_query($link,"select * from supplier");
                   while ($row=mysqli_fetch_array($res))
                
                   {
                    ?>
                    <option <?php if ($row["companyname"] == $companyname){echo "selected";} ?>>
                    <?php
                    echo $companyname = $row['companyname'];
                    echo "</option>";
                   }
                   ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Enter Product Name:</label>
              <div class="controls">
                <input type="text" name ="productname" class="span11" placeholder="Enter Product Name" value="<?php echo $productname; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Select Unit:</label>
              <div class="controls">
                <select class="span11" name="unit">
                   <?php
                   $res=mysqli_query($link,"select * from unit");
                   while ($row=mysqli_fetch_array($res))
                
                   {
                    ?>
                    <option <?php if ($row["unit"] == $unit){echo "selected";} ?>>
                    <?php
                    echo $row["unit"];
                    echo "</option>";
                   }
                   ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Enter Packing Size:</label>
              <div class="controls">
                <input type="text" name ="packingsize" class="span11" placeholder="Enter Packing size" value ="<?php echo $packingsize; ?>">
              </div>
            </div>
            

            <div class="alert alert-danger" id="error" style="display:none">
                This Product Already Exist! Please Try Another.
            </div>

            
    
            <div class="form-actions">
              <button type="submit" name= "submit1" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
                Record  Updated Successfully!
            </div>

          </form>
        </div>

      </div>
    </div>
</div>

<?php
if(isset($_POST["submit1"]))
{
    $count=0;
    $res=mysqli_query($link, "select * from products where companyname='$_POST[companyname]'&& productname='$_POST[productname]' && unit='$_POST[unit]' && packingsize='$_POST[packingsize]'");
    $count=mysqli_num_rows($res);

    if ($count>0)
    {
        ?>
        <script type="text/javascript">
             document.getElementById("success").style.display="block";
            document.getElementById("error").style.display="none";
           
        </script>
        <?php
    }
    else{
        //mysqli_query($link, "insert into products values(NULL, '$_POST[companyname]', '$_POST[productname]', '$_POST[unit]', '$_POST[packingsize]')");
        mysqli_query($link,"update products set companyname ='$_POST[companyname]', productname = '$_POST[productname]', unit = '$_POST[unit]', packingsize = '$_POST[packingsize]' where id=$id");
?>
<script type="text/javascript">
            document.getElementById("error").style.display="none";
            document.getElementById("success").style.display="block";
            setTimeout(function(){
                window.location="add_new_product.php";
            },1000);
        </script>
    
<!--end-main-container-part-->

<?php
    }
}
include "footer.php";
?>