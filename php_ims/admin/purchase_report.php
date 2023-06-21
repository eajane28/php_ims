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

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="dashboard.php" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i>
                    Purchase Report</a></div>
        </div>
        <!--End-breadcrumbs-->
        <!--Action boxes-->
        <div class="container-fluid">

            <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
                <form class="form-inline" action="" name="form1" method="post">
                    <div class="form-group">
                        <label for="email">Select Start Date</label>
                        <input type="text" name="dt" id="dt" autocomplete="off" class="form-control" required style="width:200px;border-style:solid; border-width:1px; border-color:#666666" placeholder="click here to open calender"  >
                    </div>
                    <div class="form-group">
                        <label for="email">Select End Date</label>
                        <input type="text" name="dt2" id="dt2" autocomplete="off" placeholder="click here to open calender"  class="form-control" style="width:200px;border-style:solid; border-width:1px; border-color:#666666" >
                    </div>
                    <button type="submit" name="submit1" class="btn btn-success">Show Purchase From These Dates</button>
                    <button type="button" class="btn btn-warning" onclick="clearSearch()">Clear Search</button>
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
                                        <th>Sr No</th>
                                        <th>Purchase By</th>
                                        <th>Company</th>
                                        <th>Product Name</th>
                                        <th>Unit</th>
                                        <th>Packing Size</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Purchase Type</th>
                                        <th>Purchase Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=0;
                                    $res=mysqli_query($link,"select * from purchase where (date>='$_POST[dt]' && date<='$_POST[dt2]')");
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        $count=$count+1;
                                        echo "<tr>";
                                        echo "<td>"; echo $count; echo "</td>";
                                        echo "<td>"; echo $row["username"]; echo "</td>";
                                        echo "<td>"; echo $row["companyname"]; echo "</td>";
                                        echo "<td>"; echo $row["productname"]; echo "</td>";
                                        echo "<td>"; echo $row["unit"]; echo "</td>";
                                        echo "<td>"; echo $row["packingsize"]; echo "</td>";
                                        echo "<td>"; echo $row["qty"]; echo "</td>";
                                        echo "<td>"; echo $pesoSymbol; echo $row["price"]; echo "</td>";
                                        echo "<td>"; echo $row["type"]; echo "</td>";
                                        echo "<td>"; echo $row["date"]; echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        }
                        else{
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Purchase By</th>
                                        <th>Company</th>
                                        <th>Product Name</th>
                                        <th>Unit</th>
                                        <th>Packing Size</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Purchase Type</th>
                                        <th>Purchase Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=0;
                                    $res=mysqli_query($link,"select * from purchase");
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        $count=$count+1;
                                        echo "<tr>";
                                        echo "<td>"; echo $count; echo "</td>";
                                        echo "<td>"; echo $row["username"]; echo "</td>";
                                        echo "<td>"; echo $row["companyname"]; echo "</td>";
                                        echo "<td>"; echo $row["productname"]; echo "</td>";
                                        echo "<td>"; echo $row["unit"]; echo "</td>";
                                        echo "<td>"; echo $row["packingsize"]; echo "</td>";
                                        echo "<td>"; echo $row["qty"]; echo "</td>";
                                        echo "<td>"; echo $pesoSymbol; echo $row["price"]; echo "</td>";
                                        echo "<td>"; echo $row["type"]; echo "</td>";
                                        echo "<td>"; echo $row["date"]; echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        }
                        ?>
                      

                    </div>

            </div>


        </div>


    </div>
    </div>




<?php
include "footer.php";
?>



