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
$firstname="";
$lastname="";
$mobileno="";
$email="";
$address="";
$res=mysqli_query($link, "select * from supplier where id=$id");
while($row=mysqli_fetch_array($res))
{
    $companyname=$row["companyname"];
    $firstname=$row["firstname"];
    $lastname=$row["lastname"];
    $mobileno=$row["mobileno"];
    $email=$row["email"];
    $address=$row["address"];
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="add_new_supplier.php" title="Back" class="tip-bottom"><i class="icon-arrow-left"></i>
            Supplier</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit User</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
          <div class="control-group">
              <label class="control-label">Company Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Company name" name="companyname" value="<?php echo $companyname; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" name="firstname" value="<?php echo $firstname; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name" name="lastname" value="<?php echo $lastname; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mobile No. :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Mobile No." name="mobileno" value="<?php echo $mobileno; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Email" name="email" value="<?php echo $email; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address :</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Address" name="address" value="<?php echo $address; ?>"/>
              </div>
            </div>


            
    
            <div class="form-actions">
              <button type="submit" name= "submit1" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
                Record Updated Successfully!
            </div>

          </form>
        </div>

      </div>
      
        </div>
        </div>

    </div>
</div>
<?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link, "update supplier set companyname='$_POST[companyname]', firstname='$_POST[firstname]', lastname='$_POST[lastname]', mobileno='$_POST[mobileno]', email='$_POST[email]', address='$_POST[address]' where id=$id") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
    document.getElementById("success").style.display="block";
    setTimeout(function(){
        window.location="add_new_supplier.php";
    },1000);
</script>
<?php
}
?>
<!--end-main-container-part-->

<?php
include "footer.php";
?>