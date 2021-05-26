<?php $thisPage = "CreateWarehouse"; ?>
<?php
include('nav/header.php');
session_start();
require_once("database/db_connection.php");
$ware_name = test_input($_POST['warehouseName']);
$ware_city = test_input($_POST['warehouseCity']);
$ware_address = test_input($_POST['warehouseAddress']);
$ware_tel = test_input($_POST['warehouseTel']);
$sql = "INSERT INTO warehouse (name, city, address, tel)
VALUES ('$ware_name', '$ware_city', '$ware_address','$ware_tel')";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<div class="container col-lg-4 mt-5">
    <div class="card p-5 text-success border-success text-right">
        <?php
        if ($conn->query($sql) === TRUE) {
            echo "انبار با موفقیت ایجاد شد.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        ?>
    </div>
</div>