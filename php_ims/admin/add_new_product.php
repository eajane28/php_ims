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
?>


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="dashboard.php" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i>
            Add New Product</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Product</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Select Company:</label>
              <div class="controls">
                <select class="span11" name="companyname" required>
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
              <label class="control-label">Enter Product Name:</label>
              <div class="controls">
                <input type="text" name ="productname" class="span11" placeholder="Enter Product Name" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Select Unit:</label>
              <div class="controls">
                <select class="span11" name="unit" required>
                <option>Select</option>
                   <?php
                   $res=mysqli_query($link,"select * from unit");
                   while ($row=mysqli_fetch_array($res))
                
                   {
                    echo "<option>";
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
                <input type="text" name ="packingsize" class="span11" placeholder="Enter Packing size" required>
              </div>
            </div>
            

            <div class="alert alert-danger" id="error" style="display:none">
                This Product Already Exist! Please Try Another.
            </div>

            
    
            <div class="form-actions">
              <button type="submit" name= "submit1" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
                Record Inserted Successfully!
            </div>

          </form>
        </div>

      </div>
      
        </div> <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Company Name</th>
                  <th>Product Name</th>
                  <th>Unit</th>
                  <th>Packing Size</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $res=mysqli_query($link,"select * from products");
                while ($row=mysqli_fetch_array($res))
                {
                    ?>
                    <tr>
                  <td><?php echo $row["id"];?></td>
                  <td><?php echo $row["companyname"];?></td>
                  <td><?php echo $row["productname"];?></td>
                  <td><?php echo $row["unit"];?></td>
                  <td><?php echo $row["packingsize"];?></td>
                  <td><a href="edit_product.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                  <td><a href="delete_product.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                  </tr>
                    
                    <?php
                }
                ?>
                
              </tbody>
            </table>
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
            document.getElementById("error").style.display="none";
            document.getElementById("success").style.display="block";
        </script>
        <?php
    }
    else{
        mysqli_query($link, "insert into products values(NULL, '$_POST[companyname]', '$_POST[productname]', '$_POST[unit]', '$_POST[packingsize]')");

?>
<script type="text/javascript">
            document.getElementById("error").style.display="none";
            document.getElementById("success").style.display="block";
            setTimeout(function(){
                window.location.href=window.location.href;
            },3000);
        </script>
    
<!--end-main-container-part-->

<?php
    }
}
include "footer.php";
?>