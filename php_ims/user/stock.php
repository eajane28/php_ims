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
<?php
    $pesoSymbol =  '&#8369;';
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="dashboard.php" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i>
           Stock</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
        </div> 
        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Company Name</th>
                  <th>Product Name</th>
                  <th>Unit</th>
                  <!-- <th>Packing Size</th> -->
                  <th>Quantity</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $count=0;
                $res=mysqli_query($link,"select * from stock");
                while ($row=mysqli_fetch_array($res))
                {
                    $count=$count+1;
                    ?>
                    <tr>
                  <td><?php echo $count;?></td>
                  <td><?php echo $row["companyname"];?></td>
                  <td><?php echo $row["productname"];?></td>
                  <td><?php echo $row["unit"];?></td>
                  <td><?php echo $row["qty"];?></td>
                  <td><?php echo $pesoSymbol; echo $row["price"];?></td>
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
include "footer.php";
?>