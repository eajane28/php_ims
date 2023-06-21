<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inventory Management System</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/fullcalendar.css"/>
    <link rel="stylesheet" href="css/matrix-style.css"/>
    <link rel="stylesheet" href="css/matrix-media.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/jquery.gritter.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>


<div id="header">

    <h2 style="color: white;position: absolute">
        <a href="dashboard.html" style="color:white; margin-left: 30px; margin-top: 40px">PHP IMS</a>
    </h2>
</div>



<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="dropdown" id="profile-messages">
            <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                    class="icon icon-user"></i> <span class="text">Welcome Admin</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>


    </ul>
</div>

<!--sidebar-menu-->
<div id="sidebar">
    <ul>
        <li class="active">
            <a href="dashboard.php"><i class="icon icon-home"></i><span>Dashboard</span></a>
        </li>

        <li>
            <a href="add_new_user.php"><i class="icon icon-user"></i><span>Add New User</span></a>
        </li>

        <li>
            <a href="add_new_supplier.php"><i class="icon icon-briefcase"></i><span>Add New Supplier</span></a>
        </li>

        <li>
            <a href="add_new_product.php"><i class="icon icon-shopping-cart"></i><span>Add New Product</span></a>
        </li>
        
        <li>
            <a href="add_new_unit.php"><i class="icon icon-tag "></i><span>Add New Unit</span></a>
        </li>
        

        <li>
            <a href="purchase.php"><i class="icon icon-credit-card"></i><span>Purchase</span></a>
        </li>

        <li>
            <a href="stock.php"><i class="icon icon-barcode"></i><span>Stock</span></a>
        </li>

        <li>
            <a href="sales.php"><i class="icon icon-money"></i><span>Sales</span></a>
        </li>

        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Reports</span> <span
                class="label label-important">+</span></a>
            <ul>
                <li><a href="purchase_report.php">Purchase Report</a></li>
                <li><a href="stock_report.php">Stock Report</a></li>
                <li><a href="view_bills.php">Sales Report</a></li>
            </ul>
        </li>

    </ul>
</div>
<!--sidebar-menu-->
<div id="search">

        <a href="logout.php" style="color:white"><i class="icon icon-share-alt"></i><span>LogOut</span></a>

</div>