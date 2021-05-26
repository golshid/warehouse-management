<?php $thisPage = ""; ?>
<?php
include('nav/header.php');
session_start();
require_once("database/db_connection.php");
$ware_id = $_GET['id'];
$ware_name = $_GET['name'];
$sql_fetch_ware = "SELECT product_id FROM prod_ware WHERE warehouse_id = '$ware_id'";
$query = $conn->query($sql_fetch_ware);
$prod_id_array = array();
while ($result = $query->fetch_assoc()) {
    $prod_id_array[] = $result['product_id'];
}

$ids = join("','", $prod_id_array);
$sql = "SELECT * FROM product WHERE id IN ('$ids')";
$product_query = $conn->query($sql);
?>
<div class="container col-lg-8 mt-5">
    <div class="card p-5 border-success text-center">
        <div class="card-header p-3">
            <h5> موجودی <?php echo $ware_name ?></h5>
        </div>
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">تعداد</th>
                    <th scope="col">وزن</th>
                    <th scope="col">قیمت</th>
                    <th scope="col">نام محصول</th>
                    <th scope="col">کد محصول</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($product_query)) { ?>
                    <tr>
                        <td><?php
                        $product_id = $row['id'];
                        $sql_find_quan = "SELECT quantity FROM prod_ware WHERE product_id = '$product_id' AND warehouse_id = '$ware_id'";
                        $query1 = $conn->query($sql_find_quan);
                        $quantity = array();
                        while ($res1 = $query1->fetch_assoc()) {
                            $quantity[] = $res1['quantity'];
                        }
                        echo "$quantity[0]";
                        ?></td>
                        <td><?php echo $row['weight'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['id'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
mysqli_close($conn);
?>
</body>

</html>