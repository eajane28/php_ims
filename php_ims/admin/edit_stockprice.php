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
$qty="";
$price="";
$res=mysqli_query($link, "select * from stock where id=$id");
while($row=mysqli_fetch_array($res))
{
    $companyname=$row["companyname"];
    $productname=$row["productname"];
    $unit=$row["unit"];
    $qty=$row["qty"];
    $price=$row["price"];
}
?>


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="stock.php" title="Back" class="tip-bottom"><i class="icon-arrow-left"></i>
            Edit Stock Price</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Stock Price</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company:</label>
              <div class="controls">
              <input type="text" class="span11" name="companyname" readonly value="<?php echo $companyname; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Name:</label>
              <div class="controls">
                <input type="text" name ="productname" class="span11" readonly value="<?php echo $productname; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Unit:</label>
              <div class="controls">
              <input type="text" name ="unit" class="span11" readonly value="<?php echo $unit; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Quantity:</label>
              <div class="controls">
                <input type="text" name ="qty" class="span11" readonly value ="<?php echo $qty; ?>">
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Price:</label>
              <div class="controls">
                <input type="text" name ="price" class="span11" placeholder="New Selling Price" value ="<?php echo $price; ?>">
              </div>
            </div>

    
            <div class="form-actions">
              <button type="submit" name= "submit1" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
                Price  Updated Successfully!
            </div>

          </form>
        </div>

      </div>
    </div>
</div>

<?php
if(isset($_POST["submit1"]))
{
        mysqli_query($link,"update stock set price = '$_POST[price]' where id=$id");
?>
<script type="text/javascript">
            document.getElementById("success").style.display="block";
            setTimeout(function(){
                window.location="stock.php";
            },1000);
        </script>
    

<?php
    }
include "footer.php";
?>