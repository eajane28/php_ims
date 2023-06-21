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
            Add New Supplier</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Supplier</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Enter Company name" name="companyname" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Enter First name" name="firstname" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Enter Lastname" name="lastname" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mobile no. :</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter Mobile no." name="mobileno" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type= "text" class="span11" placeholder="Enter Email Address" name="email" required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address :</label>
              <div class="controls">
                <input type= "text" class="span11" placeholder="Enter Address" name="address" required/>
              </div>
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
                  <th>Company Name</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Mobile no.</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $res=mysqli_query($link,"select * from supplier");
                while ($row=mysqli_fetch_array($res))
                {
                    ?>
                    <tr>
                  <td><?php echo $row["companyname"];?></td>
                  <td><?php echo $row["firstname"];?></td>
                  <td><?php echo $row["lastname"];?></td>
                  <td><?php echo $row["mobileno"];?></td>
                  <td><?php echo $row["email"];?></td>
                  <td><?php echo $row["address"];?></td>
                  <td><a href="edit_supplier.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                  <td><a href="delete_supplier.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
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
    
    
        mysqli_query($link, "insert into supplier values(NULL,'$_POST[companyname]','$_POST[firstname]','$_POST[lastname]','$_POST[mobileno]','$_POST[email]','$_POST[address]')");

?>
<script type="text/javascript">
            document.getElementById("error").style.display="none";
            document.getElementById("success").style.display="block";
            setTimeout(function(){
                window.location.href=window.location.href;
            },3000);
        </script>
<?php
}
?>
<?php
include "footer.php";
?>