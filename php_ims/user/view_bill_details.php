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
header('Content-Type: text/html; charset=utf-8');
$id=$_GET["id"];
$fullname="";
$bill_type="";
$date="";
$bill_no="";
$res=mysqli_query($link, "select * from billing_header where id=$id");
while($row=mysqli_fetch_array($res))
{
    $fullname=$row["fullname"];
    $bill_type=$row["bill_type"];
    $date=$row["date"];
    $bill_no=$row["bill_no"];
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="view_bills.php" title="Back" class="tip-bottom"><i class="icon-arrow-left"></i>
            View Bills</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>View Detailed Bills</h5>
        </div>

        <table>
            <tr>
                <th>Bill No:</th>
                <td><?php echo $bill_no; ?></td>
            </tr>

                <th>Full Name:</th>
                <td><?php echo $fullname; ?></td>
            </tr>
                <th>Bill Type:</th>
                <td><?php echo $bill_type; ?></td>
            </tr>
                <th>Bill Date</th>
                <td><?php echo $date; ?></td>
            </tr>
            </table>
            <br>
            <table  class= "table table-bordered">
                <tr>
                    <th>Company</th>
                    <th>Product Name</th>
                    <th>Unit</th>
                    <th>Packing Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                <?php
                    $pesoSymbol =  '&#8369;';
                ?>

                <?php
                $total=0;
            $res=mysqli_query($link, "select * from billing_details where bill_id=$id");
            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row["companyname"]; echo "</td>";
                echo "<td>"; echo $row["productname"]; echo "</td>";
                echo "<td>"; echo $row["unit"]; echo "</td>";
                echo "<td>"; echo $row["packingsize"]; echo "</td>";
                echo "<td>"; echo $pesoSymbol; echo $row["price"]; echo "</td>";
                echo "<td>"; echo $row["qty"]; echo "</td>";
                echo "<td>"; echo $pesoSymbol; echo ($row["price"]*$row["qty"]); echo "</td>";
                echo "</tr>";
                $total=$total+($row["price"]*$row["qty"]);
            }
            ?>
            </table>
            <div align="right" style="font-weight: bold">
                Grand Total:<?php echo $pesoSymbol; echo $total; ?>
            </div>
       
        </div>
        </div>

    </div>
</div>

<!--end-main-container-part-->

<?php
include "footer.php";
?>