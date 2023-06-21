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
include "../user/db_connect.php";
$id=$_GET["id"];
mysqli_query($link,"delete from supplier where id=$id");
?>
<script type="text/javascript">
    window.location="add_new_supplier.php";
</script>