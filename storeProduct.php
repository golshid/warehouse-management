<?php $thisPage = "createProduct"; ?>
<?php
include('nav/header.php');
session_start();
require_once("database/db_connection.php");
$product_name = test_input($_POST['productName']);
$product_price = test_input($_POST['productPrice']);
$product_weight = test_input($_POST['productWeight']);
$product_quantity = test_input($_POST['productQuantity']);
$warehouse = test_input($_POST['warehouses']);
$sql_check_prod = "SELECT id FROM product WHERE name = '$product_name' AND price = '$product_price' AND weight = '$product_weight' LIMIT 1";
$result = $conn->query($sql_check_prod);
if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_row($result)) {
        $product_id = $row[0];
    }
    $sql_ware_exist = "SELECT * FROM prod_ware WHERE product_id = '$product_id' AND warehouse_id = '$warehouse'";
    $res1 = $conn->query($sql_ware_exist);
    if (mysqli_num_rows($res1) > 0) {
        $sql_update_quan = "UPDATE prod_ware SET quantity = quantity + '$product_quantity' WHERE  product_id = '$product_id' AND warehouse_id = '$warehouse'";
        $res1 = mysqli_query($conn, $sql_update_quan);
        if ($res1 === TRUE) {
            $alert = "محصول با موفقیت ایجاد شد.";
        } else {
            $alert= "Error: " . $sql_insert_prod . "<br>" . $conn->error;
        }
    }
    else {
        $sql_insert_ware_prod = "INSERT INTO prod_ware (product_id, warehouse_id,quantity) VALUES ('$product_id','$warehouse','$product_quantity')";
        $res2 = mysqli_query($conn, $sql_insert_ware_prod);
        if ($res2 === TRUE) {
            $alert = "محصول با موفقیت ایجاد شد.";
        } else {
            $alert= "Error: " . $sql_insert_prod . "<br>" . $conn->error;
        }
    }
}
else {
    $sql_insert_prod = "INSERT INTO product (name, price, weight)
    VALUES ('$product_name', '$product_price', '$product_weight')";
    if ($conn->query($sql_insert_prod) === TRUE) {
        $last_id = $conn->insert_id;
        $alert = "محصول با موفقیت ایجاد شد.";
    } else {
       $alert =  "Error: " . $sql_insert_prod . "<br>" . $conn->error;
    }
            $sql_insert_wareprod = "INSERT INTO prod_ware (product_id, warehouse_id,quantity) VALUES ('$last_id','$warehouse',$product_quantity)";
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

<div class="container col-lg-4 mt-5">
    <div class="card p-5 text-success border-success text-right">
        <?php
        echo $alert;
        ?>
    </div>
</div>

