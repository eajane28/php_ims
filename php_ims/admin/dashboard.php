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
        <div id="breadcrumb"><a href="dashboard.php" title="Refresh" class="tip-bottom"><i class="icon-home"></i>
            Dashboard</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; height: max-content; padding:10px;">
        <div class= "span12" style="width:97%; height:700px; text-align: center; padding: 10px;">
        <h1 style="height:100px; color: purple">Welcome to</h1>
        <h1 style="height:100px;  color: purple">BTS Merch</h1>
        <h1 style="height:100px;  color: purple">Inventory</h1>
        <h1 style="height:100px;  color: purple">Management</h1>
        <h1 style=" color: purple"> System</h1>
        <div style="height: 80px"></div>
        <div style="margin-top: 2%;; margin-left: 5%">
        <div class="card" style="width: 18rem; border-style: solid; border-width:1px; border-radius: 10px; float:left;">
                <div class="card-body">
                    <h3 class="card-title-center">No. of Products</h3>
                    <h4 class="card-text text-center">
                    <?php
                    $count=0;
                    $res=mysqli_query($link, "select * from products");
                    $count=mysqli_num_rows($res);
                    echo $count;
                    ?>
                    </h4>
                </div>

            </div>

            <div class="card" style="width: 18rem; border-style: solid; border-width:1px; border-radius: 10px; float:left; margin-left: 30px;">
                <div class="card-body">
                    <h3 class="card-title-center">Total Company</h3>
                    <h4 class="card-text text-center">
                    <?php
                    $count=0;
                    $res=mysqli_query($link, "select * from supplier");
                    $count=mysqli_num_rows($res);
                    echo $count;
                    ?>
                    </h4>
                </div>

            </div>

            <div class="card" style="width: 18rem; border-style: solid; border-width:1px; border-radius: 10px; float:left; margin-left: 30px;">
                <div class="card-body">
                    <h3 class="card-title-center">Total Orders</h3>
                    <h4 class="card-text text-center">
                    <?php
                    $count=0;
                    $res=mysqli_query($link, "select * from billing_header");
                    $count=mysqli_num_rows($res);
                    echo $count;
                    ?>
                    </h4>
                </div>
                </div>
            </div>
            </div>
        </div>

    </div>
</div>
<style>
    h1{
        font-size: 100px;
        font-family: sans-serif;
    }
</style>
<!--end-main-container-part-->

<?php
include "footer.php";
?>