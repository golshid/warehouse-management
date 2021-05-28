<?php $thisPage = "CreateWarehouse"; ?>
<?php
include('nav/header.php');
session_start();
require_once("database/db_connection.php");
$ware_name = test_input($_POST['warehouseName']);
$ware_city = test_input($_POST['warehouseCity']);
$ware_address = test_input($_POST['warehouseAddress']);
$ware_tel = test_input($_POST['warehouseTel']);
$sql_check_ware = "SELECT * FROM warehouse WHERE name = '$ware_name' AND city = '$ware_city' AND address = '$ware_address'";
$result = $conn->query($sql_check_ware);
if (mysqli_num_rows($result) > 0) {
    $alert =" انبار از قبل وجود دارد";
    }
else {
    $sql = "INSERT INTO warehouse (name, city, address, tel)
VALUES ('$ware_name', '$ware_city', '$ware_address','$ware_tel')";
    if ($conn->query($sql) === TRUE) {
        $alert = "انبار با موفقیت ایجاد شد.";
    } else {
        $alert = "Error: " . $sql . "<br>" . $conn->error;
    }
}


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
        echo $alert;
        $conn->close();
        ?>
    </div>
</div>