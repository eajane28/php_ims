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
mysqli_query($link,"delete from unit where id=$id");
?>
<script type="text/javascript">
    window.location="add_new_unit.php";
</script>