<?php $thisPage = "createProduct"; ?>
<?php
include('nav/header.php');
session_start();
require_once("database/db_connection.php");
$product_name = test_input($_POST['productName']);
$product_price = test_input($_POST['productPrice']);
$product_weight = test_input($_POST['productWeight']);
$warehouse = test_input($_POST['warehouses']);
$sql_check_prod = "SELECT id FROM product WHERE name = '$product_name' AND price = '$product_price' AND weight = '$product_weight' LIMIT 1";
$result = $conn->query($sql_check_prod);
if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_row($result)) {
        $product_id = $row[0];
    }
    $sql_ware_exist = "SELECT EXISTS(SELECT id FROM prod_ware WHERE product_id = '$product_id' AND warehouse_id = '$warehouse' LIMIT 1);";
    if ($conn->query($sql_ware_exist)=== 1) {
        $sql_update_prod = "UPDATE product SET quantity = quantity + 1 WHERE  id = '$product_id'";
        $res1 = mysqli_query($conn, $sql_update_prod);
    }
    else {
        $sql_insert_ware_prod = "INSERT INTO prod_ware (product_id, warehouse_id) VALUES ('$product_id','$warehouse')";
        $res2 = mysqli_query($conn, $sql_insert_ware_prod);
    }
}
else {
    $sql_insert_prod = "INSERT INTO product (name, price, weight)
    VALUES ('$product_name', '$product_price', '$product_weight')";
    ?>

<div class="container col-lg-4 mt-5">
    <div class="card p-5 text-success border-success text-right">
        <?php
        if ($conn->query($sql_insert_prod) === TRUE) {
            $last_id = $conn->insert_id;
            echo "محصول با موفقیت ایجاد شد.";
        } else {
            echo "Error: " . $sql_insert_prod . "<br>" . $conn->error;
        }
        ?>
    </div>
</div>
<?php
// $sql_find_ware = "SELECT id FROM warehouse WHERE name = '$warehouse'";
// $ware_id = mysqli_query($conn, $sql_find_ware);
// $wareid = array();
// while ($result = $ware_id->fetch_assoc()) {
//     $wareid[] = $result['id'];
// }
$sql_insert_wareprod = "INSERT INTO prod_ware (product_id, warehouse_id) VALUES ('$last_id','$warehouse')";
$sql3 = mysqli_query($conn, $sql_insert_wareprod);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
