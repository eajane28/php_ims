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
<?php
    $pesoSymbol =  '&#8369;';
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="stock_report.php" title="Refresh" class="tip-bottom"><i class="icon-refresh"></i>
           Stock</a></div>
    </div>
    
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        
                <form class="form-inline" action="" name="form1" method="post">
                <input list="text" name="type" placeholder="Search">
                    <button type="submit" name="submit1" class="btn btn-success">Search Product</button>
                </form>

                <br>

        <div class="span12">
        <div class="widget-content nopadding">
            <?php
            if (isset($_POST["submit1"]))
            {
                ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Company Name</th>
                        <th>Product Name</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count=0;
                        $res=mysqli_query($link,"select * from stock where productname='$_POST[type]'");
                        while ($row=mysqli_fetch_array($res))
                        {
                            $count=$count+1;
                            echo "<tr>";
                            echo "<td>"; echo $count; echo "</td>";
                            echo "<td>"; echo $row["companyname"]; echo "</td>";
                            echo "<td>"; echo $row["productname"]; echo "</td>";
                            echo "<td>"; echo $row["unit"]; echo "</td>";
                            echo "<td>"; echo $row["qty"]; echo "</td>";
                            echo "<td>"; echo $pesoSymbol; echo $row["price"]; echo "</td>";
                            echo "</tr>";
                            
                        }
                        ?>  
                    </tbody>
                    </table>
                    <?php
            }
            else
            {
                ?>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Company Name</th>
                      <th>Product Name</th>
                      <th>Unit</th>
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
                            echo "<tr>";
                            echo "<td>"; echo $count; echo "</td>";
                            echo "<td>"; echo $row["companyname"]; echo "</td>";
                            echo "<td>"; echo $row["productname"]; echo "</td>";
                            echo "<td>"; echo $row["unit"]; echo "</td>";
                            echo "<td>"; echo $row["qty"]; echo "</td>";
                            echo "<td>"; echo $pesoSymbol; echo $row["price"]; echo "</td>";
                            echo "</tr>";
                    }
                    ?>
                    
                  </tbody>
                </table>
        </div>
        </div>
        </div>
        </div>
        </div>
                <?php
            }
        
           
include "footer.php";
?>